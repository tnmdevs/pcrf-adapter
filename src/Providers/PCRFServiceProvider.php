<?php

namespace TNM\PCRF\Providers;

use Illuminate\Support\ServiceProvider;

class PCRFServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([__DIR__ . '/../config.php' => config_path('pcrf.php')], 'config');
        }
    }

    public function register()
    {

    }
}
