<?php

require_once __DIR__ .'/../../Model.php';

class ReponseQuestionnaireModel extends Model
{
    public function getAllReponsesQuestionnaire(): array {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM reponse_questionnaire');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

