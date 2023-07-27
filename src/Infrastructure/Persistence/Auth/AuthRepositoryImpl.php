<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Auth;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use App\Domain\Auth\AuthUser;
use App\Domain\Auth\AuthRepository;
use App\Domain\Auth\AuthUserExpiredException;
use App\Domain\Auth\AuthUserNotFoundException;
use App\Infrastructure\Persistence\BaseRepository;

class AuthRepositoryImpl extends BaseRepository implements AuthRepository
{
   
    public function login(string $login,  string $password): AuthUser
    {   
        $config = $this->getSetting('app');
        $pass = hash('sha512', $config['secret-pass'] . $password);
        $authUser = $this->checkAndGetUser($login, $pass);
        
        $payload_token = [
            'id' => $authUser->getUuid(),
            'email' => $authUser->getEmail(),
            'login' => $authUser->getLogin(),
            'displayName' => $authUser->getLogin(),
            'name' => $authUser->getFirstName(),
            'iat' => time(),
            'exp' => time() + $config['exp-token'],
        ];

        $token = JWT::encode($payload_token, $config['secret'], $config['algorithm-token']);
        $token  = $authUser->setToken($token);

        return $authUser;
    }

    public function logout(string $token, string $reason = ''): string
    {
        $decoded = $this->verifyAuth(($token));

        if (!isset($decoded)) {
            throw new AuthUserExpiredException();
        }

        $this->insertBlacklistTokens($token, $reason, $decoded->id);
        return 'Su sección se ha cerrado exitosamente';
    }

    public function verifyAuth(string $token): object
    {   
        $config = $this->getSetting('app');
        $decoded = '';
        try {
            $decoded = JWT::decode($token, new Key($config['secret'], $config['algorithm-token']));
        } catch (\Throwable $th) {
            throw new AuthUserExpiredException();
        }
        
        $verifyInBlackList = $this->checkTokenInBlacklistTokens($token);

        if ($verifyInBlackList) {
            throw new AuthUserExpiredException();  
        }
         
        return $decoded;
    }

    public function checkTokenInBlacklistTokens(string $token): bool
    {   
        $query = 'SELECT `uuid` FROM `blacklist_tokens` Where `token`= :token';
        $statement = $this->getDb()->prepare($query);
        $statement->bindParam('token', $token);
        $statement->execute();
        $uuid = $statement->fetchObject(AuthUser::class);

        if (!isset($uuid) || $uuid === false) {
            return false;
        }

        return true;
    }

    public function checkAndGetUser(string $login,  string $password): AuthUser
    {   $active = 1;
        $query = 'SELECT `uuid`,`login`,`firstName`,`email` , `displayName`,  `photo`
                  FROM `USERS` 
                  Where `login`= :login And `password` = :password And `status` = :status';

        $statement = $this->getDb()->prepare($query);
        $statement->bindParam('login', $login);
        $statement->bindParam('password', $password);
        $statement->bindParam('status', $active);
        $statement->execute();
        $authUser = $statement->fetchObject(AuthUser::class);

        if (!isset($authUser) || $authUser === false) {
            throw new AuthUserNotFoundException();
        }

        return $authUser;
    }

    public function insertBlacklistTokens(string $token,  string $reason, string $uuid): void
    {   
      
  
        $query = '
            INSERT INTO `blacklist_tokens` (`token`, `reason`, `uuid`)
                   VALUES (:token, :reason, :uuid)
        ';
        $statement = $this->getDb()->prepare($query);
        $statement->bindParam('token', $token);
        $statement->bindParam('reason', $reason);
        $statement->bindParam('uuid', $uuid);
        $statement->execute();
    }

}