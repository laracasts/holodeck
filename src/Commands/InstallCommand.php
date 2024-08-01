<?php

namespace Laracasts\Holodeck\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Process;
use function Laravel\Prompts\confirm;
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

        Process::run('npm install @tailwindcss/forms @tailwindcss/container-queries @tailwindcss/typography');

        if (confirm('Publish updated Tailwind config?')) {
            File::copy(__DIR__ . '/../../fixtures/tailwind.config.js', base_path('tailwind.config.js'));
        }

        if (confirm('Publish updated Vite config?')) {
            File::copy(__DIR__ . '/../../fixtures/vite.config.js', base_path('vite.config.js'));
        }
    }

    private function installBlade(): void
    {
        File::copyDirectory(__DIR__ . '/../../fixtures/blade', resource_path('views'));
    }

    private function installVue(): void
    {
        File::copyDirectory(__DIR__ . '/../../fixtures/vue', resource_path('js'));
        Process::run('npm install @heroicons/vue');
    }
}