<?php

require_once "C:/Turma2/xampp/htdocs/FIFA-26/Sistema/DB/Database.php";
require_once "C:/Turma2/xampp/htdocs/FIFA-26/Sistema/Controller/GameC.php";


$gameController = new GameController($pdo);

$jogos = $gameController->listarTodosJogos();


echo "<div class='jogo'>";
echo "<h1>Jogos</h1>";

if(empty($jogos)) {
    echo "<p>Nenhum jogo encontrado.</p>";
}
foreach ($jogos as $jogo) {
  $id = $jogo['id'];
  $selecao_mandante = $jogo['nome_mandante'];
  $selecao_visitante = $jogo['nome_visitante'];
  $grupo = $jogo['nome_grupo'];
  $data_hora = $jogo['data_hora'];
  $estadio = $jogo['estadio'];
  $fase = $jogo['fase'];
  $gols_mandante = $jogo['gols_mandante'];
  $gols_visitante = $jogo['gols_visitante'];


echo "<h2>Grupo: " . "$grupo" . "</h2> <br>";
echo "<h3> " . $selecao_mandante . "vs" . $selecao_visitante . "</h3> <br>";
echo "Estádio: " . $estadio . "<br>";
echo "Data e Hora: " . $data_hora . "<br>";
echo "Fase: " . $fase . "<br>";
echo "<button><a href='classificarJogo.php?id=$id'>Classificar Jogo</a></button><br><br>";

echo "Gols Mandante: " . $gols_mandante . "<br>";
echo "Gols Visitante: " . $gols_visitante . "<br>";

$gameController->classificacao($id, $gols_mandante, $gols_visitante, $selecao_mandante, $selecao_visitante);

echo "</div>";




} 

?>
