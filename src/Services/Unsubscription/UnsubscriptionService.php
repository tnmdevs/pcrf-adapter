<?php

namespace TNM\PCRF\Services\Unsubscription;

use TNM\PCRF\Services\PCRFService;

class UnsubscriptionService extends PCRFService implements IUnsubscriptionService
{

    protected function getRequestStubPath(): string
    {
        return 'stubs/unsubscribe.xml';
    }

    protected function getResponseNamespace(): string
    {
        return 'unSubscribeServiceResponse';
    }

    protected function getRequestEndpoint(): string
    {
        return '';
    }
}
