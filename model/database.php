<?php
class Database
{
    public static function StartUp()
    {
        $host = 'localhost';
        $db = 'proyecto_evo';
        $user = 'root';
        $password = '';
        $pdo = new PDO('mysql:host=' . $host . ';dbname=' . $db . ';charset=utf8', $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
}