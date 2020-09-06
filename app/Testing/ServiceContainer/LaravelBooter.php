<?php

declare(strict_types=1);

namespace Brewmap\Testing\ServiceContainer;

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Bootstrap\LoadConfiguration;
use KrzysztofRewak\Larahat\Laravel;

class LaravelBooter
{
    protected string $environmentType = "testing";
    protected string $environmentFile = ".env.behat";
    protected string $basePath = "/application";
    protected array $configOverrides = [];

    public function boot(): void
    {
        /** @var Application $app */
        $app = require "{$this->basePath}/bootstrap/app.php";
        $app->loadEnvironmentFrom($this->environmentFile);

        $app->afterBootstrapping(LoadConfiguration::class, function (Application $app): void {
            $app['env'] = $this->environmentType;
            foreach ($this->configOverrides as $key => $value) {
                $app->make('config')->set($key, $value);
            }
        });

        $app->make(Laravel::CONSOLE_KERNEL_INTERFACE)->bootstrap();
    }

    public function setEnvironmentType(string $environmentType): void
    {
        $this->environmentType = $environmentType;
    }

    public function setEnvironmentFile(string $environmentFile): void
    {
        $this->environmentFile = $environmentFile;
    }

    public function setBasePath(string $basePath): void
    {
        $this->basePath = $basePath;
    }

    public function setConfigOverrides(array $configOverrides): void
    {
        $this->configOverrides = $configOverrides;
    }
}
