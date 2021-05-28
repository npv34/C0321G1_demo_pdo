<?php


namespace App;


use PDO;

class Database
{
    public function __construct()
    {
    }

    public function connect(): PDO
    {
        try {
            return new PDO('mysql:host=localhost;dbname=library', 'root','123456@Abc');
        }catch (\PDOException $pdo) {
            echo $pdo->getMessage();
            die();
        }
    }
}