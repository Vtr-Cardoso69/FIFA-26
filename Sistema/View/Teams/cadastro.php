
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
<link rel="stylesheet" href="../../../cssTeam/cadastro.css">
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

<div class='form'>
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
        </div>
            <br>
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
