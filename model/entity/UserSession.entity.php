<?php
class UserSession
{
    private $id;
    private $fullname;
    private $email;
    private $type;
    private $verifyAccountValue;

    public function __construct($id, $fullname, $email, $type, $verifyAccountValue)
    {
        $this->id = $id;
        $this->fullname = $fullname;
        $this->email = $email;
        $this->type = $type;
        $this->verifyAccountValue = $verifyAccountValue;
    }   

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setFullname($fullname)
    {
        $this->fullname = $fullname;
    }

    public function getFullname()
    {
        return $this->fullname;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function getType()
    {
        return $this->type;
    }
    public function setVerifyAccountValue($verifyAccountValue)
    {
        $this->verifyAccountValue = $verifyAccountValue;
    }

    public function getVerifyAccountValue()
    {
        return $this->verifyAccountValue;
    }
}
