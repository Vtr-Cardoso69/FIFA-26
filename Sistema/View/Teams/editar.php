gi
<?php
require_once __DIR__ . '/../../DB/Database.php';
require_once __DIR__ . '/../../Controller/TeamsC.php';
$TeamController = new TeamController($pdo);

if($_SERVER['REQUEST_METHOD'] == 'POST'){

  $nome = $_POST['nome'];
  $grupo_id = $_POST['grupo_id'];
  $continente = $_POST['continente'];
  $jogos = $_POST['jogos'];
  $TeamController -> editar( $nome, $grupo_id, $continente, $jogos );
  header("Location: ../../index.php");

 
}
 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Seleção</title>
</head>
<body>
    <form method="POST">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome"><br><br>
        <label for="grupo_id">Grupo:</label>
        <input type="number" id="grupo_id" name="grupo_id"><br><br>
        <label for="jogos">Jogos:</label>
        <input type="number" id="jogos" name="jogos"><br><br>
        <select id="continente" name="continente">
        <option value="">-- Selecione --</option>
        <option value="africa">África</option>
        <option value="america">América</option>
        <option value="europa">Europa</option>
        <option value="asia">Ásia</option>
        <option value="oceania">Oceania</option>
  </select>
        <input type="submit" value="Editar">
</form>
</body>
</html>
