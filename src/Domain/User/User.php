<?php

declare(strict_types=1);

namespace App\Domain\User;


use JsonSerializable;

class User implements JsonSerializable
{
    private int $id;
    private string $uuid;
    private string $idUpdated;
    private string $idRegistered;
    private string $nickName;
    private string $displayName;
    private string $firstName;
    private string $lastName;
    private string $login;
    private string $password;
    private string $email;
    private string $photo;
    private int $status;
    private int $type;
    private string $createdAt;
    private string $updatedAt;


    public function __construct()
    {
    }


    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

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
     * Get the value of password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */
    public function setPassword($password)
    {
        $this->password = $password;

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
     * Get the value of status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */
    public function setStatus($status)
    {
        $this->status = $status;

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
     * Get the value of lastName
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set the value of lastName
     *
     * @return  self
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }


    /**
     * Get the value of idRegistered
     */
    public function getIdRegistered()
    {
        return $this->idRegistered;
    }

    /**
     * Set the value of idRegistered
     *
     * @return  self
     */
    public function setIdRegistered($idRegistered)
    {
        $this->idRegistered = $idRegistered;

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
     * Get the value of nicKName
     */
    public function getNickName()
    {
        return $this->nickName;
    }

    /**
     * Set the value of nicKName
     *
     * @return  self
     */
    public function setNickName($nickName)
    {
        $this->nickName = $nickName;

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
        $this->displayName = $displaName;

        return $this;
    }

    /**
     * Get the value of createdAt
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set the value of createdAt
     *
     * @return  self
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get the value of updatedAt
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set the value of updatedAt
     *
     * @return  self
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get the value of idUpdated
     */
    public function getIdUpdated()
    {
        return $this->idUpdated;
    }

    /**
     * Set the value of idUpdated
     *
     * @return  self
     */
    public function setIdUpdated($idUpdated)
    {
        $this->idUpdated = $idUpdated;

        return $this;
    }
     /**
     * Get the value of type
     */ 
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the value of type
     *
     * @return  self
     */ 
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    #[\ReturnTypeWillChange]
    public function jsonSerialize(): array
    {
        return [
            'id' => $this->getUuid(),
            'username' => $this->getLogin(),
            'firstName' => $this->getFirstName(),
            'lastName' => $this->getLastName(),
            'photo' => $this->getPhoto(),
        ];
    }
}
