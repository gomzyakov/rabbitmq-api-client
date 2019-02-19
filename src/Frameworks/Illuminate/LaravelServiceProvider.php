<?php

declare(strict_types = 1);

namespace AvtoDev\RabbitMqApiClient\Frameworks\Illuminate;

use Illuminate\Support\ServiceProvider as IlluminateServiceProvider;

class LaravelServiceProvider extends IlluminateServiceProvider
{
    /**
     * Get config root key name.
     *
     * @return string
     */
    public static function getConfigRootKeyName(): string
    {
        return \basename(static::getConfigPath(), '.php');
    }

    /**
     * Returns path to the configuration file.
     *
     * @return string
     */
    public static function getConfigPath(): string
    {
        return __DIR__ . '/config/rabbitmq-api-client.php';
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register package services.
     *
     * @return void
     */
    public function register()
    {
        $this->initializeConfigs();
    }

    /**
     * Initialize configs.
     *
     * @return void
     */
    protected function initializeConfigs()
    {
        $this->mergeConfigFrom(static::getConfigPath(), static::getConfigRootKeyName());

        $this->publishes([
            \realpath(static::getConfigPath()) => config_path(\basename(static::getConfigPath())),
        ], 'config');
    }
}
