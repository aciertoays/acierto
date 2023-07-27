<?php

declare(strict_types=1);

namespace App\Domain\InfoAPI;

use JsonSerializable;
class InfoAPI  implements JsonSerializable
{

    private string $api;
    private string $version;
    private int $timestamp;

    public function __construct(string $api, string $version) 
    { 
        $this->api = $api;
        $this->version = $version;
        $this->timestamp = time();
    }

    public function getAPI(): string
    {
        return $this->api;
    }

    public function getVersion(): string
    {
        return $this->version;
    }

    public function getTimestamp(): int
    {
        return $this->timestamp;
    }

    #[\ReturnTypeWillChange]
    public function jsonSerialize(): array
    {
        return [
            'api' => $this->api,
            'version' => $this->version,
            'timestamp' => $this->timestamp,
        ];
    }
}