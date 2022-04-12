<?php

namespace TNM\PCRF\Providers;

use Illuminate\Support\ServiceProvider;
use TNM\PCRF\Services\SubscriberServices\ISubscriberServicesService;
use TNM\PCRF\Services\SubscriberServices\SubscriberServicesService;
use TNM\PCRF\Services\Subscription\ISubscriptionService;
use TNM\PCRF\Services\Subscription\SubscriptionService;
use TNM\PCRF\Services\Unsubscription\IUnsubscriptionService;
use TNM\PCRF\Services\Unsubscription\UnsubscriptionService;

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
        $this->app->bind(IUnsubscriptionService::class, UnsubscriptionService::class);
        $this->app->bind(ISubscriberServicesService::class, SubscriberServicesService::class);
    }
}
