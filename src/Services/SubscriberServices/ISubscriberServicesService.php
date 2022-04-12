<?php

namespace TNM\PCRF\Services\SubscriberServices;

use TNM\PCRF\Responses\PCRFResponse;

interface ISubscriberServicesService
{
    public function query(array $attributes, string $responseClass = PCRFResponse::class);
}
