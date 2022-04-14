<?php

namespace TNM\PCRF\Tests\Unit\SubscriberServices;

use TNM\PCRF\Responses\PCRFResponse;
use TNM\PCRF\Responses\SubscriberServicesResponse;
use TNM\PCRF\Services\SubscriberServices\SubscriberServicesClient;
use TNM\PCRF\Tests\TestCase;

class SubscriberServicesResponseTest extends TestCase
{
    private SubscriberServicesResponse $response;

    protected function setUp(): void
    {
        parent::setUp();
        $this->makePCRFRequest();
    }

    private function makePCRFRequest()
    {
        \Http::fake(['*' => \Http::response(file_get_contents(__DIR__ . '/response.xml'))]);

        $this->response = (new SubscriberServicesClient('0888800900'))->query();
    }

    public function testGetServices()
    {
        $services = $this->response->getServiceNames();

        $this->assertEquals(['S_Default'], $services);
    }
}
