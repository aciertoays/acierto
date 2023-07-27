<?php

declare(strict_types=1);

namespace App\Application\Actions\Auth;

use Psr\Http\Message\ResponseInterface as Response;

class VerifyAuth extends AuthAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {   $jwtHeader = $this->request->getHeaderLine('Authorization');
        $this->authRepository->logout($jwtHeader);

        return $this->respondWithData();
    }
}
