<?php

require_once __DIR__ . '/../../Model.php';

class ParticipationModel extends Model
{
    public function getAllParticipations(): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM participation');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getParticipationsByIdPar(int $idPar): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT * FROM participation WHERE ID_PAR = :idPar');
        $stmt->execute(['idPar' => $idPar]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getParticipationsByIdCren(int $idCren): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT * FROM participation WHERE ID_CREN = :idCren');
        $stmt->execute(['idCren' => $idCren]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getInscriptionsEnAttenteByUserID(int $id): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT participation.ID_PAR, participation.ID_CREN, utilisateur.PRENOM_USER, utilisateur.NOM_USER,
                                      experimentation.TITRE_EXP, creneau.DATE_CREN, creneau.HEURE_CREN,
                                      CONCAT(ELT(DAYOFWEEK(creneau.DATE_CREN), "Dim.", "Lun.", "Mar.", "Mer.", "Jeu.", "Ven.", "Sam."),
                                             " ", DATE_FORMAT(creneau.DATE_CREN, "%d/%m"),
                                             " ", DATE_FORMAT(creneau.HEURE_CREN, "%Hh%i")) AS JOUR_HEURE_CREN
                                FROM gestion
                                INNER JOIN experimentation ON experimentation.ID_EXP = gestion.ID_EXP
                                INNER JOIN creneau ON creneau.ID_EXP = experimentation.ID_EXP
                                INNER JOIN participation ON participation.ID_CREN = creneau.ID_CREN
                                INNER JOIN participant ON participant.ID_PAR = participation.ID_PAR
                                INNER JOIN utilisateur ON utilisateur.ID_USER = participant.ID_USER
                                WHERE gestion.ID_USER = :id AND participation.STATUT_INSC = "En attente"
                                ORDER BY creneau.DATE_CREN, creneau.HEURE_CREN');
        $stmt->execute(['id' => $id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getRetributionsEnvoyeesByUserID(int $id): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT experimentation.ID_EXP, experimentation.TITRE_EXP, retribution.TYPE_RETRIB, COUNT(*) AS nbEnvoyees
                                FROM gestion
                                INNER JOIN experimentation ON experimentation.ID_EXP = gestion.ID_EXP
                                INNER JOIN creneau ON creneau.ID_EXP = experimentation.ID_EXP
                                INNER JOIN participation ON participation.ID_CREN = creneau.ID_CREN
                                LEFT JOIN retribution ON retribution.ID_RETRIB = experimentation.ID_RETRIB
                                WHERE gestion.ID_USER = :id AND participation.RETRIB_ENV = 1
                                GROUP BY experimentation.ID_EXP, experimentation.TITRE_EXP, retribution.TYPE_RETRIB
                                ORDER BY MAX(creneau.DATE_CREN) DESC');
        $stmt->execute(['id' => $id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

