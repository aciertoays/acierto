<?php

declare(strict_types=1);

use Psr\Container\ContainerInterface;

$container['Setting'] = static fn (
    ContainerInterface $container
): array => (
    $container->get(SettingsInterface::class)
);

$container['Setting'] = static fn (
    ContainerInterface $container
): array => (
    $container->get(SettingsInterface::class)
);