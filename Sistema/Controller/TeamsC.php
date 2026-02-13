<?php
require_once __DIR__ . "/../Model/TeamsM.php";


class TeamController {
    private $TeamModel;
    
    public function __construct($pdo) {
        $this->TeamModel = new TeamModel($pdo);
    }

    // Cadastra um novo Team
    public function cadastrar($nome, $grupo_id, $continente, $jogos ) {
        // Valida se professor existe
        return $this->TeamModel->cadastrarSelecao($nome, $continente, $grupo_id, $jogos);
    }

    
    public function listar() {
        $teams = $this->TeamModel->buscarTodasComGrupo();
        include __DIR__ . '/../View/Teams/listar.php';
    }


    // Busca um Team por ID
    public function buscarTeam($id) {
        return $this->TeamModel->buscarSelecoes($id);
    }

    // Deleta um Team por ID
    public function deletar($id) {
        return $this->TeamModel->deletarTeam($id);
    }

    // Atualiza um Team por ID
    public function editar($id, $nome, $grupo_id, $continente, $jogos) {
    return $this->TeamModel->editar($id, $nome, $grupo_id, $continente, $jogos);
}

    
    


}
?>
