<?php
require_once __DIR__ . '/../models/tables/utilisateurs/UtilisateurModel.php';

if (isset($_POST["identifiant"]) && isset($_POST["password"])) {

    $UtilisateurModel = new UtilisateurModel();

    $utilisateur = $UtilisateurModel->getUtilisateurByIdSso($_POST["identifiant"]);

    //var_dump($utilisateur);

    if ($utilisateur && password_verify($_POST["password"], $utilisateur["MDP_USER"])) {
        //session_start();
        //$_SESSION["id"] = $utilisateur["ID_USER"];
        echo "Connexion réussie !";
        $roleID = $utilisateur["ID_ROLE"];
        switch ($roleID) {
            case 1:
                // Rediriger vers la page de l'enseignant
                header("Location: enseignant/TableauDeBordController.php");
                exit();
            case 2:
                // Rediriger vers la page du Gestionnaire
                header("Location: gestionnaire/TableauDeBordController.php");
                exit();
            case 3:
                // Rediriger vers la page du participant
                header("Location: participant/TableauDeBordController.php");
                exit();
            case 4:
                // Rediriger vers la page du responsable
                header("Location: responsable/TableauDeBordController.php");
                exit();
            case 5:
                // Rediriger vers la page du directeur
                header("Location: directeur/TableauDeBordController.php");
                exit();
            case 6:
                // Rediriger vers la page de l'administrateur
                header("Location: administrateur/TableauDeBordController.php");
                exit();
            default:
                echo "Rôle inconnu.";
        }

    } else {
        echo "Identifiant ou mot de passe incorrect.";
    }

}