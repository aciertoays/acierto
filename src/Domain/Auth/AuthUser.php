<?php

declare(strict_types=1);

namespace App\Domain\Auth;

use JsonSerializable;

class AuthUser implements JsonSerializable
{
    private string $uuid;
    private string $login;
    private string $displayName;
    private string $firstName;
    private string $email;
    private string $token;
    private string $photo;

    public function __construct(){}
  
    /**
     * Get the value of token
     */
    private function getTokenBearer()
    {
        return 'Bearer ' . $this->token;
    }

    /**
     * Get the value of uuid
     */ 
    public function getUuid()
    {
        return $this->uuid;
    }

    /**
     * Set the value of uuid
     *
     * @return  self
     */ 
    public function setUuid($uuid)
    {
        $this->uuid = $uuid;

        return $this;
    }

    /**
     * Get the value of login
     */ 
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set the value of login
     *
     * @return  self
     */ 
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Get the value of displaName
     */ 
    public function getDisplayName()
    {
        return $this->displayName;
    }

    /**
     * Set the value of displaName
     *
     * @return  self
     */ 
    public function setDisplayName($displaName)
    {
        $this->displayName = $displayName;

        return $this;
    }

    /**
     * Get the value of firstName
     */ 
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set the value of firstName
     *
     * @return  self
     */ 
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of token
     */ 
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Set the value of token
     *
     * @return  self
     */ 
    public function setToken($token)
    {
        $this->token = $token;

        return $this;
    }

    /**
     * Get the value of photo
     */ 
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set the value of photo
     *
     * @return  self
     */ 
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    #[\ReturnTypeWillChange]
    public function jsonSerialize(): array
    {
       return [
            'id' => $this->getUuid(),
            'username' => $this->getLogin(),
            'firstName' => $this->getFirstName(),
            'name' => $this->getDisplayName(),
            'email' => $this->getEmail(),
            'photo' => $this->getPhoto(),
            'token' => $this->getToken(),
            'bearer' => $this->getTokenBearer(),
        ];
    }
}