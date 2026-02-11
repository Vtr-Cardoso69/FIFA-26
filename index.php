<?php
require_once 'Sistema/DB/Database.php';
require_once 'Sistema/Controller/TeamsC.php';

$TeamController = new TeamController($pdo);
$TeamController->listar();
?>