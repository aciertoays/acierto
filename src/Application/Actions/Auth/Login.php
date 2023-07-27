<?php

declare(strict_types=1);

namespace App\Application\Actions\Auth;

use Slim\Exception\HttpBadRequestException;
use Psr\Http\Message\ResponseInterface as Response;

class Login extends AuthAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        
        $requestData = $this->getFormData();

        $login = $requestData['login'];
        $password = $requestData['password'];

        if (!isset($login) || !isset($password)) {
            throw new HttpBadRequestException($this->request, "Could not resolve data");
        }

        $user = $this->authRepository->login($login, $password);
        $this->logger->info('The user with the ID ' . $user->getUuid(). ' has logged in successfully.');

        return $this->respondWithData($user);
    }
}
