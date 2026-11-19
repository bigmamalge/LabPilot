<?php

require_once __DIR__ . '/../../models/tables/utilisateurs/UtilisateurModel.php';
require_once __DIR__ . '/../../models/vues/utilisateurs/RoleUtilisateurModel.php';
require_once __DIR__ . '/../../models/tables/participants/ParticipantModel.php';
require_once __DIR__ . '/../../models/tables/participants/ParticipationModel.php';
require_once __DIR__ . '/../../models/vues/participants/QuestionnairesParticipantModel.php';

$userModel = new UtilisateurModel();

$user = $userModel->getUtilisateurById($_SESSION['id']);

$roleUserModel = new RoleUtilisateurModel();

$roleUser = $roleUserModel->getRoleUtilisateurByIdUser($_SESSION['id']);

$participantModel = new ParticipantModel();

$participant = $participantModel->getParticipantByUserID($_SESSION['id']);

$participationModel = new ParticipationModel();

$participations = $participationModel->getParticipationsParticipantByUserID($_SESSION['id']);

$questionnairesModel = new QuestionnairesParticipantModel();

$questionnaires = $participant !== null ? $questionnairesModel->getQuestionnairesParticipantByIdPar($participant['ID_PAR']) : [];


$prenom = $user["PRENOM_USER"];
$nom = $user["NOM_USER"];
$nom_complet = $prenom . " " . $nom;
$initiales = $prenom[0] . $nom[0];
$poste = $roleUser[0]['LIB_ROLE'];
$fonction = $poste;
$espace = "espace " . $poste;

$questionnairesARemplir = array_filter($questionnaires, fn($questionnaire) => $questionnaire['STATUT_REP'] === 'A remplir');
$expQuestionnaireARemplir = array_column($questionnairesARemplir, 'ID_EXP');
$retributionsRecues = array_filter($participations, fn($participation) => $participation['RETRIB_ENV'] == 1);

$nbParticipations = count($participations);
$nbQuestionnaires = count($questionnairesARemplir);
$montantRetributions = array_sum(array_column($retributionsRecues, 'VAL_RETRIB'));
$nbRetributions = count($retributionsRecues) . ' rétribution' . (count($retributionsRecues) > 1 ? 's' : '');
$nbAttestations = count(array_filter($participations, fn($participation) => $participation['STATUT'] === 'terminees'));

foreach ($participations as $i => $participation) {
    $participations[$i]['creneau'] = $participation['STATUT'] === 'avenir' ? $participation['CRENEAU_COURT'] : $participation['DATE_CRENEAU'];

    if ($participation['RETRIB_ENV'] == 1) {
        $participations[$i]['retribution'] = '<span class="tag ok sm">' . htmlspecialchars($participation['RETRIBUTION']) . ' reçu</span>';
    } elseif ($participation['STATUT'] === 'terminees' && $participation['RETRIBUTION'] !== null) {
        $participations[$i]['retribution'] = '<span class="tag warn sm">' . htmlspecialchars($participation['RETRIBUTION']) . ' à recevoir</span>';
    } else {
        $participations[$i]['retribution'] = '<span class="soft">' . ($participation['STATUT'] === 'annulees' ? '-' : htmlspecialchars($participation['RETRIBUTION'] ?? 'Aucune')) . '</span>';
    }

    if ($participation['STATUT'] === 'annulees') {
        $participations[$i]['action'] = '<span class="soft">' . ($participation['LIBELLE_STATUT'] === 'Refusée' ? 'Inscription refusée par le chercheur' : 'Participation non effectuée') . '</span>';
    } elseif ($participation['STATUT'] === 'terminees' && in_array($participation['ID_EXP'], $expQuestionnaireARemplir)) {
        $participations[$i]['action'] = '<a class="fiche-btn primary" href="#">Remplir le questionnaire</a>';
    } elseif ($participation['STATUT'] === 'terminees') {
        $participations[$i]['action'] = '<button class="rnd" type="button" aria-label="Télécharger l\'attestation"><img src="Public/assets/Participant/phist_Attestation.svg" alt=""></button>';
    } else {
        $participations[$i]['action'] = '<a class="fiche-btn" href="index.php?Role=3&Page=3">Voir la fiche</a>';
    }
}


require_once __DIR__ . '/../../Views/participant/historique.php';
