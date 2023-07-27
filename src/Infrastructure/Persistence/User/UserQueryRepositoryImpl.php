<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\User;

use App\Infrastructure\Persistence\BaseRepository;
use App\Domain\User\User;
use App\Domain\User\UserNotFoundException;
use App\Domain\User\UserQueryRepository;

class UserQueryRepositoryImpl extends BaseRepository implements UserQueryRepository
{
    /**
     * {@inheritdoc}
     */
    public function findAll(): array
    {
        $users = [];
        $query = 'SELECT `id`,`uuid`,`idUpdated`,`idRegistered`,`nickName`,`displayName`,
                         `firstName`,`lastName`,`login`,`email`,`password`,`status`,`photo`,
                         `createdAt`,`updatedAt`, `type` FROM `USERS` ORDER BY `id`';
        $statement = $this->getDb()->prepare($query);
        $statement->execute();

        while ($user = $statement->fetchObject(User::class)) {
            $users[] = $user; // Agregar cada objeto User al array $users
        }
        return (array) $users;
    }

    /**
     * {@inheritdoc}
     */
    public function findUserOfId(string $uuid): User
    {

        $query = 'SELECT `id`,`uuid`,`idUpdated`,`idRegistered`,`nickName`,`displayName`,
                         `firstName`,`lastName`,`login`,`email`,`password`,`status`,`photo`,
                         `createdAt`,`updatedAt` FROM `USERS` Where `uuid` = :uuid';

        $statement = $this->getDb()->prepare($query);
        $statement->bindParam('uuid', $uuid);
        $statement->execute();
        $user = $statement->fetchObject(User::class);

        if (!isset($user) || $user === false) {
            throw new UserNotFoundException();
        }

        return $user;
    }
}
