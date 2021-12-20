<?php

namespace TNM\PCRF\Services\Unsubscription;

use TNM\PCRF\Services\PCRFFakeService;

class FakeUnsubscriptionService extends PCRFFakeService implements IUnsubscriptionService
{

    protected function getRequestStubPath(): string
    {
        return 'stubs/unsubscribe.xml';
    }

    protected function getResponseNamespace(): string
    {
        return 'unSubscribeServiceResponse';
    }
}
