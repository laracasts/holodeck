<?php

namespace Laracasts\Holodeck\Http\Controllers;

use Illuminate\Support\Facades\File;
use Inertia\Inertia;
use League\CommonMark\GithubFlavoredMarkdownConverter;
use Tempest\Highlight\CommonMark\HighlightExtension;

class DocumentationController
{
    public function show(string $path)
    {
        $relativePath = str($path)->prepend(__DIR__ . '/../../../docs/')->append('.md');

        if (! File::exists($relativePath)) {
            abort(404);
        }

        $markdownConvertor = new GithubFlavoredMarkdownConverter();
        $markdownConvertor->getEnvironment()->addExtension(new HighlightExtension());

        return Inertia::render('Holodeck/Documentation', [
            'heading' => str($path)->title(),
            'content' => (string) $markdownConvertor->convert(File::get($relativePath)),
        ]);
    }
}
