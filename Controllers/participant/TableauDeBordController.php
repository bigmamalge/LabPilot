<?php

require_once __DIR__ . '/../../models/tables/utilisateurs/UtilisateurModel.php';
require_once __DIR__ . '/../../models/vues/utilisateurs/RoleUtilisateurModel.php';
require_once __DIR__ . '/../../models/tables/participants/ParticipantModel.php';
require_once __DIR__ . '/../../models/tables/participants/ParticipationModel.php';
require_once __DIR__ . '/../../models/tables/experimentations/ExperimentationModel.php';
require_once __DIR__ . '/../../models/tables/systeme/NotificationModel.php';

$userModel = new UtilisateurModel();

$user = $userModel->getUtilisateurById($_SESSION['id']);

$roleUserModel = new RoleUtilisateurModel();

$roleUser = $roleUserModel->getRoleUtilisateurByIdUser($_SESSION['id']);

$participantModel = new ParticipantModel();

$participant = $participantModel->getParticipantByUserID($_SESSION['id']);

$participationModel = new ParticipationModel();

$participations = $participationModel->getParticipationsParticipantByUserID($_SESSION['id']);

$experimentationModel = new ExperimentationModel();

$experimentations = $experimentationModel->getExperimentationsDisponiblesByUserID($_SESSION['id']);

$notificationModel = new NotificationModel();

$notifications = array_slice($notificationModel->getNotificationsByUserID($_SESSION['id']), 0, 3);


$prenom = $user["PRENOM_USER"];
$nom = $user["NOM_USER"];
$nom_complet = $prenom . " " . $nom;
$initiales = $prenom[0] . $nom[0];
$poste = $roleUser[0]['LIB_ROLE'];
$fonction = $poste;
$espace = "espace " . $poste;

$profilIncomplet = $participant === null || $participant['AGE_PAR'] === null || $participant['GEN_PAR'] === null || $participant['LANG_PAR'] === null;

$participationsAVenir = array_values(array_filter($participations, fn($participation) => $participation['STATUT'] === 'avenir'));
$participationsTerminees = array_filter($participations, fn($participation) => $participation['STATUT'] === 'terminees');
$retributionsRecues = array_filter($participations, fn($participation) => $participation['RETRIB_ENV'] == 1);

$nbAVenir = count($participationsAVenir);
$prochaine = $nbAVenir > 0 ? 'Prochaine : ' . $participationsAVenir[0]['JOUR'] . ' ' . $participationsAVenir[0]['MOIS'] : 'Aucune prévue';
$nbEnAttente = count(array_filter($participationsAVenir, fn($participation) => $participation['STATUT_INSC'] === 'En attente'));
$nbTerminees = count($participationsTerminees);
$nbTermineesCeMois = count(array_filter($participationsTerminees, fn($participation) => $participation['CE_MOIS'] == 1));
$montantRetributions = array_sum(array_column($retributionsRecues, 'VAL_RETRIB'));
$nbRetributions = count($retributionsRecues) . ' rétribution' . (count($retributionsRecues) > 1 ? 's' : '');

$prochainesParticipations = [];
foreach (array_slice($participationsAVenir, 0, 3) as $participation) {
    $participation['lieu'] = $participation['SALLE'] !== null ? $participation['SALLE'] . ' en présentiel' : 'En ligne';
    $participation['libelle'] = $participation['STATUT_INSC'] === 'En attente' ? 'En attente' : 'Confirmé';
    $participation['classe'] = $participation['STATUT_INSC'] === 'En attente' ? 'warn' : 'info';
    $prochainesParticipations[] = $participation;
}

$suggestions = array_slice(array_filter($experimentations, fn($exp) => $exp['ETAT'] === 'ouverte'), 0, 2);

$icones = [
    'Acceptation' => '<span class="nbox"><img src="Public/assets/Participant/pdash_Groupe.svg" alt=""><img class="check" src="Public/assets/Participant/pdash_Valider1.svg" alt=""></span>',
    'Retribution' => '<img class="nbig" src="Public/assets/Participant/pdash_Groupe3.svg" alt="">',
];
foreach ($notifications as $i => $notification) {
    $notifications[$i]['icone'] = $icones[$notification['TYPE_NOTIF']] ?? '<span class="nbox warn"><img src="Public/assets/Participant/pdash_Groupe4.svg" alt=""></span>';
    $notifications[$i]['texte'] = ($notification['TITRE_EXP'] !== null ? $notification['TITRE_EXP'] . ', ' : '') . $notification['MSG_NOTIF'] . ' (' . $notification['DATE_NOTIF_FR'] . ')';
}


require_once __DIR__ . '/../../Views/participant/TableauDeBord.php';
