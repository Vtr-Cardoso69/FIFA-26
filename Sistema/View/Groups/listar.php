<?php
require_once __DIR__ . '/../../DB/Database.php';
require_once __DIR__ . '/../../Controller/GroupsC.php';



if (empty($groups)) {
      echo "nada<br>  <a href='View/Groups/cadastrar.php'>Cadastrar</a>";
     
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
      
 echo  "<a href='View/Groups/cadastrar.php'>Cadastrar</a>;""
    }
?>
