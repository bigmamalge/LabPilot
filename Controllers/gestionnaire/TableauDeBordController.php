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
$fonction = $poste;

$nbExperimentationsActives = count(array_filter($experimentations, fn($exp) => $exp['STATUT'] === 'run'));
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


require_once __DIR__ . '/../../Views/gestionnaire/TableauDeBord.php';
