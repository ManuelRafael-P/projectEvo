<?php

require_once 'model/entity/UserSis.entity.php';

class UserSisDao
{
    public function __construct()
    {
        try {
            $this->pdo = Database::StartUp();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listUsers()
    {
        try {
            $stm = $this->pdo->prepare("SELECT USER_ID, USER_NAMES, USER_SURNAMES, USER_EMAIL, USER_ADDRESS, USER_PHONE, USER_TYPE, USER_ACCOUNT_VERIFIED FROM users");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function getUserByEmailAndPassword($email, $password)
    {
        try {
            $stm = $this->pdo->prepare("SELECT USER_ID,USER_NAMES,USER_SURNAMES,USER_EMAIL,USER_TYPE,USER_ACCOUNT_VERIFIED FROM users WHERE USER_EMAIL = ? AND USER_PASSWORD = ?");
            $stm->execute(array($email, $password));
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function getUserByEmail($email)
    {
        try {
            $stm = $this->pdo->prepare("SELECT USER_ID FROM users WHERE USER_EMAIL = ?");
            $stm->execute(array($email));
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function getFullNameByEmail($email)
    {
        try {
            $stm = $this->pdo->prepare("SELECT USER_NAMES, USER_SURNAMES FROM users WHERE USER_EMAIL = ?");
            $stm->execute(array($email));
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function updateStateByEmail($email)
    {
        try {
            $sql = "UPDATE users SET USER_ACCOUNT_VERIFIED = 1 WHERE USER_EMAIL = ?";
            $this->pdo->prepare($sql)->execute(array($email));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function updatePasswordByEmail($email, $password)
    {
        try {
            $sql = "UPDATE users SET USER_PASSWORD = ? WHERE USER_EMAIL = ?";
            $this->pdo->prepare($sql)->execute(array(
                md5($password),
                $email
            ));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function getLastId()
    {
        try {
            $stm = $this->pdo->prepare("SELECT max(USER_ID) as id FROM users ");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_COLUMN);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }



    public function addUser(UserSis $u)
    {
        try {
            $sql = "INSERT INTO users (USER_ID,USER_NAMES,USER_SURNAMES,USER_EMAIL,USER_PASSWORD,USER_ADDRESS,USER_PHONE,USER_TYPE,USER_ACCOUNT_VERIFIED) VALUES(?,?,?,?,?,?,?,?,?)";
            $this->pdo->prepare($sql)->execute(array(
                $u->getUserId(),
                $u->getNames(),
                $u->getSurnames(),
                $u->getEmail(),
                md5($u->getPassword()),
                $u->getAddress(),
                $u->getPhone(),
                0,
                0
            ));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function updateUserAccountConfirmed($email)
    {
        try {
            $sql = "UPDATE users SET USER_ACCOUNT_VERIFIED = 1, DT_UPDATE = CURRENT_TIMESTAMP WHERE USER_EMAIL = ?";
            $this->pdo->prepare($sql)->execute(array(
                $email
            ));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //CRUD

    public function addRecord(UserSis $u)
    {
        try {
            $sql = "INSERT INTO users (USER_ID, USER_NAMES, USER_SURNAMES, USER_EMAIL, USER_ADDRESS, USER_PHONE, USER_TYPE, USER_ACCOUNT_VERIFIED) VALUES(?,?,?,?,?,?,?,?)";
            $this->pdo->prepare($sql)->execute(array(
                $u->getUserId(),
                $u->getNames(),
                $u->getSurnames(),
                $u->getEmail(),
                $u->getAddress(),
                $u->getPhone(),
                $u->getUserType(),
                $u->getAccountVerified()
            ));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function updateRecord(UserSis $u)
    {
        try {
            $sql = "UPDATE users SET USER_NAMES = ?, USER_SURNAMES = ?, USER_EMAIL = ?, USER_ADDRESS = ?, USER_PHONE = ?, USER_TYPE = ?, USER_ACCOUNT_VERIFIED = ?, DT_UPDATE = CURRENT_TIMESTAMP WHERE USER_ID = ?";
            $this->pdo->prepare($sql)->execute(array(
                $u->getNames(),
                $u->getSurnames(),
                $u->getEmail(),
                $u->getAddress(),
                $u->getPhone(),
                $u->getUserType(),
                $u->getAccountVerified(),
                $u->getUserId()
            ));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function deleteRecord(UserSis $u)
    {
        try {
            $stm = $this->pdo->prepare("DELETE FROM users WHERE USER_ID = ?");
            $stm->execute(array($u->getUserId()));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
