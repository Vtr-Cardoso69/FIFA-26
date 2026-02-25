<?php
require_once __DIR__ . '/../../DB/Database.php';
require_once __DIR__ . '/../../Controller/GroupsC.php';


   echo "<a href='View/Groups/cadastrar.php'>Cadastrar</a>";

if (empty($groups)) {
      echo "nada<br>  ";
   
     
}
 foreach ($groups as $group) {
      $id = $group['id'];
      echo "<tr>";
      echo "<td>{$id}</td>";
      echo "<td>{$group['nome']}</td>";
      echo "<td>
<a href='View/Usuario/editar.php?id={$id}'>Editar</a> 

 
<a href='View/Usuario/deletar.php?id={$id}' onclick=\"return confirm('Tem certeza que deseja excluir este usuário?')\">Deletar</a></td>";
      echo "</tr>";
      
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Grupos</title>
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
        <li><a href="classificacaoGeral.php">Classificação Geral</a></li>
    </ul>
</header>
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
