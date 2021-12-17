<?php

namespace TNM\PCRF\Services\Subscription;

use TNM\PCRF\Services\PCRFService;

class SubscriptionService extends PCRFService implements ISubscriptionService
{

    protected function getRequestStubPath(): string
    {
        return __DIR__.'/../../stubs/subscribe.xml';
    }

    protected function getResponseNamespace(): string
    {
        return 'subscribeServiceResponse';
    }

    protected function getRequestEndpoint(): string
    {
        // TODO confirm request endpoint
        return '';
    }
}
