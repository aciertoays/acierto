<?php

declare(strict_types=1);

namespace App\Application\Actions\Auth;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Slim\Exception\HttpBadRequestException;
use Psr\Http\Message\ResponseInterface as Response;

class Logout extends AuthAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {   
        $jwtHeader = $this->request->getHeaderLine('Authorization');
        $requestData = $this->getFormData();

        if (!$jwtHeader) {
            throw new HttpBadRequestException($this->request, "Could not resolve data");
        }

        $jwt = explode('Bearer ', $jwtHeader);
        if (!isset($jwt[1])) {
            throw new HttpBadRequestException($this->request, "JWT Token invalid.");
        }

        $reason = isset($requestData['reason']) ?  $requestData['reason'] : '';
        $message = $this->authRepository->logout($jwt[1], $reason);
       

        return $this->respondWithData($message);
    }
}
