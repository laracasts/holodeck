<?php

namespace Laracasts\Holodeck\Http\Controllers;

use Laracasts\Holodeck\Enums\ImageReplicatorSize;
use Laracasts\Holodeck\Services\Replicator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Enum;
use Symfony\Component\Finder\SplFileInfo;

class ImageReplicatorController
{
    public function store(Request $request, Replicator $replicator)
    {
        $data = $request->validate([
            'identifier' => ['required', 'string'],
            'prompt' => ['required', 'string', 'max:4000'],
            'size' => ['required', new Enum(ImageReplicatorSize::class)],
            'desiredHeight' => ['required', 'int'],
        ]);

        $imageData = $replicator->makeImage($data['prompt'], ImageReplicatorSize::from($data['size']));

        $filename = str(Str::uuid())->append(".{$data['desiredHeight']}")->append('.png')->prepend('/replicator/images/');
        Storage::drive('public')->put($filename->toString(), $imageData);

        $pattern = sprintf("/(<ImageReplicator[\s\S]+identifier=[\"']%s[\"'])([\s\S]*(?:\/>|<\/ImageReplicator>))/", preg_quote($data['identifier']));

        if ($vueFile = $this->findVueFile($pattern)) {
            $this->updateFile($vueFile, $pattern, "$1 src=\"{$filename}\"$2");
        }

        return [
            'filename' => $filename->toString(),
        ];
    }

    public function delete(Request $request, string $identifier)
    {
        $pattern = sprintf("/(<ImageReplicator[\s\S]+identifier=[\"']%s[\"'].+)src=[\"'].*[\"']([\s\S]*(?:\/>|<\/ImageReplicator>))/", preg_quote($identifier));

        if ($file = $this->findVueFile($pattern)) {
            $this->updateFile($file, $pattern, "$1$2");
        }

        return response()->noContent();
    }

    private function findVueFile(string $pattern): ?SplFileInfo
    {
        return collect(File::allFiles(resource_path('/js')))
            ->lazy()
            ->first(fn(SplFileInfo $file) => str($file->getContents())->isMatch($pattern));
    }

    private function updateFile(SplFileInfo $file, string $pattern, string $replacement): void
    {
        $updatedContent = str($file->getContents())
            ->replaceMatches($pattern, $replacement);

        $file->openFile('w')->fwrite($updatedContent->toString());
    }
}
