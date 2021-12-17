<?php

namespace TNM\PCRF\Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Orchestra\Testbench\TestCase as BaseTestCase;
use TNM\PCRF\Providers\PCRFServiceProvider;


class TestCase extends BaseTestCase
{
//    use RefreshDatabase;

    protected function getPackageProviders($app): array
    {
        return [PCRFServiceProvider::class];
    }

}
