<?php

declare(strict_types=1);

namespace Tests\Infrastructure\Persistence\User;

use App\Domain\User\User;
use App\Domain\User\UserNotFoundException;
use App\Infrastructure\Persistence\User\UserQueryRepositoryImpl;
use Tests\TestCase;

class UserQueryRepositoryImplTest extends TestCase
{
    public function testFindAll()
    {
        $user = new User(1, 'bill.gates', 'Bill', 'Gates');

        $UserQueryRepository = new UserQueryRepositoryImpl([1 => $user]);

        $this->assertEquals([$user], $UserQueryRepository->findAll());
    }

    public function testFindAllUsersByDefault()
    {
        $users = [
            1 => new User(1, 'bill.gates', 'Bill', 'Gates'),
            2 => new User(2, 'steve.jobs', 'Steve', 'Jobs'),
            3 => new User(3, 'mark.zuckerberg', 'Mark', 'Zuckerberg'),
            4 => new User(4, 'evan.spiegel', 'Evan', 'Spiegel'),
            5 => new User(5, 'jack.dorsey', 'Jack', 'Dorsey'),
        ];

        $UserQueryRepository = new UserQueryRepositoryImpl();

        $this->assertEquals(array_values($users), $UserQueryRepository->findAll());
    }

    public function testFindUserOfId()
    {
        $user = new User(1, 'bill.gates', 'Bill', 'Gates');

        $UserQueryRepository = new UserQueryRepositoryImpl([1 => $user]);

        $this->assertEquals($user, $UserQueryRepository->findUserOfId(1));
    }

    public function testFindUserOfIdThrowsNotFoundException()
    {
        $UserQueryRepository = new UserQueryRepositoryImpl([]);
        $this->expectException(UserNotFoundException::class);
        $UserQueryRepository->findUserOfId(1);
    }
}
