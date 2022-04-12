<?php

namespace TNM\PCRF\Services\SubscriberServices;

use TNM\PCRF\Responses\PCRFResponse;
use TNM\PCRF\Responses\SubscriberServicesResponse;

class SubscriberServicesClient
{
    private string $msisdn;

    public function __construct(string $msisdn)
    {
        $this->msisdn = $msisdn;
    }

    public function query(): SubscriberServicesResponse
    {
        return $this->getService()->query([
            'msisdn' => msisdn($this->msisdn)->internationalize()
        ], SubscriberServicesResponse::class);
    }

    private function getService(): ISubscriberServicesService
    {
        return app(ISubscriberServicesService::class);
    }
}
