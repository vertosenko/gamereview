<?php

class DB_Connect
{
    public $pdo;

    function __construct($host, $db, $charset, $user, $pass)
    {
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $opt = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        );

        try {
            $this->pdo = new PDO($dsn, $user, $pass, $opt);
        } catch (PDOException $e) {
            die('Cannot connect: ' . $e->getMessage());
        }
    }


}