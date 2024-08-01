<?php

namespace Laracasts\Holodeck\Commands;

use Illuminate\Console\Command;
use Illuminate\Contracts\Process\InvokedProcess;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Process;
use function Laravel\Prompts\confirm;
use function Laravel\Prompts\select;

class InstallCommand extends Command
{
    protected $signature = 'holodeck:install';

    /**
     * @var array<InvokedProcess>
     */
    private array $openProcesses = [];

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
        $this->openProcesses[] = Process::start('npm install @tailwindcss/forms @tailwindcss/container-queries @tailwindcss/typography');

        File::copyDirectory(__DIR__  . '/../../fixtures/assets', resource_path('assets'));
        File::copyDirectory(__DIR__  . '/../../fixtures/fonts', resource_path('fonts'));

        if (confirm('Publish updated Tailwind config?')) {
            File::copy(__DIR__ . '/../../fixtures/tailwind.config.js', base_path('tailwind.config.js'));
        }

        if (confirm('Publish updated Vite config?')) {
            File::copy(__DIR__ . '/../../fixtures/vite.config.js', base_path('vite.config.js'));
        }

        foreach ($this->openProcesses as $process) {
            $process->wait();
        }
    }

    private function installBlade(): void
    {
        File::copyDirectory(__DIR__ . '/../../fixtures/blade', resource_path('views'));
    }

    private function installVue(): void
    {
        File::copyDirectory(__DIR__ . '/../../fixtures/vue', resource_path('js'));

        $this->openProcesses[] = Process::start('npm install @heroicons/vue');
    }
}