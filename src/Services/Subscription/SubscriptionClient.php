<?php

namespace TNM\PCRF\Services\Subscription;

use Carbon\Carbon;
use TNM\PCRF\Responses\PCRFResponse;

class SubscriptionClient
{
    private string $msisdn;
    private string $bundleId;
    private string $startTime;
    private string $endTime;
    private ISubscriptionService $service;

    public function __construct(string $msisdn, string $bundleId, Carbon $endDate)
    {
        $this->startTime = now()->format('YmdHis');
        $this->endTime = $endDate->format('YmdHis');
        $this->msisdn = msisdn($msisdn)->internationalize();
        $this->bundleId = $bundleId;
        $this->service = app(ISubscriptionService::class);
    }

    public function query(): PCRFResponse
    {
        return $this->service->query([
            'msisdn' => $this->msisdn,
            'start_time' => $this->startTime,
            'end_time' => $this->endTime,
            'bundle_id' => $this->bundleId
        ]);
    }
}
