<?php

namespace TNM\PCRF\Services\Unsubscription;

use TNM\PCRF\Responses\PCRFResponse;

interface IUnsubscriptionService
{
    public function query(array $attributes, string $responseClass = PCRFResponse::class): PCRFResponse;
}
