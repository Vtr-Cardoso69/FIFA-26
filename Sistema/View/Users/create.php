<?php
require_once __DIR__ . '/../../DB/Database.php';
require_once __DIR__ . '/../../Model/UsersM.php';
require_once __DIR__ . '/../../Model/TeamsM.php';

$usersModel = new UsersModel($pdo);
$teamsModel = new TeamModel($pdo);

$cargos = ['Jogador', 'Técnico', 'Árbitro', 'Preparador Físico', 'Médico'];

$selecoes = $teamsModel->buscarTodasComGrupo();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dados = [
        'id' => null,
        'nome' => $_POST['nome'],
        'idade' => $_POST['idade'],
        'cargo' => $_POST['cargo'],
        'selecao_id' => $_POST['selecao_id'] ?: null
    ];

    $usersModel->salvar($dados);

    header('Location: /FIFA-26/Sistema/View/Users/list.php');
    exit;
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Usuário</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2>Novo Usuário</h2>

    <form action="create.php" method="POST">

        <div class="form-group">
            <label>Nome</label>
            <input type="text" name="nome" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Idade</label>
            <input type="number" name="idade" class="form-control" min="1" required>
        </div>

        <div class="form-group">
            <label>Cargo</label>
            <select name="cargo" class="form-control" required>
                <option value="">Selecione um cargo</option>
                <?php foreach ($cargos as $cargo_op): ?>
                    <option value="<?= htmlspecialchars($cargo_op) ?>">
                        <?= htmlspecialchars($cargo_op) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label>Seleção</label>
            <select name="selecao_id" class="form-control">
                <option value="">Nenhuma</option>
                <?php foreach ($selecoes as $selecao): ?>
                    <option value="<?= $selecao['id'] ?>">
                        <?= htmlspecialchars($selecao['nome']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="../../../index.php" class="btn btn-secondary">Cancelar</a>

    </form>
</div>

</body>
</html>
