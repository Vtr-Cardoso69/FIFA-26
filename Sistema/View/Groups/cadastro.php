<?php
require_once __DIR__ . '/../../DB/Database.php';
require_once __DIR__ . '/../../Controller/GroupsC.php';
$GroupController = new GroupController($pdo);

if($_SERVER['REQUEST_METHOD'] == 'POST'){

  $nome = $_POST['nome'];
 
  $GroupController->cadastrar($nome);
  header("Location: listar.php");
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Grupo</title>
    <link rel="stylesheet" href="../../../cssTeam/cadastro.css">
    <style>
        :root {
            --primary-color: #004d98; /* Azul FIFA */
            --secondary-color: #ffffff;
            --accent-color: #ed1c24; /* Vermelho FIFA */
            --dark-bg: #0b0e14;
        }
    </style>
</head>
<body>
<header>
  <h2>FIFA-<span style="color: var(--primary-color);">26</span></h2>
  <nav class="nav">
      <ul>
      <li><a href="../../../index.php">Início</a></li>
      <li><a href="../Teams/listar.php">Seleções</a></li>
      <li><a href="../Games/listarJogos.php">Jogos</a></li>
        <li><a href="../Games/classificacaoGeral.php">Classificação Geral</a></li>
    </ul>
</header>

<div class='form'>
    <form method="POST">
        <label for="nome">Nome do Grupo:</label>
        <input type="text" id="nome" name="nome" required><br><br>
        <input type="submit" value="Cadastrar">
    </form>
</div>

<footer class="footer">
    <div class="container">
        <p>&copy; 2026 FIFA World Cup Project - Desenvolvido por FIFA DEVs</p>
        <div class="">
            <a href="https://github.com/WPOTC">Colaborador 1</a>
            <a href="https://github.com/PedroSENAI2008">Colaborador 2</a>
            <a href="https://github.com/Vtr-Cardoso69">Colaborador 3</a>
        </div>
    </div>
</footer>
</body>
</html>
