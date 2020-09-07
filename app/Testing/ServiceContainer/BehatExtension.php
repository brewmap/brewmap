<?php

declare(strict_types=1);

namespace Brewmap\Testing\ServiceContainer;

use KrzysztofRewak\Larahat\BehatExtension as Extension;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class BehatExtension extends Extension
{
    public function load(ContainerBuilder $container, array $config): void
    {
        $laravelBooter = new LaravelBooter();
        $laravelBooter->setBasePath($container->getParameter("paths.base"));
        $laravelBooter->setEnvironmentFile($config["env"]);
        $laravelBooter->boot();
    }
}
