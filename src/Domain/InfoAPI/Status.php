<?php

declare(strict_types=1);

namespace App\Domain\InfoAPI;

use JsonSerializable;

class Status implements JsonSerializable
{

    public string $name;
    public boolean $status;

    public function __construct(string $name, boolean $status) 
    { 
        $this->name = $name;
        $this->status = $status;
    }
}