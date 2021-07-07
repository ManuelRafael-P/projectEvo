<?php

class SaleSession
{
    private $saleId;
    private $transactionKey;
    private $totalS;
    private $totalD;

    public function __construct($saleId, $transactionKey, $totalS, $totalD)
    {
        $this->saleId = $saleId;
        $this->transactionKey = $transactionKey;
        $this->totalS = $totalS;
        $this->totalD = $totalD;
    }

    public function setSaleId($saleId)
    {
        $this->saleId = $saleId;
    }

    public function getSaleId()
    {
        return $this->saleId;
    }

    public function setTransactionKey($transactionKey)
    {
        $this->transactionKey = $transactionKey;
    }

    public function getTransactionKey()
    {
        return $this->transactionKey;
    }

    public function setTotalS($totalS)
    {
        $this->totalS = $totalS;
    }

    public function getTotalS()
    {
        return $this->totalS;
    }

    public function setTotalD($totalD)
    {
        $this->totalD = $totalD;
    }

    public function getTotalD()
    {
        return $this->totalD;
    }
}
