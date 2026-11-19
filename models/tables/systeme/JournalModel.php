<?php

require_once __DIR__ . '/../../Model.php';

class JournalModel extends Model
{
    public function getAllJournaux(): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT * FROM journal');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getJournalById(int $id): ?array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare('SELECT * FROM journal WHERE ID_JOURN = :id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    public function getJournauxDetailles(): array
    {
        $pdo = $this->getPDO();
        $stmt = $pdo->query('SELECT journal.ID_JOURN, journal.IP_ACT, journal.DESC_ACT, journal.ERREUR_JOURN,
                                    COALESCE(CONCAT(utilisateur.PRENOM_USER, " ", utilisateur.NOM_USER), "Inconnu") AS ACTEUR,
                                    DATE_FORMAT(journal.DATE_ACT_JOURN, "%d/%m/%Y") AS DATE_JOURNAL,
                                    DATE_FORMAT(journal.HEURE_ACT_JOURN, "%Hh%i") AS DEBUT,
                                    DATE_FORMAT(journal.HEURE_FIN_JOURN, "%Hh%i") AS FIN,
                                    CONCAT(DATE_FORMAT(journal.DATE_ACT_JOURN, "%d/%m/%Y"), " ", DATE_FORMAT(journal.HEURE_ACT_JOURN, "%Hh%i")) AS DATE_HEURE
                             FROM journal
                             LEFT JOIN utilisateur ON utilisateur.ID_USER = journal.ID_USER
                             ORDER BY journal.DATE_ACT_JOURN DESC, journal.HEURE_ACT_JOURN DESC');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

