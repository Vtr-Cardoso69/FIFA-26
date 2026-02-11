<?
require_once 'Sistema/DB/Database.php';
require_once 'Sistema/Controller/GroupsC.php';

if (empty($groups)) {
      echo "nada";
}
 foreach ($groups as $group) {
      $id = $group['id'];
      echo "<tr>";
      echo "<td>{$id}</td>";
      echo "<td>{$group['nome']}</td>";
      echo "<td>{$group['email']}</td>";
      echo "<td>
<a href='View/Usuario/editar.php?id={$id}'>Editar</a> 
<a href='View/Usuario/deletar.php?id={$id}' onclick=\"return confirm('Tem certeza que deseja excluir este usuário?')\">Deletar</a></td>";
      echo "</tr>";
    }
?>
