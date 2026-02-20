<?php

require_once __DIR__ . '/../DB/Database.php';
require_once __DIR__ . '/../Model/GameM.php';

class GameController{

    private $gameModel;

    public function __construct($pdo){
        $this->gameModel = new GameModel($pdo);
    }

    public function listarTodosJogos(){
        return $this->gameModel->listarJogos();
    }

    public function criarJogo($selecao_mandante_id, $selecao_visitante_id, $data_hora, $estadio, $fase, $grupo_id){
        return $this->gameModel->criarJogo($selecao_mandante_id, $selecao_visitante_id, $data_hora, $estadio, $fase, $grupo_id);
    }

    public function atualizarGols($gols_mandante, $gols_visitante, $id){
        return $this->gameModel->atualizarGols($gols_mandante, $gols_visitante, $id);
    }

    public function classificacao($id, $gols_mandante, $gols_visitante, $selecao_mandante_id, $selecao_visitante_id){
        return $this->gameModel->classificacao($id, $gols_mandante, $gols_visitante, $selecao_mandante_id, $selecao_visitante_id);
    }
}

?>
