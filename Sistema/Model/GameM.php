<?php

require_once "C:/Turma2/xampp/htdocs/FIFA-26/Sistema/DB/Database.php";

//`selecao_mandante_id` int(11) NOT NULL,
//`selecao_visitante_id` int(11) NOT NULL,
//`data_hora` datetime NOT NULL,
// `estadio` varchar(100) NOT NULL,
// `fase` varchar(50) NOT NULL,
// `grupo_id` int(11) DEFAULT NULL,
// `gols_mandante` int(11) DEFAULT NULL,
// `gols_visitante` int(11) DEFAULT NULL
  

class GameModel{
    private $pdo;

    public function __construct($db) {
        $this->pdo = $db;
    }

    public function listarJogos()
    {
    $sql = "SELECT 
                jogos.id, 
                jogos.data_hora, 
                jogos.estadio, 
                jogos.fase,
                jogos.gols_mandante,
                jogos.gols_visitante,
                sel_mandante.nome AS nome_mandante, 
                sel_visitante.nome AS nome_visitante,
                grupos.nome AS nome_grupo
            FROM jogos
            INNER JOIN selecoes AS sel_mandante ON jogos.selecao_mandante_id = sel_mandante.id
            INNER JOIN selecoes AS sel_visitante ON jogos.selecao_visitante_id = sel_visitante.id
            LEFT JOIN grupos ON jogos.grupo_id = grupos.id
            ORDER BY jogos.data_hora ASC"; // Organiza por data e hora

    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function criarJogo($selecao_mandante_id, $selecao_visitante_id, $data_hora, $estadio, $fase, $grupo_id)
    {
        $sql = "INSERT INTO jogos (selecao_mandante_id, selecao_visitante_id, data_hora, estadio, fase, grupo_id) 
                VALUES (:selecao_mandante_id, :selecao_visitante_id, :data_hora, :estadio, :fase, :grupo_id)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':selecao_mandante_id' => $selecao_mandante_id,
            ':selecao_visitante_id' => $selecao_visitante_id,
            ':data_hora' => $data_hora,
            ':estadio' => $estadio,
            ':fase' => $fase,
            ':grupo_id' => $grupo_id
        ]);
    }

    public function atualizarGols($gols_mandante, $gols_visitante, $id)
    {
        $sql = "UPDATE jogos SET gols_mandante = :gols_mandante, gols_visitante = :gols_visitante WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':gols_mandante' => $gols_mandante,
            ':gols_visitante' => $gols_visitante,
            ':id' => $id
        ]);
    }


    public function classificacao($id, $gols_mandante, $gols_visitante, $selecao_mandante_id, $selecao_visitante_id){

        // Buscar os nomes das seleções
        $sql = "SELECT nome FROM selecoes WHERE nome = :nome";
        $stmt = $this->pdo->prepare($sql);
        
        $stmt->execute([':nome' => $selecao_mandante_id]);
        $sel_mandante = $stmt->fetch(PDO::FETCH_ASSOC);
        
        $stmt->execute([':nome' => $selecao_visitante_id]);
        $sel_visitante = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if($gols_mandante > $gols_visitante){
            //mandante ganha
            echo 'Vitória ' . $sel_mandante['nome'] . "!";
        } elseif($gols_mandante < $gols_visitante){
            //visitante ganha
            echo 'Vitória ' . $sel_visitante['nome'] . "!";
            } elseif($gols_mandante == $gols_visitante){
                //empate
            echo 'Empate entre ' . $sel_mandante['nome'] . " e " . $sel_visitante['nome'] . "!";
        }
    }

}
?>