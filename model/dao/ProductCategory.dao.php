<?php

require_once 'model/entity/ProductCategory.entity.php';

class ProductCategoryDao
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

    public function listProductCategory()
    {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM product_category");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listNecessaryDataFromProductCategories()
    {
        try {
            $stm = $this->pdo->prepare("SELECT PRODUCT_CATEGORY_ID,PRODUCT_CATEGORY_NAME FROM product_category");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function getLastId()
    {
        try {
            $stm = $this->pdo->prepare("SELECT MAX(PRODUCT_CATEGORY_ID) FROM product_category");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_COLUMN);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function addRecord(ProductCategory $c)
    {
        try {
            $stm = $this->pdo->prepare("INSERT INTO product_category (PRODUCT_CATEGORY_ID ,PRODUCT_CATEGORY_NAME) VALUES(?,?)");
            $stm->execute(array($c->getProductCategoryId(), $c->getProductCategory()));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function updateRecord(ProductCategory $c)
    {
        try {
            $stm = $this->pdo->prepare("UPDATE product_category SET PRODUCT_CATEGORY_NAME = ?, DT_UPDATE = CURRENT_TIMESTAMP WHERE PRODUCT_CATEGORY_ID = ?");
            $stm->execute(array($c->getProductCategory(), $c->getProductCategoryId()));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function deleteRecord(ProductCategory $c)
    {
        try {
            $stm = $this->pdo->prepare("DELETE FROM product_category WHERE PRODUCT_CATEGORY_ID = ?");
            $stm->execute(array($c->getProductCategoryId()));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
