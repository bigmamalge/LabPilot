<?php

require_once __DIR__ . '/../../Model.php';

class ExperimentationsEquipeModel extends Model
{
    public function getAllExperimentationsEquipe(): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM experimentationsequipe');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getExperimentationsEquipeByIdEquipe(int $idEquipe): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT * FROM experimentationsequipe WHERE ID_EQUIPE = :idEquipe');
        $stmt->execute(['idEquipe' => $idEquipe]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getExperimentationsEquipeByIdResp(int $idResp): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT * FROM experimentationsequipe WHERE ID_RESP = :idResp');
        $stmt->execute(['idResp' => $idResp]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getExperimentationsEquipeByIdExp(int $idExp): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT * FROM experimentationsequipe WHERE ID_EXP = :idExp');
        $stmt->execute(['idExp' => $idExp]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

