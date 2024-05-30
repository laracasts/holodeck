<?php

namespace Laracasts\Holodeck\Providers;

use Laracasts\Holodeck\Commands\InstallCommand;
use Illuminate\Support\ServiceProvider;

class HolodeckServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__.'/../../routes/routes.php');
        $this->mergeConfigFrom(__DIR__.'/../../config/holodeck.php', 'holodeck');

        if ($this->app->runningInConsole()) {
            $this->bootConsole();
        }
    }

    protected function bootConsole(): void
    {
        $this->commands([InstallCommand::class]);
    }
}
