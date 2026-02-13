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
        echo "<h3>{$grupoAtual} <a href='View/Groups/cadastro.php'>Cadastrar</a></h3><ul>";
    }

    if ($linha['nome_time']) {
        $cont = !empty($linha['continente_time']) ? ' (' . htmlspecialchars($linha['continente_time']) . ')' : '';
        echo "<li>" . htmlspecialchars($linha['nome_time']) . $cont . "</li>";
    }
endforeach;

if ($grupoAtual !== null) {
    echo "</ul>";
}

// link to cadastrar seleção (teams)
echo "<p><a href='View/Teams/cadastro.php'>Cadastrar Seleção</a></p>";
?>
