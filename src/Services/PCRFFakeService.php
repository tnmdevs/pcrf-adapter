<?php


namespace TNM\PCRF\Services;


use Illuminate\Support\Facades\Event;
use TNM\CBS\Events\CbsRequestEvent;
use TNM\CBS\Responses\CbsResponse;
use TNM\PCRF\Events\PCRFRequestEvent;
use TNM\PCRF\Responses\PCRFResponse;
use TNM\Utils\Factories\TransactionIDFactory;

abstract class PCRFFakeService extends PCRFBaseService
{
    protected function getRequestEndpoint(): string
    {
        return '';
    }
    protected function getContentTag(): string
    {
        return '';
    }

    private function getFilePath(): string
    {
        $namespace = explode("\\", get_class($this));
        $baseServiceDepth = 3;
        $pathLength = $baseServiceDepth + 1;
        return implode('/', array_slice($namespace, $baseServiceDepth, count($namespace) - $pathLength));
    }

    public function query(array $attributes, string $responseClass = PCRFResponse::class): PCRFResponse
    {
        $attributes = array_merge($attributes, ['trans_id' => (new TransactionIDFactory())->make()]);
        $requestBody = $this->getRequestBody($attributes);
        Event::dispatch(new PCRFRequestEvent($attributes, class_basename(static::class), $requestBody));

        return new $responseClass(
            $this->getResponseNamespace(),
            $this->getContentTag(),
            file_get_contents(sprintf('%s/%s/response.xml', __DIR__, $this->getFilePath()))
        );
    }
}
