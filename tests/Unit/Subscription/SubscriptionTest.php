<?php

namespace TNM\PCRF\Tests\Unit\Subscription;

use TNM\PCRF\Responses\PCRFResponse;
use TNM\PCRF\Services\Subscription\FakeSubscriptionService;
use TNM\PCRF\Services\Subscription\ISubscriptionService;
use TNM\PCRF\Services\Subscription\SubscriptionClient;
use TNM\PCRF\Tests\TestCase;

class SubscriptionTest extends TestCase
{
    public function test_subscribe_successfully()
    {
        $this->app->bind(ISubscriptionService::class, FakeSubscriptionService::class);

        $response = (new SubscriptionClient('0888800900', 123456, now()->addMonth()))->query();

        $this->assertInstanceOf(PCRFResponse::class, $response);
    }
}
