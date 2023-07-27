<?php

declare(strict_types=1);

namespace App\Domain\Auth;

use phpDocumentor\Reflection\Types\Boolean;

interface AuthRepository
{
    public function login(string $login,  string $passwor): AuthUser;
    public function logout(string $token, string $reason = ''): string;
    public function verifyAuth(string $token): object;
}
