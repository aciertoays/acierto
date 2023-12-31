<?php

declare(strict_types=1);

namespace App\Application\Actions\Auth;

use App\Application\Actions\Action;
use App\Domain\Auth\AuthRepository;
use Psr\Log\LoggerInterface;

abstract class AuthAction extends Action
{
    protected AuthRepository $authRepository;

    public function __construct(LoggerInterface $logger, AuthRepository $authRepository)
    {
        parent::__construct($logger);
        $this->authRepository = $authRepository;
    }
}
