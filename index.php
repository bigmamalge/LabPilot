<?php
session_start();

if (!isset($_SESSION["id"])) {
    require_once __DIR__ . '/Controllers/connection/ssoController.php';
}
if (isset($_GET["Controlleur"])) {
    require_once __DIR__ . '/Controllers/Controller.php';
}
if (isset($_GET["Role"])) {
    switch ($_GET["Role"]) {
        case 1:
            require_once __DIR__ . '/Controllers/enseignant/TableauDeBordController.php';
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