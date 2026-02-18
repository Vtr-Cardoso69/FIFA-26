<?php
require_once __DIR__ . '/../../DB/Database.php';
require_once __DIR__ . '/../../Controller/TeamsC.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FIFA-26</title>
</head>
<link rel="stylesheet" href="../../../cssTeam/listar.css">
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
  <nav class="nav">
    <ul>
      <li><a href="../../../index.php">Início</a></li>
      <li><a href="../Teams/listarSelecoes.php">Seleções</a></li>
      <li><a href="../Groups/listarGrupos.php">Grupos</a></li>
      <li><a href="listarJogos.php">Jogos</a></li>
    </ul>
</header>
<button><a href='/FIFA-26/Sistema/View/Teams/cadastro.php'>Cadastrar</a></button>

<?php
if (empty($teams)) {
    echo "nada";

} else {
    echo '<table border="1" cellpadding="5" cellspacing="0">';
    echo '<thead><tr>';
    echo '<th>ID</th>';
    echo '<th>Nome do Time</th>';
    echo '<th>Grupo</th>';
    echo '<th>Continente</th>';
    echo '<th>Ações</th>';
    echo '</tr></thead><tbody>';
    foreach ($teams as $team) {
        $id = $team['id'];
        $nome = isset($team['nome']) ? htmlspecialchars($team['nome']) : '';
        $grupo = isset($team['nome_grupo']) ? htmlspecialchars($team['nome_grupo']) : '';
        $continente = isset($team['continente']) ? htmlspecialchars($team['continente']) : '';
        echo "<tr>";
        echo "<td>{$id}</td>";
        echo "<td>{$nome}</td>";
        echo "<td>{$grupo}</td>";
        echo "<td>{$continente}</td>";
        echo "<td>
           
            <a href='/FIFA-26/Sistema/View/Teams/editar.php?id={$id}'>Editar</a> 
            <a href='/FIFA-26/Sistema/View/Teams/deletar.php?id={$id}' 
               onclick=\"return confirm('Tem certeza que deseja excluir este usuário?')\">
               Deletar
            </a>
        </td>";
        echo "</tr>";
    }
    echo '</tbody></table>';
}
?>
</body>
</html>