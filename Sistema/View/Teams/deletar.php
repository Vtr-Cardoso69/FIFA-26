<?php
require_once __DIR__ . '/../../DB/Database.php';
require_once __DIR__ . '/../../Controller/TeamsC.php';

$TeamController = new TeamController($pdo);

$id = $_GET['id'] ?? null;
if (!$id) {
    header('Location: listar.php');
    exit();
}

$team = $TeamController->buscarTeam($id);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // confirmação via POST
    if (isset($_POST['confirm']) && $_POST['confirm'] === 'yes') {
        $TeamController->deletar($id);
    }
    header('Location: listar.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deletar Seleção - FIFA-26</title>
    <link rel="stylesheet" href="../../../cssTeam/listar.css">
</head>
<body>
<header>
    <h2>FIFA-<span style="color: #004d98;">26</span></h2>
    <nav class="nav">
        <ul>
            <li><a href="../../../index.php">Início</a></li>
            <li><a href="listar.php">Seleções</a></li>
            <li><a href="../Games/listarJogos.php">Jogos</a></li>
            <li><a href="../Games/classificacaoGeral.php">Classificação Geral</a></li>
        </ul>
    </nav>
</header>

<main style="padding:24px;">
    <?php if ($team): ?>
        <h3>Confirmar exclusão</h3>
        <p>Tem certeza que deseja excluir a seleção: <strong><?= htmlspecialchars($team['nome']) ?></strong>?</p>
        <form method="post">
            <button type="submit" name="confirm" value="yes" style="background:#c62828;color:#fff;padding:8px 12px;border:none;border-radius:4px;">Sim, excluir</button>
            <a href="listar.php" style="margin-left:12px;">Cancelar</a>
        </form>
    <?php else: ?>
        <p>Seleção não encontrada.</p>
        <p><a href="listar.php">Voltar</a></p>
    <?php endif; ?>
</main>

</body>
</html>
