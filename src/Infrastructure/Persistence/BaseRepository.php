<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence;

use App\Application\Settings\Settings;

abstract class BaseRepository
{
    public function __construct(protected \PDO $database, protected Settings $settings){}

    protected function getDb(): \PDO
    {
        return $this->database;
    }

    protected function getSetting(string $key)
    {
        return $this->settings->get($key);
    }
}
