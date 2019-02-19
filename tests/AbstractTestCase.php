<?php

namespace AvtoDev\RabbitMqApiClient\Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use AvtoDev\RabbitMqApiClient\Frameworks\Illuminate\LaravelServiceProvider;

abstract class AbstractTestCase extends BaseTestCase
{
    use Traits\CreatesApplicationTrait;

    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        parent::setUp();

        $this->app->register(LaravelServiceProvider::class);
    }
}
