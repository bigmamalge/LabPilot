<?php   

abstract class Model
{
    private static ?PDO $pdo = null;

    public function getPdo(): PDO {
        if (self::$pdo === null) {
            self::$pdo = new PDO('mysql:host=localhost;dbname=sae3', 'username', 'password');
        }
        return self::$pdo;
    }
}

