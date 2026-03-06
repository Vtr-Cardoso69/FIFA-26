<?php
require_once __DIR__ . '/../../DB/Database.php';
require_once __DIR__ . '/../../Controller/GroupsC.php';

/* ===== CONTROLLER ===== */
$GroupController = new GroupController($pdo);

/* ===== BUSCA OS DADOS ANTES DE USAR ===== */
$groups = $GroupController->listar();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grupos - FIFA 26</title>
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

<h1>Lista de Grupos</h1>
<a href='cadastro.php'>Cadastrar Grupo</a>
    <?php if (empty($groups)): ?>
        <p>Nada cadastrado.</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($groups as $group): ?>
                    <tr>
                        <td><?php echo $group['id']; ?></td>
                        <td><?php echo $group['nome']; ?></td>
                        <td>
                            <a href='editar.php?id=<?php echo $group['id']; ?>'>Editar</a> |
                            <a href='deletar.php?id=<?php echo $group['id']; ?>' onclick="return confirm('Tem certeza que deseja excluir este grupo?')">Deletar</a>
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

 

