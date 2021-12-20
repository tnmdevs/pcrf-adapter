<?php

namespace TNM\PCRF\Services\Unsubscription;

use TNM\PCRF\Responses\PCRFResponse;

class UnsubscriptionClient
{
    private string $msisdn;
    private string $bundleId;
    private IUnsubscriptionService $service;

    public function __construct(string $msisdn, string $bundleId)
    {
        $this->msisdn = msisdn($msisdn)->internationalize();
        $this->bundleId = $bundleId;
        $this->service = app(IUnsubscriptionService::class);
    }

    public function query(): PCRFResponse
    {
        return $this->service->query([
            'msisdn' => $this->msisdn,
            'bundle_id' => $this->bundleId
        ]);
    }
}
