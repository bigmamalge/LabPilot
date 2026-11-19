<?php

require_once __DIR__ . '/../../Model.php';

class IncidentModel extends Model
{
    public function getAllIncidents(): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM incident');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getIncidentById(int $id): ?array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT * FROM incident WHERE ID_INC = :id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    public function getIncidentsByUserID(int $id): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT incident.*, experimentation.TITRE_EXP,
                                      DATE_FORMAT(incident.DATE_INC, "%d/%m") AS DATE_INC_COURTE
                                FROM gestion
                                INNER JOIN experimentation ON experimentation.ID_EXP = gestion.ID_EXP
                                INNER JOIN incident ON incident.ID_EXP = experimentation.ID_EXP
                                WHERE gestion.ID_USER = :id
                                ORDER BY incident.DATE_INC DESC, incident.HEURE_INC DESC');
        $stmt->execute(['id' => $id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getIncidentsEquipeByUserID(int $id): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT incident.*, experimentation.TITRE_EXP, equipe.NOM_EQUIPE,
                                      DATE_FORMAT(incident.DATE_INC, "%d/%m") AS DATE_INC_COURTE
                                FROM equipe
                                INNER JOIN experimentation ON experimentation.ID_EQUIPE = equipe.ID_EQUIPE
                                INNER JOIN incident ON incident.ID_EXP = experimentation.ID_EXP
                                WHERE equipe.ID_RESP = :id
                                ORDER BY incident.DATE_INC DESC, incident.HEURE_INC DESC');
        $stmt->execute(['id' => $id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getIncidentsLaboratoireByUserID(int $id): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT incident.*, experimentation.TITRE_EXP, equipe.NOM_EQUIPE,
                                      DATE_FORMAT(incident.DATE_INC, "%d/%m") AS DATE_INC_COURTE
                                FROM laboratoire
                                INNER JOIN equipe ON equipe.ID_LABO = laboratoire.ID_LABO
                                INNER JOIN experimentation ON experimentation.ID_EQUIPE = equipe.ID_EQUIPE
                                INNER JOIN incident ON incident.ID_EXP = experimentation.ID_EXP
                                WHERE laboratoire.ID_DIR = :id
                                ORDER BY incident.DATE_INC DESC, incident.HEURE_INC DESC');
        $stmt->execute(['id' => $id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

