<?php

require_once __DIR__ . '/../../models/tables/utilisateurs/UtilisateurModel.php';
require_once __DIR__ . '/../../models/vues/utilisateurs/RoleUtilisateurModel.php';
require_once __DIR__ . '/../../models/tables/participants/ParticipantModel.php';

$userModel = new UtilisateurModel();

$user = $userModel->getUtilisateurById($_SESSION['id']);

$roleUserModel = new RoleUtilisateurModel();

$roleUser = $roleUserModel->getRoleUtilisateurByIdUser($_SESSION['id']);

$participantModel = new ParticipantModel();

$participant = $participantModel->getParticipantByUserID($_SESSION['id']);


$prenom = $user["PRENOM_USER"];
$nom = $user["NOM_USER"];
$nom_complet = $prenom . " " . $nom;
$initiales = $prenom[0] . $nom[0];
$poste = $roleUser[0]['LIB_ROLE'];
$fonction = $poste;
$espace = "espace " . $poste;
$email = $user["MAIL_USER"];
$consentement = (bool) $user["CONSENT_USER"];

$age = $participant['AGE_PAR'] ?? null;
$genre = $participant['GEN_PAR'] ?? '';
$langueParlee = $participant['LANG_PAR'] ?? '';
$lunettes = (bool) ($participant['LUNETTES_PAR'] ?? false);
$contraintes = $participant['CONTRAINTES_PAR'] ?? '';

$genres = ['Femme' => 'Femme', 'Homme' => 'Homme', 'Non precise' => 'Autre / NC'];
$langues = ['Francais' => 'Français', 'Anglais' => 'Anglais', 'Espagnol' => 'Espagnol', 'Arabe' => 'Arabe'];


require_once __DIR__ . '/../../Views/participant/profil.php';
