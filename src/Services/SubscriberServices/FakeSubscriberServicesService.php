<?php

namespace TNM\PCRF\Services\SubscriberServices;

use TNM\PCRF\Services\PCRFFakeService;

class FakeSubscriberServicesService extends PCRFFakeService implements ISubscriberServicesService
{

    protected function getRequestStubPath(): string
    {
        return 'stubs/get.subscriber.services.xml';
    }

    protected function getResponseNamespace(): string
    {
        return 'getSubscriberAllServiceResponse';
    }
}
