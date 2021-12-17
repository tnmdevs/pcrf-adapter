<?php

namespace TNM\PCRF\Responses;

class PCRFResponse
{
    protected ?string $response;
    private array $prefixes = ['soapenv:', 'bcs:', 'bcc:', 'cbs:', 'ars:', 'arc:','bbs:', 'SOAP-ENV:'];
    protected string $responseNamespace;
    protected string $contentTag;
    protected array $content;

    public function __construct(string $responseNamespace, string $contentTag = '', ?string $response = '')
    {
        $this->response = $response;
        $this->responseNamespace = $responseNamespace;
        $this->contentTag = $contentTag;
        $this->content = $this->getContents();
    }

    public function notSuccessful(): bool
    {
        return !$this->success();
    }

    public function success(): bool
    {
        return $this->status() == 0;
    }

    public function status(): string
    {
        return $this->valid() ? $this->array()['Body'][$this->responseNamespace]['result']['resultCode'] : 500;
    }

    private function valid(): bool
    {
        return isset($this->array()['Body'][$this->responseNamespace]['result']);
    }

    public function array(): array
    {
        return $this->toArray($this->response);
    }

    private function toArray(?string $xml): array
    {
        if (!is_string($xml)) return array();

        $value = json_decode(json_encode(simplexml_load_string($this->stripPrefixes($xml))), true);
        return is_array($value) ? $value : array();
    }

    private function stripPrefixes(string $xml): string
    {
        foreach ($this->prefixes as $prefix) $xml = str_replace($prefix, '', $xml);
        return $xml;
    }

    public function getMessage(): string
    {
        return $this->valid()
            ? $this->array()['Body'][$this->responseNamespace]['result']['paras']['value']
            : 'Request failed. Please try again later';
    }

    public function toString(): string
    {
        return $this->response;
    }

    public function getBody(): array
    {
        return $this->valid() ? $this->array()['Body'][$this->responseNamespace] : [];
    }

    public function hasContent(): bool
    {
        return isset($this->getBody()[$this->contentTag]);
    }

    public function hasNoContent(): bool
    {
        return !$this->hasContent();
    }

    public function getContents(): array
    {
        return $this->hasContent() ? $this->getBody()[$this->contentTag] : [];
    }
}
