<?php

declare(strict_types=1);

namespace App\Domain\InfoAPI;

use JsonSerializable;

class Endpoints implements JsonSerializable
{

    public string $name;
    public string $url;

    public function __construct(string $name, string $url) 
    { 
        $this->name = $name;
        $this->url = $url;
    }
}