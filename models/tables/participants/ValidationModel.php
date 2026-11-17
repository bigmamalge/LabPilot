<?php

require_once __DIR__ . '/../../Model.php';

class ValidationModel extends Model
{
    public function getAllValidations(): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM validation');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getValidationsByIdPar(int $idPar): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT * FROM validation WHERE ID_PAR = :idPar');
        $stmt->execute(['idPar' => $idPar]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getValidationsByIdRest(int $idRest): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT * FROM validation WHERE ID_REST = :idRest');
        $stmt->execute(['idRest' => $idRest]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

