<?php

declare(strict_types=1);

namespace App\Domain\InfoAPI;

use App\Domain\DomainException\DomainRecordNotFoundException;

class InfoAPINotFoundException extends DomainRecordNotFoundException
{
    public $message = 'The Information of API its requested does not exist.';
}
