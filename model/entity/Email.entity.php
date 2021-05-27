<?php

class Email
{
    private $fullname;
    private $email;
    private $url;

    public function __construct($fullname, $email, $url)
    {
        $this->fullname = $fullname;
        $this->email = $email;
        $this->url = $url;
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

    public function setUrl($url)
    {
        $this->url = $url;
    }

    public function getUrl()
    {
        return $this->url;
    }
}
