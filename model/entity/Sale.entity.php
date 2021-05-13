<?php

class Sale
{
    private $saleId;
    private $userId;
    private $transactionKey;
    private $paypalData;
    private $mail;
    private $total;
    private $status;
    private $dateRegistry;
    private $dateUpdate;

    public function __construct($saleId, $userId, $transactionKey, $paypalData, $mail, $total, $status, $dateRegistry, $dateUpdate)
    {
        $this->saleId = $saleId;
        $this->userId = $userId;
        $this->transactionKey = $transactionKey;
        $this->paypalData = $paypalData;
        $this->mail = $mail;
        $this->total = $total;
        $this->status = $status;
        $this->dateRegistry = $dateRegistry;
        $this->dateUpdate = $dateUpdate;
    }

    public function setSaleId($saleId)
    {
        $this->saleId = $saleId;
    }

    public function getSaleId()
    {
        return $this->saleId;
    }

    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function setTransactionKey($transactionKey)
    {
        $this->transactionKey = $transactionKey;
    }

    public function getTransactionKey()
    {
        return $this->transactionKey;
    }

    public function setPaypalData($paypalData)
    {
        $this->paypalData = $paypalData;
    }

    public function getPaypalData()
    {
        return $this->paypalData;
    }

    public function setMail($mail)
    {
        $this->mail = $mail;
    }

    public function getMail()
    {
        return $this->mail;
    }

    public function setTotal($total)
    {
        $this->total = $total;
    }

    public function getTotal()
    {
        return $this->total;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function getStatus()
    {
        return $this->status;
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
