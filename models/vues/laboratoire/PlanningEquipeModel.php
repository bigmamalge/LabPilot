<?php

require_once __DIR__ . '/../../Model.php';

class PlanningEquipeModel extends Model
{
    public function getAllPlanningEquipe(): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM planningequipe');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPlanningEquipeByIdEquipe(int $idEquipe): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT * FROM planningequipe WHERE ID_EQUIPE = :idEquipe');
        $stmt->execute(['idEquipe' => $idEquipe]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPlanningEquipeByIdResp(int $idResp): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT * FROM planningequipe WHERE ID_RESP = :idResp');
        $stmt->execute(['idResp' => $idResp]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPlanningEquipeByIdExp(int $idExp): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT * FROM planningequipe WHERE ID_EXP = :idExp');
        $stmt->execute(['idExp' => $idExp]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPlanningEquipeByIdCren(int $idCren): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT * FROM planningequipe WHERE ID_CREN = :idCren');
        $stmt->execute(['idCren' => $idCren]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

