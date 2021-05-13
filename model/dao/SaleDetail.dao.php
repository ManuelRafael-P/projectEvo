<?php

require_once 'model/entity/SaleDetail.entity.php';

class SaleDetailDao
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

    public function listSaleDetails()
    {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM sales_detail");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function getLastId()
    {
        try {
            $stm = $this->pdo->prepare("SELECT MAX(SALE_DETAIL_ID) FROM sales_detail");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_COLUMN);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function addRecord(SaleDetail $c)
    {
        try {
            $stm = $this->pdo->prepare("INSERT INTO sales_detail (SALE_DETAIL_ID ,SALE_ID, PRODUCT_ID, SIZE_SOLD, QUANTITY_SOLD, SALE_DATE, UNIT_PRICE, SALE_DETAIL_TOTAL) VALUES(?,?,?,?,?,?,?,?)");
            $stm->execute(array($c->getSaleId(), $c->getSaleId(), $c->getProductId(), $c->getSizeSold(), $c->getQuantitySold(), $c->getSaleDate(), $c->getUnitPrice(), $c->getSaleDetailTotal()));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function updateRecord(SaleDetail $c)
    {
        try {
            $stm = $this->pdo->prepare("UPDATE sales_detail SET SALE_ID = ?, PRODUCT_ID = ?,SIZE_SOLD = ?, QUANTITY_SOLD = ?, SALE_DATE = ?, UNIT_PRICE = ?, SALE_DETAIL_TOTAL = ?, DT_UPDATE = CURRENT_TIMESTAMP WHERE SALE_DETAIL_ID = ?");
            $stm->execute(array($c->getSaleId(), $c->getProductId(), $c->getSizeSold(), $c->getQuantitySold(), $c->getSaleDate(), $c->getUnitPrice(), $c->getSaleDetailTotal(), $c->getSaleId()));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function deleteRecord(SaleDetail $c)
    {
        try {
            $stm = $this->pdo->prepare("DELETE FROM sales_detail WHERE SALE_DETAIL_ID = ?");
            $stm->execute(array($c->getSaleId()));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
