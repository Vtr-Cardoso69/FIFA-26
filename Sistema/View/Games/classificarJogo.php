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
</head>
<body>

<form method="POST">
    <label for="gols_mandante">Gols Mandante: </label>
    <input type="number" name="gols_mandante" placeholder="Gols Mandante" required><br>
    <label for="gols_visitante">Gols Visitante: </label>
    <input type="number" name="gols_visitante" placeholder="Gols Visitante" required><br>
    <input type="submit" value="Classificar Jogo">
</form>
    
</body>
</html>

<?php
 
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $gols_mandante = $_POST['gols_mandante'];
    $gols_visitante = $_POST['gols_visitante'];

    $gameController->atualizarGols($gols_mandante, $gols_visitante, $id);
}
?>