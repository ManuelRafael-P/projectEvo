<?php

require_once 'model/entity/Sale.entity.php';

class SaleDao
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

    public function listSales()
    {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM sales");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function getLastId()
    {
        try {
            $stm = $this->pdo->prepare("SELECT MAX(SALE_ID) FROM sales");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_COLUMN);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function addRecord(Sale $c)
    {
        try {
            $stm = $this->pdo->prepare("INSERT INTO sales (SALE_ID ,USER_ID, TRANSACTION_KEY,PAYPAL_DATA, MAIL, TOTAL, STATUS) VALUES(?,?,?,?,?,?,?)");
            $stm->execute(array($c->getSaleId(), $c->getUserId(), $c->getTransactionKey(), $c->getPaypalData(), $c->getMail(), $c->getTotal(), $c->getStatus()));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function updateRecord(Sale $c)
    {
        try {
            $stm = $this->pdo->prepare("UPDATE sales SET USER_ID = ?, TRANSACTION_KEY = ?,PAYPAL_DATA = ?, MAIL = ?, TOTAL = ?, STATUS = ?, DT_UPDATE = CURRENT_TIMESTAMP WHERE SALE_ID = ?");
            $stm->execute(array($c->getUserId(), $c->getTransactionKey(), $c->getPaypalData(), $c->getMail(), $c->getTotal(), $c->getStatus(), $c->getSaleId()));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function deleteRecord(Sale $c)
    {
        try {
            $stm = $this->pdo->prepare("DELETE FROM sales WHERE SALE_ID = ?");
            $stm->execute(array($c->getSaleId()));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
