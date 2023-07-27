<?php

declare(strict_types=1);

namespace App\Application\Actions\InfoAPI;
use App\Application\Actions\Action;
use App\Domain\InfoAPI\InfoAPIRepository;
use Psr\Log\LoggerInterface;

abstract class InfoAPIAction extends Action
{
    protected InfoAPIRepository $infoAPIRepository;

    public function __construct(LoggerInterface $logger, InfoAPIRepository $infoAPIRepository)
    {
        parent::__construct($logger);
        $this->infoAPIRepository = $infoAPIRepository;
    }
}
