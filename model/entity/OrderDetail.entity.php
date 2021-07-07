<?php

class OrderDetail
{
    private $orderDetailId;
    private $userId;
    private $saleId;
    private $transactionId;
    private $userFullName;
    private $shippingAddress;
    private $phone;
    private $invoiceNumber;
    private $orderStatus;
    private $deliveryDate;
    private $dateRegistry;
    private $dateUpdate;

    public function __construct($orderDetailId, $userId, $saleId, $transactionId, $userFullName, $shippingAddress, $phone, $invoiceNumber, $orderStatus, $deliveryDate, $dateRegistry, $dateUpdate)
    {
        $this->orderDetailId = $orderDetailId;
        $this->userId = $userId;
        $this->saleId = $saleId;
        $this->transactionId = $transactionId;
        $this->userFullName = $userFullName;
        $this->shippingAddress = $shippingAddress;
        $this->phone = $phone;
        $this->invoiceNumber = $invoiceNumber;
        $this->orderStatus = $orderStatus;
        $this->deliveryDate = $deliveryDate;
        $this->dateRegistry = $dateRegistry;
        $this->dateUpdate = $dateUpdate;
    }

    public function setOrderDetailId($orderDetailId)
    {
        $this->orderDetailId = $orderDetailId;
    }

    public function getOrderDetailID()
    {
        return $this->orderDetailId;
    }

    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function setSaleId($saleId)
    {
        $this->saleId = $saleId;
    }

    public function getSaleId()
    {
        return $this->saleId;
    }

    public function setTransactionId($transactionId)
    {
        $this->transactionId = $transactionId;
    }

    public function getTransactionId()
    {
        return $this->transactionId;
    }

    public function setUserFullName($userFullName)
    {
        $this->userFullName = $userFullName;
    }

    public function getUserFullName()
    {
        return $this->userFullName;
    }

    public function setShippingAddress($shippingAddress)
    {
        $this->shippingAddress = $shippingAddress;
    }

    public function getShippingAddress()
    {
        return $this->shippingAddress;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function setInvoiceNumber($invoiceNumber)
    {
        $this->invoiceNumber = $invoiceNumber;
    }

    public function getInvoiceNumber()
    {
        return $this->invoiceNumber;
    }

    public function setOrderStatus($orderStatus)
    {
        $this->orderStatus = $orderStatus;
    }

    public function getOrderStatus()
    {
        return $this->orderStatus;
    }

    public function setDeliveryDate($deliveryDate)
    {
        $this->deliveryDate = $deliveryDate;
    }

    public function getDeliveryDate()
    {
        return $this->deliveryDate;
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
