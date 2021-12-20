<?php

namespace TNM\PCRF\Services;

use Exception;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Http;
use TNM\PCRF\Events\PCRFExceptionEvent;
use TNM\PCRF\Events\PCRFRequestEvent;
use TNM\PCRF\Events\PCRFResponseEvent;
use TNM\PCRF\Responses\PCRFResponse;
use TNM\Utils\Factories\TransactionIDFactory;

abstract class PCRFService extends PCRFBaseService
{
    public function query(array $attributes, string $responseClass = PCRFResponse::class): PCRFResponse
    {
        $attributes = array_merge($attributes, [
            'trans_id' => (new TransactionIDFactory(
                config('pcrf.trans_id.length'),
                config('pcrf.trans_id.prefix')
            ))->make()
        ]);
        $requestBody = $this->getRequestBody($attributes);
        Event::dispatch(new PCRFRequestEvent($attributes, class_basename(static::class), $requestBody));
        try {

            $response = Http::withBody($requestBody, 'text/xml')
                ->timeout(config('pcrf.timeout'))
                ->post(sprintf('%s/%s', config('pcrf.base_url'), $this->getRequestEndpoint()));

            $cbsResponse = new $responseClass($this->getResponseNamespace(), $this->getContentTag(), $response->body());
            Event::dispatch(new PCRFResponseEvent($attributes, $cbsResponse));
            return $cbsResponse;
        } catch (Exception $exception) {
            Event::dispatch(new PCRFExceptionEvent($attributes, $exception));
            return new $responseClass($this->getResponseNamespace());
        }
    }
}
