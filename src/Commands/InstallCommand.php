<?php

namespace Laracasts\Holodeck\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use function Laravel\Prompts\select;

class InstallCommand extends Command
{
    protected $signature = 'holodeck:install';

    public function handle(): void
    {
        $stack = select(
            label: 'Which stack would you like to install?',
            options: [
                'Blade',
                'Vue',
            ],
            default: 'Blade',
        );

        $this->install();

        match ($stack) {
            'Vue' => $this->installVue(),
            default => $this->installBlade(),
        };
    }

    private function install(): void
    {
        File::copyDirectory(__DIR__  . '/../../fixtures/assets', resource_path('assets'));
        File::copyDirectory(__DIR__  . '/../../fixtures/fonts', resource_path('fonts'));
    }

    private function installBlade(): void
    {

    }

    private function installVue(): void
    {
        File::copyDirectory(__DIR__ . '/../../fixtures/vue', resource_path('js'));
    }
}