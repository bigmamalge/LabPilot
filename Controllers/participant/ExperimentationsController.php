<?php

require_once __DIR__ . '/../../models/tables/utilisateurs/UtilisateurModel.php';
require_once __DIR__ . '/../../models/vues/utilisateurs/RoleUtilisateurModel.php';
require_once __DIR__ . '/../../models/tables/experimentations/ExperimentationModel.php';

$userModel = new UtilisateurModel();

$user = $userModel->getUtilisateurById($_SESSION['id']);

$roleUserModel = new RoleUtilisateurModel();

$roleUser = $roleUserModel->getRoleUtilisateurByIdUser($_SESSION['id']);

$experimentationModel = new ExperimentationModel();

$experimentations = $experimentationModel->getExperimentationsDisponiblesByUserID($_SESSION['id']);


$prenom = $user["PRENOM_USER"];
$nom = $user["NOM_USER"];
$nom_complet = $prenom . " " . $nom;
$initiales = $prenom[0] . $nom[0];
$poste = $roleUser[0]['LIB_ROLE'];
$fonction = $poste;
$espace = "espace " . $poste;

$types = array_unique(array_filter(array_column($experimentations, 'NOM_MODELE')));
$chercheurs = array_unique(array_filter(array_column($experimentations, 'CHERCHEUR')));

$boutons = [
    'attente' => ['', 'Voir ma demande', 'index.php?Role=3&Page=4'],
    'inscrit' => ['', 'Voir mon inscription', 'index.php?Role=3&Page=4'],
    'ouverte' => ['primary', 'Voir la fiche et m\'inscrire', '#'],
    'complet' => ['off', 'Complet — inscriptions closes', '#'],
    'noneligible' => ['off', 'Non éligible', '#'],
    'cloturee' => ['off', 'Inscriptions closes', '#'],
];

foreach ($experimentations as $i => $exp) {
    $experimentations[$i]['responsable'] = ($exp['CHERCHEUR'] ?? 'Non attribué') . ($exp['SIGLE_LABO'] !== null ? ' (' . $exp['SIGLE_LABO'] . ')' : '');
    $bouton = $boutons[$exp['ETAT']];
    if ($exp['ETAT'] === 'cloturee' && $exp['nbParticipationsPassees'] > 0) {
        $bouton = ['', 'Voir dans mon historique', 'index.php?Role=3&Page=4'];
    }
    $experimentations[$i]['bouton'] = $bouton;

    if ($exp['nbParticipationsPassees'] > 0) {
        $experimentations[$i]['eligibilite'] = ['ok', 'pexp_Svg2.svg', 'Vous avez déjà participé à cette étude'];
    } elseif ($exp['nbRestrictionsNonValidees'] > 0) {
        $experimentations[$i]['eligibilite'] = ['ko', 'pexp_Svg3.svg', 'Critère non rempli : ' . $exp['RESTRICTIONS_NON_VALIDEES']];
    } else {
        $experimentations[$i]['eligibilite'] = ['ok', 'pexp_Svg2.svg', 'Vous êtes éligible' . ($exp['RESTRICTIONS'] !== null ? ' (' . $exp['RESTRICTIONS'] . ')' : '')];
    }
}


require_once __DIR__ . '/../../Views/participant/experimentations.php';
