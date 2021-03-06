<?php

namespace goodjun\FoundationService;

use Illuminate\Support\ServiceProvider;
use goodjun\FoundationService\Commands\FoundationServiceCommand;

class FoundationServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/foundation.php' => config_path('foundation.php'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('foundation:work', function() {
           return new FoundationServiceCommand();
        });

        $this->commands([
            'foundation:work'
        ]);
    }
}
