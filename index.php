<?php
session_start();

if (!isset($_SESSION["id"])) {
    require_once __DIR__ . '/Controllers/connection/ssoController.php';
}
if (isset($_SESSION["id"])) {
    require_once __DIR__ . '/Controllers/ThemeController.php';
}
if (isset($_GET["Controlleur"])) {
    require_once __DIR__ . '/Controllers/Controller.php';
}
if (isset($_SESSION["id"]) && !isset($_GET["Controlleur"]) && (!isset($_GET["Role"]) || $_GET["Role"] != $themeUser["ID_ROLE"])) {
    header("Location: index.php?Role=" . $themeUser["ID_ROLE"] . "&Page=1");
    exit;
}
if (isset($_SESSION["id"]) && isset($_GET["Role"])) {
    switch ($_GET["Role"]) {
        case 1:
            if (isset($_GET["Page"])) {
                switch ($_GET["Page"]) {
                    case 1:
                        require_once __DIR__ . '/Controllers/enseignant/TableauDeBordController.php';
                        break;
                    case 2:
                        require_once __DIR__ . '/Controllers/enseignant/ExperimentationsController.php';
                        break;
                    case 3:
                        require_once __DIR__ . '/Controllers/enseignant/PlanningController.php';
                        break;
                    case 4:
                        require_once __DIR__ . '/Controllers/enseignant/ParticipantsController.php';
                        break;
                    case 5:
                        require_once __DIR__ . '/Controllers/enseignant/RessourcesController.php';
                        break;
                    case 6:
                        require_once __DIR__ . '/Controllers/enseignant/StatistiquesController.php';
                        break;
                    case 7:
                        require_once __DIR__ . '/Controllers/enseignant/CommunicationsController.php';
                        break;
                    case 8:
                        require_once __DIR__ . '/Controllers/enseignant/ParametresController.php';
                        break;
                    default:
                        echo "Page inconnue.";
                        break;
                }
            }

            break;
        case 2:
            if (isset($_GET["Page"])) {
                switch ($_GET["Page"]) {
                    case 1:
                        require_once __DIR__ . '/Controllers/gestionnaire/TableauDeBordController.php';
                        break;
                    case 2:
                        require_once __DIR__ . '/Controllers/gestionnaire/ExperimentationsController.php';
                        break;
                    case 3:
                        require_once __DIR__ . '/Controllers/gestionnaire/PlanningController.php';
                        break;
                    case 4:
                        require_once __DIR__ . '/Controllers/gestionnaire/ParticipantsController.php';
                        break;
                    case 5:
                        require_once __DIR__ . '/Controllers/gestionnaire/RessourcesController.php';
                        break;
                    case 6:
                        require_once __DIR__ . '/Controllers/gestionnaire/StatistiquesController.php';
                        break;
                    case 7:
                        require_once __DIR__ . '/Controllers/gestionnaire/ParametresController.php';
                        break;
                    default:
                        echo "Page inconnue.";
                        break;
                }
            }

            break;
        case 3:
            if (isset($_GET["Page"])) {
                switch ($_GET["Page"]) {
                    case 1:
                        require_once __DIR__ . '/Controllers/participant/TableauDeBordController.php';
                        break;
                    case 2:
                        require_once __DIR__ . '/Controllers/participant/ProfilController.php';
                        break;
                    case 3:
                        require_once __DIR__ . '/Controllers/participant/ExperimentationsController.php';
                        break;
                    case 4:
                        require_once __DIR__ . '/Controllers/participant/HistoriqueController.php';
                        break;
                    default:
                        echo "Page inconnue.";
                        break;
                }
            }

            break;
        case 4:
            if (isset($_GET["Page"])) {
                switch ($_GET["Page"]) {
                    case 1:
                        require_once __DIR__ . '/Controllers/responsable/TableauDeBordController.php';
                        break;
                    case 2:
                        require_once __DIR__ . '/Controllers/responsable/ExperimentationsController.php';
                        break;
                    case 3:
                        require_once __DIR__ . '/Controllers/responsable/PlanningsController.php';
                        break;
                    case 4:
                        require_once __DIR__ . '/Controllers/responsable/StatistiquesController.php';
                        break;
                    default:
                        echo "Page inconnue.";
                        break;
                }
            }

            break;
        case 5:
            if (isset($_GET["Page"])) {
                switch ($_GET["Page"]) {
                    case 1:
                        require_once __DIR__ . '/Controllers/directeur/TableauDeBordController.php';
                        break;
                    case 2:
                        require_once __DIR__ . '/Controllers/directeur/ExperimentationsController.php';
                        break;
                    case 3:
                        require_once __DIR__ . '/Controllers/directeur/PlanningsController.php';
                        break;
                    case 4:
                        require_once __DIR__ . '/Controllers/directeur/RessourcesController.php';
                        break;
                    case 5:
                        require_once __DIR__ . '/Controllers/directeur/StatistiquesController.php';
                        break;
                    default:
                        echo "Page inconnue.";
                        break;
                }
            }

            break;
        case 6:
            if (isset($_GET["Page"])) {
                switch ($_GET["Page"]) {
                    case 1:
                        require_once __DIR__ . '/Controllers/administrateur/TableauDeBordController.php';
                        break;
                    case 2:
                        require_once __DIR__ . '/Controllers/administrateur/UtilisateursController.php';
                        break;
                    case 3:
                        require_once __DIR__ . '/Controllers/administrateur/ParametrageController.php';
                        break;
                    case 4:
                        require_once __DIR__ . '/Controllers/administrateur/SecuriteController.php';
                        break;
                    case 5:
                        require_once __DIR__ . '/Controllers/administrateur/ModelesController.php';
                        break;
                    default:
                        echo "Page inconnue.";
                        break;
                }
            }

            break;
        default:
            echo "Rôle inconnu.";
            break;
    }
} else {
    require_once __DIR__ . '/Controllers/connection/ssoController.php';
}
