<?php
require_once __DIR__ . '/../../DB/Database.php';
require_once __DIR__ . '/../../Controller/GroupsC.php';

$GroupController = new GroupController($pdo);

$id = $_GET['id'] ?? null;
if (!$id) {
    header('Location: listar.php');
    exit();
}

$group = $GroupController->buscarGroup($id);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // confirmação via POST
    if (isset($_POST['confirm']) && $_POST['confirm'] === 'yes') {
        $GroupController->deletar($id);
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
    <title>Deletar Grupo - FIFA-26</title>
    <link rel="stylesheet" href="../../../cssTeam/listar.css">
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
    </nav>
</header>

<main style="padding:24px;">
    <?php if ($group): ?>
        <h3>Confirmar exclusão</h3>
        <p>Tem certeza que deseja excluir o grupo: <strong><?= htmlspecialchars($group['nome']) ?></strong>?</p>
        <form method="post">
            <button type="submit" name="confirm" value="yes" style="background:#c62828;color:#fff;padding:8px 12px;border:none;border-radius:4px;">Sim, excluir</button>
            <a href="listar.php" style="margin-left:12px;">Cancelar</a>
        </form>
    <?php else: ?>
        <p>Grupo não encontrado.</p>
        <p><a href="listar.php">Voltar</a></p>
    <?php endif; ?>
</main>

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
