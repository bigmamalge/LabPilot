<?php

require_once __DIR__ . '/../../models/tables/utilisateurs/UtilisateurModel.php';
require_once __DIR__ . '/../../models/vues/utilisateurs/RoleUtilisateurModel.php';
require_once __DIR__ . '/../../models/tables/experimentations/ExperimentationModel.php';
require_once __DIR__ . '/../../models/tables/participants/ParticipationModel.php';
require_once __DIR__ . '/../../models/tables/participants/ParticipantModel.php';
require_once __DIR__ . '/../../models/vues/experimentations/StatistiquesExperimentationModel.php';

$userModel = new UtilisateurModel();

$user = $userModel->getUtilisateurById($_SESSION['id']);

$roleUserModel = new RoleUtilisateurModel();

$roleUser = $roleUserModel->getRoleUtilisateurByIdUser($_SESSION['id']);

$experimentationModel = new ExperimentationModel();

$experimentations = $experimentationModel->getExperimentationByUserID($_SESSION['id']);

$statistiquesModel = new StatistiquesExperimentationModel();

$indicateurs = $statistiquesModel->getIndicateursByUserID($_SESSION['id']);
$tauxParticipation = $statistiquesModel->getTauxParticipationMoyenByUserID($_SESSION['id']);
$statistiques = $statistiquesModel->getStatistiquesByUserID($_SESSION['id']);

$participationModel = new ParticipationModel();

$semaines = $participationModel->getInscriptionsParSemaineByUserID($_SESSION['id']);

$participantModel = new ParticipantModel();

$genres = $participantModel->getRepartitionGenreByUserID($_SESSION['id']);
$ages = $participantModel->getRepartitionAgeByUserID($_SESSION['id']);


$prenom = $user["PRENOM_USER"];
$nom = $user["NOM_USER"];
$nom_complet = $prenom . " " . $nom;
$initiales = $prenom[0] . $nom[0];
$poste = $roleUser[0]['LIB_ROLE'];
$fonction = $poste . " (LIUM)";
$espace = "espace " . $poste;

if ($tauxParticipation['tauxMoyen'] !== null) {
    $tauxParticipationMoyen = round($tauxParticipation['tauxMoyen']) . '%';
    $detailTaux = 'sur ' . $tauxParticipation['nbExpMesurees'] . ' expérimentation' . ($tauxParticipation['nbExpMesurees'] > 1 ? 's' : '');
} else {
    $tauxParticipationMoyen = '–';
    $detailTaux = 'Aucune présence saisie';
}

$nbPresenceSaisies = $indicateurs['nbPresents'] + $indicateurs['nbAbsents'];
$tauxAbsence = $nbPresenceSaisies > 0 ? round($indicateurs['nbAbsents'] * 100 / $nbPresenceSaisies) . '%' : '–';


$maxCumule = max(array_column($semaines, 'nbCumule'));
$pointsCourbe = [];
foreach ($semaines as $i => $semaine) {
    $pointsCourbe[] = [
        'x' => 30 + $i * 137,
        'y' => $maxCumule > 0 ? 197 - round($semaine['nbCumule'] * 171 / $maxCumule) : 197,
        'libelle' => $semaine['LIBELLE_SEMAINE'],
        'valeur' => $semaine['nbCumule'],
    ];
}
$polyline = implode(' ', array_map(fn($point) => $point['x'] . ',' . $point['y'], $pointsCourbe));


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
foreach (['Hommes' => '#3d6d89', 'Autre / NC' => '#8489b8', 'Femmes' => '#d4451b'] as $libelle => $couleur) {
    $longueur = $totalParticipants > 0 ? $repartitionGenre[$libelle] / $totalParticipants * $circonference : 0;
    $segmentsDonut[] = ['couleur' => $couleur, 'longueur' => round($longueur, 2), 'decalage' => round($decalageDonut, 2)];
    $decalageDonut += $longueur;
}

$legendeGenre = [];
foreach (['Femmes' => '#d4451b', 'Hommes' => '#3d6d89', 'Autre / NC' => '#8489b8'] as $libelle => $couleur) {
    $legendeGenre[] = [
        'libelle' => $libelle,
        'couleur' => $couleur,
        'pourcent' => $totalParticipants > 0 ? round($repartitionGenre[$libelle] * 100 / $totalParticipants) : 0,
    ];
}


$inscriptionsParExperimentation = array_slice(array_filter($statistiques, fn($stat) => $stat['NB_INSCRITS'] > 0), 0, 5);
$maxInscriptions = max(array_merge([1], array_column($inscriptionsParExperimentation, 'NB_INSCRITS')));
foreach ($inscriptionsParExperimentation as $i => $stat) {
    $inscriptionsParExperimentation[$i]['largeur'] = round($stat['NB_INSCRITS'] * 100 / $maxInscriptions);
}

$totalAges = array_sum(array_column($ages, 'nb'));
foreach ($ages as $i => $age) {
    $ages[$i]['pourcent'] = $totalAges > 0 ? round($age['nb'] * 100 / $totalAges) : 0;
}
$maxPourcentAge = max(array_merge([1], array_column($ages, 'pourcent')));
foreach ($ages as $i => $age) {
    $ages[$i]['largeur'] = round($age['pourcent'] * 100 / $maxPourcentAge);
}


require_once __DIR__ . '/../../Views/enseignant/statistiques.php';
