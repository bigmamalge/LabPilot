<?php

require_once __DIR__ . '/../../Model.php';

class ExperimentationsLaboratoireModel extends Model
{
    public function getAllExperimentationsLaboratoire(): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM experimentationslaboratoire');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getExperimentationsLaboratoireByIdLabo(int $idLabo): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT * FROM experimentationslaboratoire WHERE ID_LABO = :idLabo');
        $stmt->execute(['idLabo' => $idLabo]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getExperimentationsLaboratoireByIdDir(int $idDir): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT * FROM experimentationslaboratoire WHERE ID_DIR = :idDir');
        $stmt->execute(['idDir' => $idDir]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getExperimentationsLaboratoireByIdExp(int $idExp): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT * FROM experimentationslaboratoire WHERE ID_EXP = :idExp');
        $stmt->execute(['idExp' => $idExp]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

