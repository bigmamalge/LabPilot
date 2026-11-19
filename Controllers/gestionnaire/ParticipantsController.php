<?php

require_once __DIR__ . '/../../models/tables/utilisateurs/UtilisateurModel.php';
require_once __DIR__ . '/../../models/vues/utilisateurs/RoleUtilisateurModel.php';
require_once __DIR__ . '/../../models/tables/experimentations/ExperimentationModel.php';
require_once __DIR__ . '/../../models/tables/participants/ParticipationModel.php';
require_once __DIR__ . '/../../models/tables/planning/CreneauModel.php';
require_once __DIR__ . '/../../models/vues/experimentations/StatistiquesExperimentationModel.php';

$userModel = new UtilisateurModel();

$user = $userModel->getUtilisateurById($_SESSION['id']);

$roleUserModel = new RoleUtilisateurModel();

$roleUser = $roleUserModel->getRoleUtilisateurByIdUser($_SESSION['id']);

$experimentationModel = new ExperimentationModel();

$experimentations = $experimentationModel->getExperimentationByUserID($_SESSION['id']);

$participationModel = new ParticipationModel();

$participants = $participationModel->getParticipantsByUserID($_SESSION['id']);

$creneauModel = new CreneauModel();

$prochainsCreneaux = $creneauModel->getProchainsCreneauxByUserID($_SESSION['id']);

$statistiquesModel = new StatistiquesExperimentationModel();

$tauxParticipation = $statistiquesModel->getTauxParticipationMoyenByUserID($_SESSION['id']);


$prenom = $user["PRENOM_USER"];
$nom = $user["NOM_USER"];
$nom_complet = $prenom . " " . $nom;
$initiales = $prenom[0] . $nom[0];
$poste = $roleUser[0]['LIB_ROLE'];
$fonction = $poste;
$espace = "espace " . $poste;

$demandes = array_values(array_filter($participants, fn($participant) => $participant['STATUT_INSC'] === 'En attente'));

$nbExperimentationsActives = count(array_filter($experimentations, fn($exp) => $exp['STATUT'] === 'run'));
$nbNouvellesCeMois = count(array_filter($experimentations, fn($exp) => $exp['COMMENCEE_CE_MOIS'] == 1));

$nbInscriptionsEnAttente = count($demandes);

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

$profil = $demandes[0] ?? $participants[0] ?? null;
if (isset($_GET['Par'])) {
    foreach ($participants as $participant) {
        if ($participant['ID_PAR'] == (int) $_GET['Par']) {
            $profil = $participant;
            break;
        }
    }
}

$retributionsATraiter = array_filter($participants, fn($participant) => $participant['LIBELLE_RETRIB'] === 'À envoyer');
$retributionsEnvoyees = array_slice(array_filter($participants, fn($participant) => $participant['LIBELLE_RETRIB'] === 'Envoyée'), 0, 2);


require_once __DIR__ . '/../../Views/gestionnaire/participants.php';
