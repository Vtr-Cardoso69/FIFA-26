<?php
require_once __DIR__ . '/../../DB/Database.php';
require_once __DIR__ . '/../../Controller/TeamsC.php';
require_once __DIR__ . '/../../Controller/GroupsC.php';

/* ===== CONTROLLERS ===== */
$TeamController  = new TeamController($pdo);
$GroupController = new GroupController($pdo);

/* ===== BUSCA OS DADOS ANTES DE USAR ===== */
$teams = $TeamController->listar();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FIFA-26</title>

    <link rel="stylesheet" href="../../../cssTeam/listar.css">

    <style>
        :root {
            --primary-color: #004d98;
            --secondary-color: #ffffff;
            --accent-color: #ed1c24;
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

<button>
    <a href="/FIFA-26/Sistema/View/Teams/cadastro.php">Cadastrar</a>
</button>

<hr>

<?php if (empty($teams)) : ?>

    <p>Nenhum time cadastrado.</p>

<?php else : ?>

<table border="1" cellpadding="5" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome do Time</th>
            <th>Grupo</th>
            <th>Continente</th>
            <th>Ações</th>
        </tr>
    </thead>



    <tbody>
        <?php foreach ($teams as $team) : ?>
            <tr>
                <td><?= $team['id'] ?></td>
                <td><?= htmlspecialchars($team['nome']) ?></td>
                <td><?= htmlspecialchars($team['nome_grupo']) ?></td>
                <td><?= htmlspecialchars($team['continente']) ?></td>
                <td>
                    <a href="/FIFA-26/Sistema/View/Teams/editar.php?id=<?= $team['id'] ?>">
                        Editar
                    </a>

                    <a href="/FIFA-26/Sistema/View/Teams/deletar.php?id=<?= $team['id'] ?>"
                       onclick="return confirm('Tem certeza que deseja excluir este time?')">
                        Deletar
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php endif; ?>

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