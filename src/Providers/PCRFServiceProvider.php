<?php

namespace TNM\PCRF\Providers;

use Illuminate\Support\ServiceProvider;
use TNM\PCRF\Services\Subscription\ISubscriptionService;
use TNM\PCRF\Services\Subscription\SubscriptionService;

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
        $this->app->bind(ISubscriptionService::class, SubscriptionService::class);
    }
}
