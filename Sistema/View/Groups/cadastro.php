<?php
require_once __DIR__ . '/../../DB/Database.php';
require_once __DIR__ . '/../../Controller/GroupsC.php';
$GroupController = new GroupController($pdo);

if($_SERVER['REQUEST_METHOD'] == 'POST'){

  $nome = $_POST['nome'];
 
  $GroupController->cadastrar($nome,);
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
        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>
