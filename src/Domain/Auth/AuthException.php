<?php

declare(strict_types=1);

namespace App\Domain\User;

use App\Domain\DomainException\DomainAuthException;

class AuthException extends DomainAuthException
{
    public $message = 'Error en la authenticación.';
}
