
<?php
require_once __DIR__ . '/../../DB/Database.php';
require_once __DIR__ . '/../../Controller/TeamsC.php';
require_once __DIR__ . '/../../Model/GroupsM.php';

$TeamController = new TeamController($pdo);
$groupModel = new GroupModel($pdo);
$grupos = $groupModel->buscarTodos();

if($_SERVER['REQUEST_METHOD'] == 'POST'){

  $nome = $_POST['nome'];
  $grupo_id = $_POST['grupo_id'];
  $continente = $_POST['continente'];
  $jogos = $_POST['jogos'];
  $TeamController -> cadastrar( $nome, $grupo_id, $continente, $jogos );
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
            <select id="grupo_id" name="grupo_id">
                <option value="">-- Selecione --</option>
                <?php foreach ($grupos as $g): ?>
                    <option value="<?php echo $g['id']; ?>"><?php echo htmlspecialchars($g['nome']); ?></option>
                <?php endforeach; ?>
            </select><br><br>



            <label for="continente">Continente:</label>
            <select id="continente" name="continente">
                <option value="">-- Selecione --</option>
                <option value="África">África</option>
                <option value="America">América</option>
                <option value="Europa">Europa</option>
                <option value="Ásia">Ásia</option>
                <option value="Oceania">Oceania</option>
            </select>
            <input type="submit" value="Cadastrar">
</html>
