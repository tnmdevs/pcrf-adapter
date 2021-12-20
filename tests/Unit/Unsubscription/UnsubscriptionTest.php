<?php

namespace TNM\PCRF\Tests\Unit\Unsubscription;

use TNM\PCRF\Responses\PCRFResponse;
use TNM\PCRF\Services\Unsubscription\FakeUnsubscriptionService;
use TNM\PCRF\Services\Unsubscription\IUnsubscriptionService;
use TNM\PCRF\Services\Unsubscription\UnsubscriptionClient;
use TNM\PCRF\Tests\TestCase;

class UnsubscriptionTest extends TestCase
{
    public function test_unsubscribe_successfully()
    {
        $this->app->bind(IUnsubscriptionService::class, FakeUnsubscriptionService::class);

        $response = (new UnsubscriptionClient('0888800900', 123456))->query();

        $this->assertInstanceOf(PCRFResponse::class, $response);
    }
}
