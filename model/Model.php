<?php   

abstract class Model
{
    private static ?PDO $pdo = null;
    private $user = 'root';
    private $password = '';

    protected function getPDO(): PDO {
        if (self::$pdo === null) {
            self::$pdo = new PDO('mysql:host=localhost;dbname=sae3', $this->user, $this->password);
        }
        return self::$pdo;
    }
}

