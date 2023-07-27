<?php

declare(strict_types=1);

use DI\ContainerBuilder;
use App\Domain\Auth\AuthRepository;
use App\Domain\User\UserQueryRepository;
use App\Domain\InfoAPI\InfoAPIRepository;
use App\Infrastructure\Persistence\Auth\AuthRepositoryImpl;
use App\Infrastructure\Persistence\User\UserQueryRepositoryImpl;
use App\Infrastructure\Persistence\InfoAPI\InfoAPIRepositoryImplement;

return function (ContainerBuilder $containerBuilder) {
    $containerBuilder->addDefinitions([
        UserQueryRepository::class => \DI\autowire(UserQueryRepositoryImpl::class),
    ]);
    
    $containerBuilder->addDefinitions([
        InfoAPIRepository::class  => \DI\autowire(InfoAPIRepositoryImplement::class),
    ]);

    $containerBuilder->addDefinitions([
        AuthRepository::class  => \DI\autowire(AuthRepositoryImpl::class),
    ]);
};
