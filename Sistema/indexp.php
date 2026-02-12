
<?php
require_once __DIR__ . '/DB/Database.php';
require_once __DIR__ . '/Controller/TeamsC.php';
require_once __DIR__ . '/Controller/GroupsC.php';



$GroupController = new GroupController($pdo);
$GroupController->quadro();

$TeamController = new TeamController($pdo);
$TeamController->listar();


?>
