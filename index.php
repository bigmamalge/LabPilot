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
if (isset($_GET["Role"])) {
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
            require_once __DIR__ . '/Controllers/etudiant/TableauDeBordController.php';
            break;
        case 3:
            require_once __DIR__ . '/Controllers/admin/TableauDeBordController.php';
            break;
        default:
            echo "Rôle inconnu.";
            break;
    }
} else {
    require_once __DIR__ . '/Controllers/connection/ssoController.php';
}