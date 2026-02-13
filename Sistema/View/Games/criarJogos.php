<?php
require_once __DIR__ . '/../../DB/Database.php';
require_once __DIR__ . '/../../Model/TeamsM.php';
require_once __DIR__ . '/../../Model/GroupsM.php';
require_once __DIR__ . '/../../Controller/GameC.php';

$teamModel = new TeamModel($pdo);
$selecoes = $teamModel->buscarTodasSelecoes();

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
    <link rel="stylesheet" href="../../../css/criarJogos.css">
</head>
<body>

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
    <select name="grupo" id="grupo" required>
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
   
    
<!--<input type="text" name="selecao_mandante_id" placeholder="Seleção Mandante"><br>
    <input type="text" name="selecao_visitante_id" placeholder="Seleção Visitante"><br>
    <input type="datetime-local" name="data_hora" placeholder="Data e Hora"><br>
    <input type="text" name="estadio" placeholder="Estádio"><br>
    <input type="text" name="fase" placeholder="Fase"><br>
    <input type="text" name="grupo_id" placeholder="Grupo"><br>
    <button type="submit">Criar Jogo</button>
<label for=""></label>-->
</form>
    
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
