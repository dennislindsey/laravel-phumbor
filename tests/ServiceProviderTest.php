<?php

namespace dennislindsey\LaravelPhumbor\Tests;

// use Orchestra\Testbench\TestCase;
use GrahamCampbell\TestBench\AbstractPackageTestCase;

class ServiceProviderTest extends AbstractPackageTestCase
{
    private $testImage = 'https://www.google.com/images/branding/googlelogo/2x/googlelogo_color_272x92dp.png';

    protected function getPackageProviders($app)
    {
        return [\dennislindsey\LaravelPhumbor\LaravelPhumborServiceProvider::class];
    }

    function test_service_provider_can_be_loaded()
    {
        $this->assertTrue(app()->make('phumbor') instanceof \Thumbor\Url\BuilderFactory);
    }

    function test_target_of_service_provider_can_be_loaded()
    {
        $this->assertTrue(app()->make('phumbor')->url($this->testImage) instanceof \Thumbor\Url\Builder);
    }
}
