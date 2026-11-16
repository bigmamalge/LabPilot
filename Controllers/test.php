<?php


require_once __DIR__.'/../model/RoleModel.php';

echo "Test de la classe RoleModel :<br>";
$roleModel = new RoleModel();
$roles = $roleModel->getAllRoles();
foreach ($roles as $role) {
    echo "ID: " . $role['ID_ROLE'] . ", Name: " . $role['LIB_ROLE'] .", Description : ". $role['DESC_ROLE'] ."<br>";
}