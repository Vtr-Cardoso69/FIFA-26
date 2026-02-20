<?php
require_once __DIR__ . '/../../DB/Database.php';
require_once __DIR__ . '/../../Model/TeamsM.php';
require_once __DIR__ . '/../../Model/GroupsM.php';
require_once __DIR__ . '/../../Controller/GameC.php';

$teamModel = new TeamModel($pdo);
$selecoes = $teamModel->buscarTodasComGrupo();

$groupModel = new GroupModel($pdo);
$grupos = $groupModel->buscarTodos();

$gameController = new GameController($pdo);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FIFA-26</title>
    <link rel="stylesheet" href="../../../cssGame/criarJogo.css">
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
<form method="POST" action="criarJogos.php">
    <label for="Estadio">Estádio: </label>
    <input type="text" name="estadio" placeholder="Estádio" required><br>

    <label for="selMandante">Seleção Mandante</label>
    <select name="selecao_mandante_id" id="selMandante" required>
        <option value="">Selecione a seleção mandante...</option>      
        <?php foreach ($selecoes as $s): ?>
        <option value="<?= $s['id'] ?>">
            <?= $s['id'] ?> - <?= $s['nome'] ?>
        </option>
        <?php endforeach; ?>
    </select>    

    <label for="selVisitante">Seleção Visitante</label>
    <select name="selecao_visitante_id" id="selVisitante" required>
        <option value="">Selecione a seleção visitante...</option>
        <?php foreach ($selecoes as $s): ?>
        <option value="<?= $s['id'] ?>">
            <?= $s['id'] ?> - <?= $s['nome'] ?>
        </option>
        <?php endforeach; ?>
    </select>

    <label for="Fase">Fase: </label>
    <select name="fase" id="fase" required>
    <option value="">Selecione a fase...</option>
    <option value="Grupos">Fase de Grupos</option>
    <option value="Oitavas">Oitavas de Final</option>
    <option value="Quartas">Quartas de Final</option>
    <option value="Semi">Semifinal</option>
    <option value="Final">Final</option>
    </select>

    <label for="Grupo">Grupo: </label>
    <select name="grupo" id="grupo" >
        <option value="">Selecione o grupo...</option>
        <?php foreach ($grupos as $g): ?>
        <option value="<?= $g['id'] ?>">
            <?= $g['id'] ?> - <?= $g['nome'] ?>
            </option>
        <?php endforeach; ?>
    </select>

    <label for="DataHora">Data e Hora: </label>
    <input type="datetime-local" name="data_hora" id="DataHora" required><br>
    <button type="submit">Criar Jogo</button>
   </div>
    
<!--<input type="text" name="selecao_mandante_id" placeholder="Seleção Mandante"><br>
    <input type="text" name="selecao_visitante_id" placeholder="Seleção Visitante"><br>
    <input type="datetime-local" name="data_hora" placeholder="Data e Hora"><br>
    <input type="text" name="estadio" placeholder="Estádio"><br>
    <input type="text" name="fase" placeholder="Fase"><br>
    <input type="text" name="grupo_id" placeholder="Grupo"><br>
    <button type="submit">Criar Jogo</button>
<label for=""></label>-->
</form>
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

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $selecao_mandante_id = $_POST['selecao_mandante_id'];
    $selecao_visitante_id = $_POST['selecao_visitante_id'];
    $data_hora = $_POST['data_hora'];
    $estadio = $_POST['estadio'];
    $fase = $_POST['fase'];
    $grupo_id = $_POST['grupo'];

    $gameController->criarJogo($selecao_mandante_id, $selecao_visitante_id, $data_hora, $estadio, $fase, $grupo_id);
    header('Location: listarJogos.php');
    exit();
}

?>
