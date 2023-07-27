<?php

declare(strict_types=1);

namespace App\Application\Middleware;

use Psr\Container\ContainerInterface;

abstract class Base
{
    protected $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

}
