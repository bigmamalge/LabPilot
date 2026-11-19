<?php

require_once __DIR__ . '/../../Model.php';

class StatistiquesExperimentationModel extends Model
{
    public function getAllStatistiquesExperimentation(): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM statistiquesexperimentation');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getStatistiquesExperimentationByIdExp(int $idExp): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT * FROM statistiquesexperimentation WHERE ID_EXP = :idExp');
        $stmt->execute(['idExp' => $idExp]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTauxParticipationMoyenByUserID(int $id): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT AVG(statistiquesexperimentation.TAUX_PARTICIPATION) AS tauxMoyen,
                                      COUNT(statistiquesexperimentation.TAUX_PARTICIPATION) AS nbExpMesurees
                                FROM gestion
                                INNER JOIN statistiquesexperimentation ON statistiquesexperimentation.ID_EXP = gestion.ID_EXP
                                WHERE gestion.ID_USER = :id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getStatistiquesByUserID(int $id): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT s.ID_EXP, s.TITRE_EXP, s.NB_INSCRITS, s.NB_ACCEPTES, s.NB_EN_ATTENTE, s.NB_PRESENTS,
                                      ROUND(s.TAUX_PARTICIPATION) AS TAUX,
                                      CASE
                                          WHEN s.TAUX_PARTICIPATION >= 90 THEN "var(--succes-text)"
                                          WHEN s.TAUX_PARTICIPATION >= 60 THEN "var(--primary)"
                                          ELSE "#6d3fd1"
                                      END AS COULEUR,
                                      (SELECT COUNT(*) FROM participation
                                        INNER JOIN creneau ON creneau.ID_CREN = participation.ID_CREN
                                        WHERE creneau.ID_EXP = s.ID_EXP AND participation.PRESENCE_PAR = "Absent") AS NB_ABSENTS
                                FROM gestion
                                INNER JOIN statistiquesexperimentation AS s ON s.ID_EXP = gestion.ID_EXP
                                WHERE gestion.ID_USER = :id
                                ORDER BY s.NB_INSCRITS DESC, s.TITRE_EXP');
        $stmt->execute(['id' => $id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getIndicateursByUserID(int $id): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT COUNT(DISTINCT participation.ID_PAR) AS nbParticipants,
                                      COUNT(participation.ID_PAR) AS nbInscriptions,
                                      COALESCE(SUM(participation.PRESENCE_PAR = "Present"), 0) AS nbPresents,
                                      COALESCE(SUM(participation.PRESENCE_PAR = "Absent"), 0) AS nbAbsents,
                                      COALESCE(SUM(participation.RETRIB_ENV = 1), 0) AS nbRetributionsEnvoyees,
                                      COALESCE(SUM(participation.RETRIB_ENV = 0 AND participation.PRESENCE_PAR = "Present"
                                                   AND experimentation.ID_RETRIB IS NOT NULL), 0) AS nbRetributionsAEnvoyer
                                FROM gestion
                                INNER JOIN experimentation ON experimentation.ID_EXP = gestion.ID_EXP
                                INNER JOIN creneau ON creneau.ID_EXP = experimentation.ID_EXP
                                INNER JOIN participation ON participation.ID_CREN = creneau.ID_CREN
                                WHERE gestion.ID_USER = :id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

