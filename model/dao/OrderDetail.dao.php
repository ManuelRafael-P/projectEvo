<?php

require_once 'model/entity/OrderDetail.entity.php';

class OrderDetailDao
{
    private $pdo;
    public function __construct()
    {
        try {
            $this->pdo = Database::StartUp();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listOrderDetail()
    {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM order_detail");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function getLastId()
    {
        try {
            $stm = $this->pdo->prepare("SELECT MAX(ORDER_DETAIL_ID) FROM order_detail");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_COLUMN);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function addRecord(OrderDetail $c)
    {
        try {
            $stm = $this->pdo->prepare("INSERT INTO order_detail (ORDER_DETAIL_ID, USER_ID, SALE_ID, USER_FULL_NAME, SHIPPING_ADDRESS, ORDER_STATUS, DELIVERY_DATE) VALUES(?,?,?,?,?,?,?,?)");
            $stm->execute(array($c->getOrderDetailID(), $c->getUserId(), $c->getSaleId(), $c->getUserFullName(), $c->getShippingAddress(), $c->getOrderStatus(), $c->get, $c->getDeliveryDate()));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function updateRecord(OrderDetail $c)
    {
        try {
            $stm = $this->pdo->prepare("UPDATE order_detail SET USER_ID = ?, SALE_ID = ?, USER_FULL_NAME = ?, SHIPPING_ADDRESS = ?, ORDER_STATUS = ?, DELIVERY_DATE = ?, DT_UPDATE = CURRENT_TIMESTAMP WHERE OrderDetail_ID = ?");
            $stm->execute(array($c->getUserId(), $c->getSaleId(), $c->getUserFullName(), $c->getShippingAddress(), $c->getOrderStatus(), $c->get, $c->getDeliveryDate(), $c->getOrderDetailID()));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function deleteRecord(OrderDetail $c)
    {
        try {
            $stm = $this->pdo->prepare("DELETE FROM order_detail WHERE ORDER_DETAIL_ID = ?");
            $stm->execute(array($c->getOrderDetailID()));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
