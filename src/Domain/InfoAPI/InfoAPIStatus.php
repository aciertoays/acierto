<?php

declare(strict_types=1);

namespace App\Domain\InfoAPI;

use JsonSerializable;

class InfoAPIStatus implements JsonSerializable
{

    private InfoAPI $infoAPI;
    private array  $endpoints;

    public function __construct(string $infoAPI, array $endpoints) 
    { 
        $this->infoAPI = $infoAPI;
        $this->endpoints = $endpoints;
    }
}

