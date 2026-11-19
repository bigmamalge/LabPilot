<?php

require_once __DIR__ . '/../../models/tables/utilisateurs/UtilisateurModel.php';
require_once __DIR__ . '/../../models/vues/utilisateurs/RoleUtilisateurModel.php';
require_once __DIR__ . '/../../models/tables/laboratoire/EquipeModel.php';
require_once __DIR__ . '/../../models/tables/experimentations/ExperimentationModel.php';
require_once __DIR__ . '/../../models/tables/experimentations/IncidentModel.php';
require_once __DIR__ . '/../../models/tables/planning/CreneauModel.php';
require_once __DIR__ . '/../../models/tables/participants/ParticipantModel.php';

$userModel = new UtilisateurModel();

$user = $userModel->getUtilisateurById($_SESSION['id']);

$roleUserModel = new RoleUtilisateurModel();

$roleUser = $roleUserModel->getRoleUtilisateurByIdUser($_SESSION['id']);

$equipeModel = new EquipeModel();

$equipe = $equipeModel->getEquipeResponsableByUserID($_SESSION['id']);

$experimentationModel = new ExperimentationModel();

$experimentations = $experimentationModel->getExperimentationsEquipeByUserID($_SESSION['id']);

$incidentModel = new IncidentModel();

$incidents = $incidentModel->getIncidentsEquipeByUserID($_SESSION['id']);

$creneauModel = new CreneauModel();

$creneauxAValider = $creneauModel->getCreneauxAValiderEquipeByUserID($_SESSION['id']);

$participantModel = new ParticipantModel();

$genres = $participantModel->getRepartitionGenreEquipeByUserID($_SESSION['id']);


$prenom = $user["PRENOM_USER"];
$nom = $user["NOM_USER"];
$nom_complet = $prenom . " " . $nom;
$initiales = $prenom[0] . $nom[0];
$poste = $roleUser[0]['LIB_ROLE'];
$fonction = $poste;
$espace = "espace " . $poste;

$nomEquipe = $equipe !== null ? $equipe['NOM_EQUIPE'] . ' — ' . $equipe['SIGLE_LABO'] : 'aucune équipe';

$nbExperimentations = count($experimentations);
$nbEnCours = count(array_filter($experimentations, fn($exp) => $exp['STATUT'] === 'run'));
$nbParticipants = array_sum(array_column($genres, 'nb'));

$taux = array_filter(array_column($experimentations, 'TAUX'), fn($valeur) => $valeur !== null);
if (count($taux) > 0) {
    $tauxParticipationMoyen = round(array_sum($taux) / count($taux)) . '%';
    $detailTaux = 'sur ' . count($taux) . ' expérimentation' . (count($taux) > 1 ? 's' : '');
} else {
    $tauxParticipationMoyen = '–';
    $detailTaux = 'Aucune présence saisie';
}

$nbIncidentsOuverts = count(array_filter($incidents, fn($incident) => $incident['STATUT_INC'] === 'Ouvert'));

$experimentationsAffichees = [];
foreach (array_slice($experimentations, 0, 5) as $exp) {
    $exp['chercheur'] = $exp['CHERCHEUR'] ?? 'Non attribué';
    $experimentationsAffichees[] = $exp;
}

$notifications = [];
foreach (array_slice($incidents, 0, 3) as $incident) {
    $notifications[] = [
        'classe' => 'warn',
        'icone' => 'IconeAlerte.svg',
        'titre' => $incident['TYPE_INC'] === 'Annulation' ? 'Annulation' : 'Incident signalé',
        'texte' => $incident['TITRE_EXP'] . ' — ' . $incident['DESC_INC'] . ' (' . $incident['DATE_INC_COURTE'] . ')',
    ];
}
foreach (array_slice($creneauxAValider, 0, 2) as $creneau) {
    $notifications[] = [
        'classe' => '',
        'icone' => 'Statistiques3.svg',
        'titre' => 'Créneau à valider',
        'texte' => $creneau['TITRE_EXP'] . ' — créneau du ' . $creneau['DATE_COURTE'] . ' à ' . $creneau['HEURE'],
    ];
}


require_once __DIR__ . '/../../Views/responsable/TableauDeBord.php';
