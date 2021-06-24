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

    public function addPrepaidSale(Sale $c)
    {
        $saleId = $c->getSaleId();
        $userId = $c->getUserId();
        $transactionKey = $c->getTransactionKey();
        $mail = $c->getMail();
        $total = $c->getTotal();
        $id = 0;
        try {
            $sql = "CALL addPrepaidSale_SP(?,?,?,?,?,@saleId)";
            $stm = $this->pdo->prepare($sql);
            $stm->bindParam(1, $saleId, PDO::PARAM_INT);
            $stm->bindParam(2, $userId, PDO::PARAM_STR, 250);
            $stm->bindParam(3, $transactionKey, PDO::PARAM_STR, 250);
            $stm->bindParam(4, $mail, PDO::PARAM_STR, 250);
            $stm->bindParam(5, $total, PDO::PARAM_INT);
            $stm->execute();
            return  $row = $this->pdo->query("SELECT @saleId as SaleId")->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function updateSaleApproved($data, $id)
    {
        try {
            $sql = "UPDATE sales SET PAYPAL_DATA = ?, STATUS = '1'	WHERE SALE_ID = ?";
            $this->pdo->prepare($sql)
                ->execute(
                    array($data, $id)
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function updateSaleCompleted($key, $id)
    {
        try {
            $sql = "UPDATE sales SET STATUS = '2' WHERE TRANSACTION_KEY = ? AND SALE_ID = ?";
            $this->pdo->prepare($sql)
                ->execute(
                    array($key, $id)
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //CRUD

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
            $stm = $this->pdo->prepare("UPDATE sales SET  STATUS = ?, DT_UPDATE = CURRENT_TIMESTAMP WHERE SALE_ID = ?");
            $stm->execute(array($c->getStatus(), $c->getSaleId()));
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
