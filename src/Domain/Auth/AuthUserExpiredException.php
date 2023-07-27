<?php

declare(strict_types=1);

namespace App\Domain\Auth;;

use App\Domain\DomainException\DomainRecordNotFoundException;

class AuthUserExpiredException extends DomainRecordNotFoundException
{
    public $message = 'Expired token';
}
