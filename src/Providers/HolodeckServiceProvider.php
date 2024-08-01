<?php

namespace Laracasts\Holodeck\Providers;

use Illuminate\Support\Facades\Blade;
use Laracasts\Holodeck\Commands\InstallCommand;
use Illuminate\Support\ServiceProvider;
use Laracasts\Holodeck\View\Components\BaseLayout;
use Laracasts\Holodeck\View\Components\GuestLayout;
use Laracasts\Holodeck\View\Components\StandardLayout;

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
        $this->loadViewsFrom(__DIR__ . '/../../views', 'holodeck');

        $this->app->runningInConsole()
            ? $this->bootConsole()
            : $this->bootWeb();
    }

    protected function bootConsole(): void
    {
        $this->commands([InstallCommand::class]);
    }

    protected function bootWeb(): void
    {
        Blade::component('base-layout', BaseLayout::class);
        Blade::component('guest-layout', GuestLayout::class);
        Blade::component('standard-layout', StandardLayout::class);
    }
}
