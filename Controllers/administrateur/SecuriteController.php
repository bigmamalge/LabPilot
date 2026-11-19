<?php

require_once __DIR__ . '/../../models/tables/utilisateurs/UtilisateurModel.php';
require_once __DIR__ . '/../../models/vues/utilisateurs/RoleUtilisateurModel.php';
require_once __DIR__ . '/../../models/tables/systeme/JournalModel.php';
require_once __DIR__ . '/../../models/tables/systeme/ParametreModel.php';

$userModel = new UtilisateurModel();

$user = $userModel->getUtilisateurById($_SESSION['id']);

$roleUserModel = new RoleUtilisateurModel();

$roleUser = $roleUserModel->getRoleUtilisateurByIdUser($_SESSION['id']);

$journalModel = new JournalModel();

$journaux = $journalModel->getJournauxDetailles();

$parametreModel = new ParametreModel();

$dureeConservation = $parametreModel->getParametreById('DUREE_CONSERVATION_MOIS');
$dureeSession = $parametreModel->getParametreById('DUREE_SESSION_MINUTES');
$nbEchecsMax = $parametreModel->getParametreById('NB_ECHECS_CONNEXION_MAX');


$prenom = $user["PRENOM_USER"];
$nom = $user["NOM_USER"];
$nom_complet = $prenom . " " . $nom;
$initiales = $prenom[0] . $nom[0];
$poste = $roleUser[0]['LIB_ROLE'];
$fonction = $poste;
$espace = "espace " . $poste;

$moisConservation = $dureeConservation !== null ? (int) $dureeConservation['VAL_PARAM'] : 24;
$minutesDeconnexion = $dureeSession !== null ? (int) $dureeSession['VAL_PARAM'] : 30;
$echecsMax = $nbEchecsMax !== null ? (int) $nbEchecsMax['VAL_PARAM'] : 3;

$nbErreurs = count(array_filter($journaux, fn($journal) => $journal['ERREUR_JOURN'] == 1));
$derniereActivite = $journaux[0]['DATE_HEURE'] ?? 'Aucune';


require_once __DIR__ . '/../../Views/administrateur/securite.php';
