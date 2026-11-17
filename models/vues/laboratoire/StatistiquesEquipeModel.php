<?php

require_once __DIR__ . '/../../Model.php';

class StatistiquesEquipeModel extends Model
{
    public function getAllStatistiquesEquipe(): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM statistiquesequipe');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getStatistiquesEquipeByIdEquipe(int $idEquipe): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT * FROM statistiquesequipe WHERE ID_EQUIPE = :idEquipe');
        $stmt->execute(['idEquipe' => $idEquipe]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getStatistiquesEquipeByIdResp(int $idResp): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT * FROM statistiquesequipe WHERE ID_RESP = :idResp');
        $stmt->execute(['idResp' => $idResp]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

