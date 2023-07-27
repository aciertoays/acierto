<?php

declare(strict_types=1);

namespace App\Application\Actions\User;

use App\Application\Actions\Action;
use App\Domain\User\UserQueryRepository;
use Psr\Log\LoggerInterface;

abstract class UserAction extends Action
{
    protected UserQueryRepository $UserQueryRepository;

    public function __construct(LoggerInterface $logger, UserQueryRepository $UserQueryRepository)
    {
        parent::__construct($logger);
        $this->UserQueryRepository = $UserQueryRepository;
    }
}
