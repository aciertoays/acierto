<?php

declare(strict_types=1);

namespace App\Application\Actions\Auth;

use App\Domain\Auth\AuthRepository;

final class VerifyAuthstatus
{

    public static function action(string $token, AuthRepository $authRepository): object
    {
        return  $authRepository->verifyAuth($token);
    }
  
}
