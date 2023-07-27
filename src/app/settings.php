<?php

declare(strict_types=1);

use App\Application\Settings\Settings;
use App\Application\Settings\SettingsInterface;
use DI\ContainerBuilder;
use Monolog\Logger;

return function (ContainerBuilder $containerBuilder) {

    // Global Settings Object
    $containerBuilder->addDefinitions([
        SettingsInterface::class => function () {
            return new Settings([
                'error' => [
                    'displayErrorDetails' => true, // Should be set to false in production
                    'logError'            => false,
                    'logErrorDetails'     => false
                ],
                'logger' => [
                    'name' => 'acierto-api',
                    'loggers' => $_SERVER['LOGS_ENABLED'],
                    'path' => isset($_ENV['docker']) ? 'php://stdout' : __DIR__ . '/../../logs/app.log',
                    'level' => Logger::DEBUG
                ],
                'cache' => [
                    'redis' => $_SERVER['REDIS_ENABLED'],
                ],
                'app' => [
                    'domain' => $_SERVER['APP_DOMAIN'] ?? '',
                    'secret' => $_SERVER['SECRET_KEY'],
                    'api-version' => $_SERVER['API_VERSION'],
                    'api-name' => $_SERVER['API_NAME'],
                    'path' => $_SERVER['APP_PATH'],
                    'secret-pass' => $_SERVER['SECRET_KEY_PASSWORD'],
                    'exp-token' => $_SERVER['EXPIRATION_TIME_TOKEN'],
                    'secure-token' => $_SERVER['SECURE_TOHEN'],
                    'algorithm-token' => $_SERVER['ALGORITHM_TOKEN'],
                ],
                'db' => [
                    'host' => $_SERVER['DB_HOST'],
                    'name' => $_SERVER['DB_NAME'],
                    'user' => $_SERVER['DB_USER'],
                    'pass' => $_SERVER['DB_PASS'],
                    'port' => $_SERVER['DB_PORT'],
                    'chart' => $_SERVER['DB_CHART'],
                ]
            ]);
        }
    ]);
};
