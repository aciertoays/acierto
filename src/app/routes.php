<?php

declare(strict_types=1);

use Slim\App;
use App\Application\Settings\SettingsInterface;
use App\Application\Actions\User\ViewUserAction;
use App\Application\Actions\User\ListUsersAction;
use App\Application\Middleware\Auth;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {
    $container = $app->getContainer();
    $settings = $container->get(SettingsInterface::class);
    $version  = $settings->get('app')['api-version'];

    $app->options('/{routes:.*}', function (Request $request, Response $response) {
        // CORS Pre-Flight OPTIONS Request Handler
        return $response;
    });


    $app->group('/api/v' . $version, function (Group $group) {
        $group->get('/', \App\Application\Actions\InfoAPI\InfoAPIInit::class);
        $group->get('/status', \App\Application\Actions\InfoAPI\InfoAPIStatus::class);
        $group->post('/login', \App\Application\Actions\Auth\Login::class);
        $group->post('/logout', \App\Application\Actions\Auth\Logout::class);

        $group->group('/public', function (Group $group) {
            $group->get('/', ListUsersAction::class);
            $group->get('/services', ViewUserAction::class);
            $group->get('/blog', ViewUserAction::class);
            $group->get('/question', ViewUserAction::class);
        });

        $group->group('/users', function (Group $group) {
            $group->get('', ListUsersAction::class)->add(Auth::class);
            $group->get('/{id}', ViewUserAction::class)->add(Auth::class);
        });
        $group->group('/blog', function (Group $group) {
            $group->get('', ListUsersAction::class);
            $group->get('/{id}', ViewUserAction::class);
        });
        $group->group('/services', function (Group $group) {
            $group->get('', ListUsersAction::class);
            $group->get('/{id}', ViewUserAction::class);
        });
    });
};
