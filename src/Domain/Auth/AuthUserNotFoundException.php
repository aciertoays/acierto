<?php

declare(strict_types=1);

namespace App\Domain\Auth;;

use App\Domain\DomainException\DomainRecordNotFoundException;

class AuthUserNotFoundException extends DomainRecordNotFoundException
{
    public $message = 'Not Authenticate why user you requested does not exist.';
}
