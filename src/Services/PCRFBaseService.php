<?php

namespace TNM\PCRF\Services;

use TNM\PCRF\Responses\PCRFResponse;

abstract class PCRFBaseService
{
    abstract public function query(array $attributes, string $responseClass = PCRFResponse::class): PCRFResponse;

    abstract protected function getRequestStubPath(): string;

    abstract protected function getResponseNamespace(): string;

    abstract protected function getRequestEndpoint(): string;

    protected function getContentTag(): string
    {
        return '';
    }

    protected function getRequestBody(array $attributes): string
    {
        $stub = file_get_contents( $this->getRequestStubPath());

        foreach ($attributes as $placeholder => $value)
            $stub = str_replace(sprintf('{{%s}}', $placeholder), $value, $stub);

        return $stub;
    }
}
