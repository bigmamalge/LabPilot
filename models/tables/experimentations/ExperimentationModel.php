<?php

require_once __DIR__ . '/../../Model.php';

class ExperimentationModel extends Model
{
    public function getAllExperimentations(): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM experimentation');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getExperimentationById(int $id): ?array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT * FROM experimentation WHERE ID_EXP = :id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }
}

