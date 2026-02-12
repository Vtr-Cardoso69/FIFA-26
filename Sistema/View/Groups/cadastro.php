<?php
require_once __DIR__ . '/../../DB/Database.php';
require_once __DIR__ . '/../../Controller/GroupsC.php';
$GroupController = new GroupController($pdo);

if($_SERVER['REQUEST_METHOD'] == 'POST'){

  $nome = $_POST['nome'];
  $slot1 = isset($_POST['slot1']) ? $_POST['slot1'] : '';
  $slot2 = isset($_POST['slot2']) ? $_POST['slot2'] : '';
  $GroupController->cadastrar($nome, $slot1, $slot2, '');
  header("Location: ../../index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Grupo</title>
</head>
<body>
    <form method="POST">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome"><br><br>
        <label for="slot1">Slot 1:</label>
        <input type="text" id="slot1" name="slot1"><br><br>
        <label for="slot2">Slot 2:</label>
        <input type="text" id="slot2" name="slot2"><br><br>
        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>
