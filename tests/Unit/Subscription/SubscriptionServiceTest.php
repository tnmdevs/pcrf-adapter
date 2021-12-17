<?php

namespace TNM\PCRF\Tests\Unit\Subscription;

use TNM\PCRF\Responses\PCRFResponse;
use TNM\PCRF\Services\Subscription\SubscriptionClient;
use TNM\PCRF\Tests\TestCase;

class SubscriptionServiceTest extends TestCase
{
    public function test_subscription_service()
    {
        \Config::set('pcrf.timeout', 10);
        \Http::fake(['*' => \Http::response(file_get_contents(__DIR__.'/response.xml'))]);

        $response = (new SubscriptionClient('0888800900', 123456, now()->addMonth()))->query();

        $this->assertInstanceOf(PCRFResponse::class, $response);
    }
}
