<?php

namespace TNM\PCRF\Services\Subscription;

use TNM\PCRF\Responses\PCRFResponse;

interface ISubscriptionService
{
    public function query(array $attributes, string $responseClass = PCRFResponse::class): PCRFResponse;
}
