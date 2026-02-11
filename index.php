<?php
<<<<<<< HEAD
require_once __DIR__ . '/Sistema/DB/Database.php';

$controller = isset($_GET['controller']) ? $_GET['controller'] : 'land';

switch ($controller) {
    case 'user':
        require_once __DIR__ . '/Sistema/Controller/UserC.php';
        break;
    case 'land':
    default:
        // Redirect to a landing page or list users by default
        header('Location: index.php?controller=user&action=list');
        break;
}
?>
=======
require_once 'Sistema/DB/Database.php';
require_once 'Sistema/Controller/TeamsC.php';

$TeamController = new TeamController($pdo);
$TeamController->listar();
?>
>>>>>>> 20d794c1b0bfd387b7ebcf2f11109b8f0311383a
