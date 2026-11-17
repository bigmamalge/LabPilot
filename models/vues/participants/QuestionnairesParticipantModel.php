<?php

require_once __DIR__ .'/../../Model.php';

class QuestionnairesParticipantModel extends Model
{
    public function getAllQuestionnairesParticipant(): array {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM questionnairesparticipant');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

