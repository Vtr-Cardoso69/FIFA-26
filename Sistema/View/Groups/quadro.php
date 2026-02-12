<?php
require_once __DIR__ . '/../../DB/Database.php';
require_once __DIR__ . '/../../Controller/GroupsC.php';

$grupoAtual = null;

foreach ($grupos as $linha):

    if ($grupoAtual !== $linha['nome_grupo']) {

        if ($grupoAtual !== null) {
            echo "</ul>";
        }

        $grupoAtual = $linha['nome_grupo'];
        echo "<h3>{$grupoAtual}</h3><ul>";
    }

    if ($linha['nome_time']) {
        echo "<li>{$linha['nome_time']}</li>";
    }

endforeach;

if ($grupoAtual !== null) {
    echo "</ul>";
}
?>
