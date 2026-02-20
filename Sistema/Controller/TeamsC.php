<?php
require_once __DIR__ . "/../Model/TeamsM.php";

class TeamController {

    private $TeamModel;
    
    public function __construct($pdo) {
        $this->TeamModel = new TeamModel($pdo);
    }

    // Cadastrar seleção
    public function cadastrar($nome, $grupo_id, $continente) {
        return $this->TeamModel->cadastrarSelecao($nome, $continente, $grupo_id);
    }

    // LISTAR (CORRETO)
    public function listar() {
        return $this->TeamModel->buscarTodasComGrupo();
    }

    // Buscar por ID
    public function buscarTeam($id) {
        return $this->TeamModel->buscarSelecao($id);
    }

    // Deletar
    public function deletar($id) {
        return $this->TeamModel->deletarSelecao($id);
    }

    // Editar
    public function editar($id, $nome, $grupo_id, $continente) {
        return $this->TeamModel->editar($id, $nome, $continente, $grupo_id);
    }
}