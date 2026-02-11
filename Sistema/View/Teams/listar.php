<?php
require_once 'Sistema/DB/Database.php';
require_once 'Sistema/Controller/TeamsC.php';

if (empty($teams)) {
      echo "nada";
}
 foreach ($teams as $team) {
      $id = $team['id'];
      echo "<tr>";
      echo "<td>{$id}</td>";
      echo "<td>{$team['nome']}</td>";
      echo "<td>{$team['email']}</td>";
      echo "<td>
<a href='View/Usuario/editar.php?id={$id}'>Editar</a> 
<a href='View/Usuario/deletar.php?id={$id}' onclick=\"return confirm('Tem certeza que deseja excluir este usuário?')\">Deletar</a></td>";
      echo "</tr>";
    }
?>