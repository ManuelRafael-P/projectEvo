<?php
class SaleDetail
{
    private $saleDetailId;
    private $saleId;
    private $productId;
    private $sizeSold;
    private $quantitySold;
    private $saleDate;
    private $unitPrice;
    private $saleDetailTotal;
    private $dateRegistry;
    private $dateUpdate;

    public function __construct($saleDetailId, $saleId, $productId, $sizeSold, $quantitySold, $saleDate, $unitPrice, $saleDetailTotal, $dateRegistry, $dateUpdate)
    {
        $this->saleDetailId = $saleDetailId;
        $this->saleId = $saleId;
        $this->productId = $productId;
        $this->sizeSold = $sizeSold;
        $this->quantitySold = $quantitySold;
        $this->saleDate = $saleDate;
        $this->unitPrice = $unitPrice;
        $this->saleDetail = $saleDetailTotal;
        $this->dateRegistry = $dateRegistry;
        $this->dateUpdate = $dateUpdate;
    }

    public function setSaleDetailId($saleDetailId)
    {
        $this->saleDetailId = $saleDetailId;
    }

    public function getSaleDetailId()
    {
        return $this->saleDetailId;
    }

    public function setSaleId($saleId)
    {
        $this->saleId = $saleId;
    }

    public function getSaleId()
    {
        return $this->saleId;
    }

    public function setProductId($productId)
    {
        $this->productId = $productId;
    }

    public function getProductId()
    {
        return $this->productId;
    }

    public function setSizeSold($sizeSold)
    {
        $this->sizeSold = $sizeSold;
    }

    public function getSizeSold()
    {
        return $this->sizeSold;
    }

    public function setQuantitySold($quantitySold)
    {
        $this->quantitySold = $quantitySold;
    }

    public function getQuantitySold()
    {
        return $this->quantitySold;
    }

    public function setSaleDate($saleDate)
    {
        $this->saleDate = $saleDate;
    }

    public function getSaleDate()
    {
        return $this->saleDate;
    }

    public function setUnitPrice($unitPrice)
    {
        $this->unitPrice = $unitPrice;
    }

    public function getUnitPrice()
    {
        return $this->unitPrice;
    }

    public function setSaleDetailTotal($saleDetailTotal)
    {
        $this->saleDetailTotal = $saleDetailTotal;
    }

    public function getSaleDetailTotal()
    {
        return $this->saleDetailTotal;
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
