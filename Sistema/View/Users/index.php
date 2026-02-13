<?php
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

