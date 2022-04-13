<?php

namespace TNM\PCRF\Responses;

class SubscriberServicesResponse extends PCRFResponse
{
    public function getServiceNames(): array
    {
        $services = $this->getContents()['subscribedService'];

        return collect($services['attribute'])
            ->filter(fn (array $attr) => $attr['key'] == 'SRVNAME')
            ->values()
            ->map(fn (array $attr) => $attr['value'])
            ->toArray();
    }
}
