<?php
class RestPwsd
{
    private $restPswdId;
    private $restEmail;
    private $restSelector;
    private $restToken;
    private $restExpire;

    public function __construct($restPswdId, $restEmail, $restSelector, $restToken, $restExpire)
    {
        $this->restPswdId = $restPswdId;
        $this->restEmail = $restEmail;
        $this->restSelector = $restSelector;
        $this->restToken = $restToken;
        $this->restExpire = $restExpire;
    }

    public function setRestPswdId($restPswdId)
    {
        $this->restPswdId = $restPswdId;
    }

    public function getRestPswdId()
    {
        return $this->restPswdId;
    }

    public function setRestEmail($restEmail)
    {
        $this->restEmail = $restEmail;
    }

    public function getRestEmail()
    {
        return $this->restEmail;
    }

    public function setRestSelector($restSelector)
    {
        $this->restSelector = $restSelector;
    }

    public function getRestSelector()
    {
        return $this->restSelector;
    }

    public function setRestToken($restToken)
    {
        $this->restToken = $restToken;
    }

    public function getRestToken()
    {
        return $this->restToken;
    }

    public function setRestExpire($restExpire)
    {
        $this->restExpire = $restExpire;
    }

    public function getRestExpire()
    {
        return $this->restExpire;
    }
}
