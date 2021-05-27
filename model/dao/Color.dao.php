<?php

require_once 'model/entity/Color.entity.php';

class ColorDao
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

    public function listColors()
    {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM colors");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listNecesaryDataFromColors()
    {
        try {
            $stm = $this->pdo->prepare("SELECT COLOR_ID, COLOR_NAME FROM colors");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function getLastId()
    {
        try {
            $stm = $this->pdo->prepare("SELECT MAX(COLOR_ID) FROM colors");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_COLUMN);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function addRecord(Color $c)
    {
        try {
            $stm = $this->pdo->prepare("INSERT INTO colors (COLOR_ID ,COLOR_NAME) VALUES(?,?)");
            $stm->execute(array($c->getColorId(), $c->getColorName()));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function updateRecord(Color $c)
    {
        try {
            $stm = $this->pdo->prepare("UPDATE colors SET COLOR_NAME = ?, DT_UPDATE = CURRENT_TIMESTAMP WHERE COLOR_ID = ?");
            $stm->execute(array($c->getColorName(), $c->getColorId()));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function deleteRecord(Color $c)
    {
        try {
            $stm = $this->pdo->prepare("DELETE FROM colors WHERE COLOR_ID = ?");
            $stm->execute(array($c->getColorId()));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
