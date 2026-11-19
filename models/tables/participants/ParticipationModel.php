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

    public function getParticipantsByUserID(int $id): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT participation.ID_PAR, participation.ID_CREN, participation.STATUT_INSC,
                                      participation.PRESENCE_PAR, participation.RETRIB_ENV,
                                      utilisateur.PRENOM_USER, utilisateur.NOM_USER, utilisateur.MAIL_USER, utilisateur.CONSENT_USER,
                                      UPPER(CONCAT(LEFT(utilisateur.PRENOM_USER, 1), LEFT(utilisateur.NOM_USER, 1))) AS INITIALES,
                                      participant.AGE_PAR, participant.GEN_PAR, participant.LANG_PAR,
                                      participant.LUNETTES_PAR, participant.CONTRAINTES_PAR,
                                      experimentation.ID_EXP, experimentation.TITRE_EXP,
                                      CONCAT(ELT(DAYOFWEEK(creneau.DATE_CREN), "Dim.", "Lun.", "Mar.", "Mer.", "Jeu.", "Ven.", "Sam."),
                                             " ", DATE_FORMAT(creneau.DATE_CREN, "%d/%m"),
                                             " ", DATE_FORMAT(creneau.HEURE_CREN, "%Hh%i")) AS JOUR_HEURE_CREN,
                                      (SELECT CONCAT(retribution.TYPE_RETRIB, " - ", REPLACE(FORMAT(retribution.VAL_RETRIB, 2, "fr_FR"), ",00", ""), " €")
                                         FROM retribution
                                        WHERE retribution.ID_RETRIB = experimentation.ID_RETRIB) AS RETRIBUTION,
                                      CASE
                                          WHEN participation.STATUT_INSC = "En attente" THEN "En attente"
                                          WHEN participation.STATUT_INSC = "Refuse" THEN "Refusée"
                                          WHEN participation.PRESENCE_PAR = "Present" THEN IF(participant.GEN_PAR = "Femme", "Présente", "Présent")
                                          WHEN participation.PRESENCE_PAR = "Absent" THEN IF(participant.GEN_PAR = "Femme", "Absente", "Absent")
                                          ELSE "Confirmée"
                                      END AS LIBELLE_STATUT,
                                      CASE
                                          WHEN participation.STATUT_INSC IN ("En attente", "Refuse") THEN "warn"
                                          WHEN participation.PRESENCE_PAR = "Present" THEN "ok"
                                          WHEN participation.PRESENCE_PAR = "Absent" THEN "warn"
                                          ELSE "violet"
                                      END AS CLASSE_STATUT,
                                      CASE
                                          WHEN participation.STATUT_INSC = "Accepte" AND participation.PRESENCE_PAR = "Present" THEN "ok"
                                          WHEN participation.STATUT_INSC = "Accepte" AND participation.PRESENCE_PAR = "Non renseigne" THEN "violet"
                                          ELSE ""
                                      END AS CLASSE_AVATAR,
                                      CASE
                                          WHEN participation.RETRIB_ENV = 1 THEN "Envoyée"
                                          WHEN participation.PRESENCE_PAR = "Present" AND experimentation.ID_RETRIB IS NOT NULL THEN "À envoyer"
                                      END AS LIBELLE_RETRIB,
                                      IF(participation.RETRIB_ENV = 1, "ok", "warn soft") AS CLASSE_RETRIB
                                FROM gestion
                                INNER JOIN experimentation ON experimentation.ID_EXP = gestion.ID_EXP
                                INNER JOIN creneau ON creneau.ID_EXP = experimentation.ID_EXP
                                INNER JOIN participation ON participation.ID_CREN = creneau.ID_CREN
                                INNER JOIN participant ON participant.ID_PAR = participation.ID_PAR
                                INNER JOIN utilisateur ON utilisateur.ID_USER = participant.ID_USER
                                WHERE gestion.ID_USER = :id
                                ORDER BY participation.STATUT_INSC = "En attente" DESC, creneau.DATE_CREN DESC, creneau.HEURE_CREN DESC');
        $stmt->execute(['id' => $id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getInscriptionsParSemaineByUserID(int $id): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT CONCAT("S", WEEK(semaine.LUNDI, 3)) AS LIBELLE_SEMAINE,
                                      (SELECT COUNT(*)
                                         FROM gestion
                                         INNER JOIN creneau ON creneau.ID_EXP = gestion.ID_EXP
                                         INNER JOIN participation ON participation.ID_CREN = creneau.ID_CREN
                                        WHERE gestion.ID_USER = :id
                                          AND creneau.DATE_CREN <= semaine.LUNDI + INTERVAL 6 DAY) AS nbCumule
                                FROM (SELECT CURDATE() - INTERVAL WEEKDAY(CURDATE()) DAY - INTERVAL n.N WEEK AS LUNDI
                                        FROM (SELECT 5 AS N UNION ALL SELECT 4 UNION ALL SELECT 3
                                              UNION ALL SELECT 2 UNION ALL SELECT 1 UNION ALL SELECT 0) AS n) AS semaine
                                ORDER BY semaine.LUNDI');
        $stmt->execute(['id' => $id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

