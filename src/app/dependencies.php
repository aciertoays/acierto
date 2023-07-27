<?php

declare(strict_types=1);

use Monolog\Logger;
use DI\ContainerBuilder;
use Psr\Log\LoggerInterface;
use Monolog\Handler\StreamHandler;
use Monolog\Processor\UidProcessor;
use Psr\Container\ContainerInterface;
use App\Application\Settings\Settings;
use App\Application\Settings\SettingsInterface;

return function (ContainerBuilder $containerBuilder) {
    $containerBuilder->addDefinitions([
        LoggerInterface::class => function (ContainerInterface $c) {
            $settings = $c->get(SettingsInterface::class);

            $loggerSettings = $settings->get('logger');
            $logger = new Logger($loggerSettings['name']);

            $processor = new UidProcessor();
            $logger->pushProcessor($processor);

            $handler = new StreamHandler($loggerSettings['path'], $loggerSettings['level']);
            $logger->pushHandler($handler);

            return $logger;
        }

    ]);

    $containerBuilder->addDefinitions([
        PDO::class => function (ContainerInterface $c) {
            $settings = $c->get(SettingsInterface::class);
            $database = $settings->get('db');


            $dsn = sprintf(
                'mysql:host=%s;dbname=%s;port=%s;charset=utf8',
                $database['host'],
                $database['name'],
                $database['port']
            );

            $pdo = new PDO($dsn, $database['user'], $database['pass']);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        
            return $pdo;
        }
    ]);

    $containerBuilder->addDefinitions([
        Settings::class => function (ContainerInterface $c)
        {
            return new Settings($c->get(SettingsInterface::class)->get());
        }
    ]);
 
};

