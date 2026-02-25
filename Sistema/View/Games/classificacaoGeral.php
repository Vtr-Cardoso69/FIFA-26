<?php
require_once __DIR__ . '/../../DB/Database.php';
require_once __DIR__ . '/../../Controller/GameC.php';

$gameController = new GameController($pdo);
$ranking = $gameController->obterClassificacaoGols();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classificação Geral - FIFA-26</title>
    <link rel="stylesheet" href="../../../cssGame/classificar.css">
    <link rel="stylesheet" href="../../../cssTeam/listar.css">


</head>
<body>
 
<header>
  <h2>FIFA-<span style="color: #004d98;">26</span></h2>
 <nav class="nav">
    <ul>
      <li><a href="../../../index.php">Início</a></li>
      <li><a href="../Teams/listar.php">Seleções</a></li>
      <li><a href="listarJogos.php">Jogos</a></li>
        <li><a href="classificacaoGeral.php">Classificação Geral</a></li>
    </ul>


</header>
<section class="ranking">
    <table border="1" cellpadding="6" cellspacing="0">
        <thead>
            <tr>
                <th>Posição</th>
                <th>Seleção</th>
                <th>Gols Pró</th>
                <th>Gols Contra</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $pos = 1;
        foreach ($ranking as $row) {
            echo '<tr>';
            echo '<td>' . $pos++ . '</td>';
            echo '<td>' . htmlspecialchars($row['nome']) . '</td>';
            echo '<td>' . ($row['gols_pro'] ?? 0) . '</td>';
            echo '<td>' . ($row['gols_con'] ?? 0) . '</td>';
            echo '</tr>';
        }
        ?>
        </tbody>
    </table>
</section>

    <footer class="footer">
        <div class="container">
            <p>&copy; 2026 FIFA World Cup Project - Desenvolvido por FIFA DEVs</p>
        </div>
    </footer>
</body>
</html>

