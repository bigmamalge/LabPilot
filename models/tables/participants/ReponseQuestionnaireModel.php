<?php

require_once __DIR__ . '/../../Model.php';

class ReponseQuestionnaireModel extends Model
{
    public function getAllReponsesQuestionnaire(): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM reponse_questionnaire');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getReponsesQuestionnaireByIdPar(int $idPar): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT * FROM reponse_questionnaire WHERE ID_PAR = :idPar');
        $stmt->execute(['idPar' => $idPar]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getReponsesQuestionnaireByIdRess(int $idRess): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT * FROM reponse_questionnaire WHERE ID_RESS = :idRess');
        $stmt->execute(['idRess' => $idRess]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

