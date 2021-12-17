<?php

namespace TNM\PCRF\Services\Subscription;

use TNM\PCRF\Services\PCRFFakeService;

class FakeSubscriptionService extends PCRFFakeService implements ISubscriptionService
{

    protected function getRequestStubPath(): string
    {
        return 'stubs/subscribe.xml';
    }

    protected function getResponseNamespace(): string
    {
        return 'subscribeServiceResponse';
    }
}
