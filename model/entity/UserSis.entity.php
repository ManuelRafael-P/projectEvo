<?php

class UserSis
{
    private $userId;
    private $names;
    private $surnames;
    private $email;
    private $password;
    private $address;
    private $phone;
    private $userType;
    private $accountVerified;
    private $dateRegistry;
    private $dateUpdate;

    public function __construct($userId, $names, $surnames, $email, $password, $address, $phone, $userType, $accountVerified, $dateRegistry, $dateUpdate)
    {
        $this->userId = $userId;
        $this->names = $names;
        $this->surnames = $surnames;
        $this->email = $email;
        $this->password = $password;
        $this->address = $address;
        $this->phone = $phone;
        $this->userType = $userType;
        $this->accountVerified = $accountVerified;
        $this->dateRegistry = $dateRegistry;
        $this->dateUpdate = $dateUpdate;
    }

    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function setNames($names)
    {
        $this->names = $names;
    }

    public function getNames()
    {
        return $this->names;
    }

    public function setSurnames($surnames)
    {
        $this->surnames = $surnames;
    }

    public function getSurnames()
    {
        return $this->surnames;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setAddress($address)
    {
        $this->address = $address;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function setUserType($userType)
    {
        $this->userType = $userType;
    }

    public function getUserType()
    {
        return $this->userType;
    }

    public function setAccountVerified($accountVerified)
    {
        $this->accountVerified = $accountVerified;
    }

    public function getAccountVerified()
    {
        return $this->accountVerified;
    }

    public function setDateRegistry($dateRegistry)
    {
        $this->dateRegistry = $dateRegistry;
    }

    public function getDateRegistry()
    {
        return $this->dateRegistry;
    }

    public function setDateUpdate($dateUpdate)
    {
        $this->dateUpdate = $dateUpdate;
    }

    public function getDateUpdate()
    {
        return $this->dateUpdate;
    }
}