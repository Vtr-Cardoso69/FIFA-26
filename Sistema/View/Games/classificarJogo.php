<?php
require_once "C:/Turma2/xampp/htdocs/FIFA-26/Sistema/DB/Database.php";
require_once "C:/Turma2/xampp/htdocs/FIFA-26/Sistema/Controller/GameC.php";

$gameController = new GameController($pdo);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FIFA-26</title>
    <link rel="stylesheet" href="../../../cssGame/classificar.css">
</head>
<body>
    <style>
        :root {
            --primary-color: #004d98; /* Azul FIFA */
            --secondary-color: #ffffff;
            --accent-color: #ed1c24; /* Vermelho FIFA */
            --dark-bg: #0b0e14;
        }
</style>
<header>
  <h2>FIFA-<span style="color: var(--primary-color);">26</span></h2>
</header>
<div class="form">
<form method="POST">
    <label for="gols_mandante">Gols Mandante: </label>
    <input type="number" name="gols_mandante" placeholder="Gols Mandante" required><br>
    <label for="gols_visitante">Gols Visitante: </label>
    <input type="number" name="gols_visitante" placeholder="Gols Visitante" required><br>
    <input type="submit" value="Classificar Jogo">
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

<?php

$id = $_GET['id'];
 
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $gols_mandante = $_POST['gols_mandante'];
    $gols_visitante = $_POST['gols_visitante'];

    $gameController->atualizarGols($gols_mandante, $gols_visitante, $id);
    header("Location: listarJogos.php");
    exit();
}
?>