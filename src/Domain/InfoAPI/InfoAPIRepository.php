<?php

declare(strict_types=1);

namespace App\Domain\InfoAPI;

interface InfoAPIRepository
{
    /**
     * @return array[]
    */
    public function help(): InfoAPIHelp;

    /**
     * @return array[]
    */
    public function status(): array;
}
