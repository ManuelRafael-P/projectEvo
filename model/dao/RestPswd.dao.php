<?php

require_once 'model/entity/UserSis.entity.php';

class RestPwsdDao
{
    public function __construct()
    {
        try {
            $this->pdo = Database::StartUp();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function getRecordBySelectorAndTime($selector, $time)
    {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM restpswd WHERE REST_SELECTOR = ? AND REST_EXPIRE >= ?");
            $stm->execute(array(
                $selector,
                $time
            ));
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function deleteRecord($email)
    {
        try {
            $stm = $this->pdo->prepare("DELETE from restpswd WHERE REST_EMAIL = ?");
            $stm->execute(array($email));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function addRecord(RestPwsd $r)
    {
        try {
            $sql = "INSERT INTO restpswd (REST_EMAIL,REST_SELECTOR,REST_TOKEN,REST_EXPIRE) VALUES (?,?,?,?)";
            $this->pdo->prepare($sql)->execute(array(
                $r->getRestEmail(),
                $r->getRestSelector(),
                password_hash($r->getRestToken(), PASSWORD_DEFAULT),
                $r->getRestExpire()
            ));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
