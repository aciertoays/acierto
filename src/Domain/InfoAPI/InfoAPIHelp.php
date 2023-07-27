<?php

declare(strict_types=1);

namespace App\Domain\InfoAPI;

use JsonSerializable;

class InfoAPIHelp implements JsonSerializable
{

    private InfoAPI $infoAPI;
    private ?array  $endpoints;

    public function __construct(InfoAPI $infoAPI, ?array $endpoints) 
    { 
        $this->infoAPI = $infoAPI;
        $this->endpoints = $endpoints;
    }

    public function getInfoAPI(): InfoAPI
    {
        return $this->InfoAPI;
    }

    public function getEndpoints(): ?Array
    {
        return $this->endpoints;
    }

    #[\ReturnTypeWillChange]
    public function jsonSerialize(): array
    {
        return [
            'InfoAPI' => $this->infoAPI->jsonSerialize(),
            'endpoints' => $this->endpoints
        ];
    }

    public function toJson(): object
    {
        return json_decode((string) json_encode(get_object_vars($this)), false);
    }
}

