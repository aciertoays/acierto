<?php

declare(strict_types=1);

namespace App\Domain\User;

interface UserCommanRepository
{

    /**
     * @param string $id
     * @return User
     * @throws UserNotFoundException
    */
    public function created(): array;
    public function update(string $id): User;
    public function delete(string $id): User;
    public function activate(string $id): User;
    public function inactivate(string $id): User;
}
