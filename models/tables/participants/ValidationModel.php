<?php

require_once __DIR__ .'/../../Model.php';

class ValidationModel extends Model
{
    public function getAllValidations(): array {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM validation');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

