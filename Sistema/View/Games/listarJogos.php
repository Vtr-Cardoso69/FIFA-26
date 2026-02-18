<?php

require_once "C:/Turma2/xampp/htdocs/FIFA-26/Sistema/DB/Database.php";
require_once "C:/Turma2/xampp/htdocs/FIFA-26/Sistema/Controller/GameC.php";


$gameController = new GameController($pdo);

$jogos = $gameController->listarTodosJogos();
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../../../cssGame/listarJogos.css">
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
  <nav class="nav">
    <ul>
      <li><a href="../../../index.php">Início</a></li>
      <li><a href="../Teams/listar.php">Seleções</a></li>
      <li><a href="listarJogos.php">Jogos</a></li>
    </ul>
</header>


<h2><button><a href="criarJogos.php">Criar Jogo</a></button></h2>

<?php
echo "<h1>Jogos</h1>";

if(empty($jogos)) {
    echo "<p>Nenhum jogo encontrado.</p>";
}
foreach ($jogos as $jogo) {
  $id = $jogo['id'];
  $selecao_mandante = $jogo['nome_mandante'];
  $selecao_visitante = $jogo['nome_visitante'];
  $grupo = $jogo['nome_grupo'];
  $estadio = $jogo['estadio'];
  $fase = $jogo['fase'];
  $gols_mandante = $jogo['gols_mandante'];
  $gols_visitante = $jogo['gols_visitante'];

echo "<div class='jogo'>";
echo "<h2>Grupo: " . "$grupo" . "</h2> <br>";
echo "<h3> " . $selecao_mandante . " vs " . $selecao_visitante . "</h3> <br>";
echo "Estádio: " . $estadio . "<br>";

echo "Fase: " . $fase . "<br>";
echo "<button><a href='classificarJogo.php?id=$id'>Classificar Jogo</a></button><br><br>";

echo "Gols Mandante: " . $gols_mandante . "<br>";
echo "Gols Visitante: " . $gols_visitante . "<br>";

$gameController->classificacao($id, $gols_mandante, $gols_visitante, $selecao_mandante, $selecao_visitante);
echo "</div>";
echo "<br><br>";
}

?>

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



