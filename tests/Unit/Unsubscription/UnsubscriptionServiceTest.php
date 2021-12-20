<?php

namespace TNM\PCRF\Tests\Unit\Unsubscription;

use TNM\PCRF\Responses\PCRFResponse;
use TNM\PCRF\Services\Unsubscription\UnsubscriptionClient;
use TNM\PCRF\Tests\TestCase;

class UnsubscriptionServiceTest extends TestCase
{
    public function test_unsubscription_service()
    {
        \Config::set('pcrf.timeout', 10);
        \Http::fake(['*' => \Http::response(file_get_contents(__DIR__.'/response.xml'))]);

        $response = (new UnsubscriptionClient('0888800900', 123456))->query();

        $this->assertInstanceOf(PCRFResponse::class, $response);
    }
}
