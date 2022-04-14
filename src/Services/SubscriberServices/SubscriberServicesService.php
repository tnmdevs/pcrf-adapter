<?php

namespace TNM\PCRF\Services\SubscriberServices;

use TNM\PCRF\Services\PCRFService;

class SubscriberServicesService extends PCRFService implements ISubscriberServicesService
{

    protected function getRequestStubPath(): string
    {
        return 'stubs/get.subscriber.services.xml';
    }

    protected function getResponseNamespace(): string
    {
        return 'getSubscriberAllServiceResponse';
    }

    protected function getRequestEndpoint(): string
    {
        return '';
    }
}
