<?php

require_once __DIR__ . '/../../models/tables/utilisateurs/UtilisateurModel.php';
require_once __DIR__ . '/../../models/vues/utilisateurs/RoleUtilisateurModel.php';
require_once __DIR__ . '/../../models/tables/experimentations/ExperimentationModel.php';
require_once __DIR__ . '/../../models/tables/participants/ParticipationModel.php';
require_once __DIR__ . '/../../models/tables/planning/CreneauModel.php';
require_once __DIR__ . '/../../models/tables/experimentations/IncidentModel.php';
require_once __DIR__ . '/../../models/vues/experimentations/StatistiquesExperimentationModel.php';

$userModel = new UtilisateurModel();

$user = $userModel->getUtilisateurById($_SESSION['id']);

$roleUserModel = new RoleUtilisateurModel();

$roleUser = $roleUserModel->getRoleUtilisateurByIdUser($_SESSION['id']);

$experimentationModel = new ExperimentationModel();

$experimentations = $experimentationModel->getExperimentationByUserID($_SESSION['id']);

$participationModel = new ParticipationModel();

$inscriptionsEnAttente = $participationModel->getInscriptionsEnAttenteByUserID($_SESSION['id']);
$retributionsEnvoyees = $participationModel->getRetributionsEnvoyeesByUserID($_SESSION['id']);

$creneauModel = new CreneauModel();

$prochainsCreneaux = $creneauModel->getProchainsCreneauxByUserID($_SESSION['id']);

$incidentModel = new IncidentModel();

$incidents = $incidentModel->getIncidentsByUserID($_SESSION['id']);

$statistiquesModel = new StatistiquesExperimentationModel();

$tauxParticipation = $statistiquesModel->getTauxParticipationMoyenByUserID($_SESSION['id']);


$prenom = $user["PRENOM_USER"];
$nom = $user["NOM_USER"];
$nom_complet = $prenom . " " . $nom;
$initiales = $prenom[0] . $nom[0];
$poste = $roleUser[0]['LIB_ROLE'];

foreach ($experimentations as $i => $exp) {
    if ($exp['ARCHIVE_EXP']) {
        $statut = 'archived';
        $libelleStatut = 'Archivée';
        $classeStatut = '';
    } elseif ($exp['EST_TERMINEE']) {
        $statut = 'done';
        $libelleStatut = 'Terminée';
        $classeStatut = 'ok';
    } elseif ($exp['nbCreneaux'] == 0) {
        $statut = 'draft';
        $libelleStatut = 'Brouillon';
        $classeStatut = '';
    } elseif ($exp['nbCreneauxProposes'] > 0) {
        $statut = 'run';
        $libelleStatut = 'Créneaux à valider';
        $classeStatut = 'warn';
    } else {
        $statut = 'run';
        $libelleStatut = 'En cours';
        $classeStatut = 'run';
    }

    if ($exp['JOUR_HEURE_CREN'] !== null) {
        $prochainCreneau = $exp['JOUR_HEURE_CREN'];
        if ($exp['SALLE'] !== null) {
            $prochainCreneau .= ' (' . $exp['SALLE'] . ')';
        }
    } elseif ($statut === 'draft') {
        $prochainCreneau = 'Non planifié';
    } else {
        $prochainCreneau = 'Aucun créneau à venir';
    }

    $experimentations[$i]['statut'] = $statut;
    $experimentations[$i]['libelleStatut'] = $libelleStatut;
    $experimentations[$i]['classeStatut'] = $classeStatut;
    $experimentations[$i]['pourcent'] = $exp['nbMaxPar'] > 0 ? round($exp['nbpart'] / $exp['nbMaxPar'] * 100) : 0;
    $experimentations[$i]['prochainCreneau'] = $prochainCreneau;
}


$nbExperimentationsActives = count(array_filter($experimentations, fn($exp) => $exp['statut'] === 'run'));
$nbNouvellesCeMois = count(array_filter($experimentations, fn($exp) => $exp['COMMENCEE_CE_MOIS'] == 1));

$nbInscriptionsEnAttente = count($inscriptionsEnAttente);

if ($tauxParticipation['tauxMoyen'] !== null) {
    $tauxParticipationMoyen = round($tauxParticipation['tauxMoyen']) . '%';
    $detailTaux = 'sur ' . $tauxParticipation['nbExpMesurees'] . ' expérimentation' . ($tauxParticipation['nbExpMesurees'] > 1 ? 's' : '');
} else {
    $tauxParticipationMoyen = '–';
    $detailTaux = 'Aucune présence saisie';
}

if (count($prochainsCreneaux) > 0) {
    $prochaineSession = $prochainsCreneaux[0]['JOUR_HEURE_COURT'];
    $salleProchaineSession = $prochainsCreneaux[0]['SALLE'] ?? 'Salle non définie';
} else {
    $prochaineSession = 'Aucune';
    $salleProchaineSession = 'Rien de planifié';
}


$inscriptionsAffichees = [];
foreach (array_slice($inscriptionsEnAttente, 0, 3) as $inscription) {
    $inscription['nomComplet'] = $inscription['PRENOM_USER'] . ' ' . $inscription['NOM_USER'];
    $inscription['initiales'] = mb_strtoupper(mb_substr($inscription['PRENOM_USER'], 0, 1) . mb_substr($inscription['NOM_USER'], 0, 1));
    $inscriptionsAffichees[] = $inscription;
}


$creneauxAffiches = [];
foreach (array_slice($prochainsCreneaux, 0, 3) as $creneau) {
    $creneau['lieu'] = $creneau['SALLE'] ?? 'salle non définie';
    $creneau['inscrits'] = $creneau['nbInscrits'] . '/' . $creneau['NB_MAX_PAR'] . ' inscrit' . ($creneau['nbInscrits'] > 1 ? 's' : '');
    $creneauxAffiches[] = $creneau;
}

$activites = [];
foreach (array_slice($incidents, 0, 3) as $incident) {
    $activites[] = [
        'classeBadge' => '',
        'icone' => 'IconeAlerte.svg',
        'titre' => ($incident['TYPE_INC'] === 'Annulation' ? 'Annulation' : 'Incident signalé') . ' - ' . $incident['TITRE_EXP'],
        'texte' => $incident['DESC_INC'] . ' (' . $incident['DATE_INC_COURTE'] . ', ' . ($incident['STATUT_INC'] === 'Traite' ? 'traité' : 'ouvert') . ')',
    ];
}
foreach (array_slice($retributionsEnvoyees, 0, 2) as $retribution) {
    $pluriel = $retribution['nbEnvoyees'] > 1;
    $activites[] = [
        'classeBadge' => 'ok',
        'icone' => 'IconePaiement.svg',
        'titre' => 'Rétributions envoyées',
        'texte' => $retribution['nbEnvoyees'] . ' rétribution' . ($pluriel ? 's' : '')
            . ($retribution['TYPE_RETRIB'] !== null ? ' (' . $retribution['TYPE_RETRIB'] . ')' : '')
            . ' envoyée' . ($pluriel ? 's' : '') . ' aux participants de « ' . $retribution['TITRE_EXP'] . ' »',
    ];
}


require_once __DIR__ . '/../../Views/enseignant/TableauDeBord.php';
