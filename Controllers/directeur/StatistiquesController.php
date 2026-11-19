<?php

require_once __DIR__ . '/../../models/tables/utilisateurs/UtilisateurModel.php';
require_once __DIR__ . '/../../models/vues/utilisateurs/RoleUtilisateurModel.php';
require_once __DIR__ . '/../../models/tables/laboratoire/LaboratoireModel.php';
require_once __DIR__ . '/../../models/tables/laboratoire/EquipeModel.php';
require_once __DIR__ . '/../../models/tables/experimentations/ExperimentationModel.php';
require_once __DIR__ . '/../../models/tables/participants/ParticipantModel.php';

$userModel = new UtilisateurModel();

$user = $userModel->getUtilisateurById($_SESSION['id']);

$roleUserModel = new RoleUtilisateurModel();

$roleUser = $roleUserModel->getRoleUtilisateurByIdUser($_SESSION['id']);

$laboratoireModel = new LaboratoireModel();

$laboratoire = $laboratoireModel->getLaboratoireByUserID($_SESSION['id']);

$equipeModel = new EquipeModel();

$equipes = $equipeModel->getStatistiquesEquipesByUserID($_SESSION['id']);

$experimentationModel = new ExperimentationModel();

$experimentations = $experimentationModel->getExperimentationsLaboratoireByUserID($_SESSION['id']);

$participantModel = new ParticipantModel();

$genres = $participantModel->getRepartitionGenreLaboratoireByUserID($_SESSION['id']);


$prenom = $user["PRENOM_USER"];
$nom = $user["NOM_USER"];
$nom_complet = $prenom . " " . $nom;
$initiales = $prenom[0] . $nom[0];
$poste = $roleUser[0]['LIB_ROLE'];
$fonction = $poste;
$espace = "espace " . $poste;
$sigleLabo = $laboratoire['SIGLE_LABO'] ?? '';

$nbEquipes = count($equipes) . ' équipe' . (count($equipes) > 1 ? 's' : '');
$nbExperimentations = count($experimentations);
$nbRetributions = array_sum(array_column($experimentations, 'nbRetributions'));

$taux = array_filter(array_column($experimentations, 'TAUX'), fn($valeur) => $valeur !== null);
if (count($taux) > 0) {
    $tauxParticipationMoyen = round(array_sum($taux) / count($taux)) . '%';
    $detailTaux = 'sur ' . count($taux) . ' expérimentation' . (count($taux) > 1 ? 's' : '');
} else {
    $tauxParticipationMoyen = '–';
    $detailTaux = 'Aucune présence saisie';
}

foreach ($equipes as $i => $equipe) {
    $equipes[$i]['largeur'] = $nbExperimentations > 0 ? round($equipe['nbExperimentations'] * 100 / $nbExperimentations) : 0;
    if ($equipe['TAUX'] === null) {
        $equipes[$i]['couleur'] = 'var(--border)';
    } elseif ($equipe['TAUX'] >= 80) {
        $equipes[$i]['couleur'] = 'var(--succes-text)';
    } elseif ($equipe['TAUX'] < 50) {
        $equipes[$i]['couleur'] = '#6d3fd1';
    } else {
        $equipes[$i]['couleur'] = 'var(--primary)';
    }
}

$couleursGenre = ['Femme' => ['Femmes', '#d4451b'], 'Homme' => ['Hommes', '#3d6d89']];
$repartitionGenre = ['Femmes' => 0, 'Hommes' => 0, 'Autre / NC' => 0];
foreach ($genres as $genre) {
    $libelle = $couleursGenre[$genre['GEN_PAR']][0] ?? 'Autre / NC';
    $repartitionGenre[$libelle] += $genre['nb'];
}
$totalParticipants = array_sum($repartitionGenre);

$circonference = 376.99;
$segmentsDonut = [];
$decalageDonut = 0;
foreach (['Femmes' => '#d4451b', 'Autre / NC' => '#757575', 'Hommes' => '#3d6d89'] as $libelle => $couleur) {
    $longueur = $totalParticipants > 0 ? $repartitionGenre[$libelle] / $totalParticipants * $circonference : 0;
    $segmentsDonut[] = ['couleur' => $couleur, 'longueur' => round($longueur, 2), 'decalage' => round($decalageDonut, 2)];
    $decalageDonut += $longueur;
}

$legendeGenre = [];
foreach (['Femmes' => '#d4451b', 'Hommes' => '#3d6d89', 'Autre / NC' => '#757575'] as $libelle => $couleur) {
    $legendeGenre[] = [
        'libelle' => $libelle,
        'couleur' => $couleur,
        'pourcent' => $totalParticipants > 0 ? round($repartitionGenre[$libelle] * 100 / $totalParticipants) : 0,
    ];
}


require_once __DIR__ . '/../../Views/directeur/statistiques.php';
