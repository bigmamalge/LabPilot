<?php

require_once __DIR__ . '/../../models/tables/utilisateurs/UtilisateurModel.php';
require_once __DIR__ . '/../../models/vues/utilisateurs/RoleUtilisateurModel.php';
require_once __DIR__ . '/../../models/tables/experimentations/ExperimentationModel.php';
require_once __DIR__ . '/../../models/tables/planning/CreneauModel.php';
require_once __DIR__ . '/../../models/tables/laboratoire/RessourceLaboModel.php';

$decalageSemaine = isset($_GET['Semaine']) ? (int) $_GET['Semaine'] : 0;

$userModel = new UtilisateurModel();

$user = $userModel->getUtilisateurById($_SESSION['id']);

$roleUserModel = new RoleUtilisateurModel();

$roleUser = $roleUserModel->getRoleUtilisateurByIdUser($_SESSION['id']);

$experimentationModel = new ExperimentationModel();

$experimentations = $experimentationModel->getExperimentationByUserID($_SESSION['id']);

$creneauModel = new CreneauModel();

$titreSemaine = $creneauModel->getTitreSemaine($decalageSemaine);
$joursSemaine = $creneauModel->getJoursSemaine($decalageSemaine);
$creneauxSemaine = $creneauModel->getCreneauxSemaineByUserID($_SESSION['id'], $decalageSemaine);
$prochaineJournee = $creneauModel->getProchaineJourneeByUserID($_SESSION['id']);

$ressourceLaboModel = new RessourceLaboModel();

$salles = array_filter($ressourceLaboModel->getRessourcesLaboAvecReservationsByUserID($_SESSION['id']), fn($ressource) => $ressource['TYPE_RESS_LABO'] === 'Salle');


$prenom = $user["PRENOM_USER"];
$nom = $user["NOM_USER"];
$nom_complet = $prenom . " " . $nom;
$initiales = $prenom[0] . $nom[0];
$poste = $roleUser[0]['LIB_ROLE'];
$fonction = $poste . " (LIUM)";
$espace = "espace " . $poste;

foreach ($joursSemaine as $i => $jour) {
    $joursSemaine[$i]['creneaux'] = array_filter($creneauxSemaine, fn($creneau) => $creneau['DATE_CREN'] === $jour['DATE_JOUR']);
}

foreach ($prochaineJournee as $i => $creneau) {
    if ($creneau['COMPLET']) {
        $prochaineJournee[$i]['libellePlaces'] = 'Complet';
    } else {
        $prochaineJournee[$i]['libellePlaces'] = $creneau['PLACES_RESTANTES'] . ' place' . ($creneau['PLACES_RESTANTES'] > 1 ? 's restantes' : ' restante');
    }
}

if (count($prochaineJournee) > 0) {
    $titreJournee = $prochaineJournee[0]['LIBELLE_JOUR'];
    $nbCreneauxJournee = count($prochaineJournee) . ' créneau' . (count($prochaineJournee) > 1 ? 'x' : '');
} else {
    $titreJournee = 'Aucun créneau à venir';
    $nbCreneauxJournee = '0 créneau';
}


require_once __DIR__ . '/../../Views/enseignant/planning.php';
