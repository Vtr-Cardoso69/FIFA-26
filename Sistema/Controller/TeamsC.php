<?php
require_once "C:/Turma2/xampp/htdocs/FIFA-26/Sistema/Model/TeamsM.php";


class TeamController {
    private $TeamModel;
    
    public function __construct($pdo) {
        $this->TeamModel = new TeamModel($pdo);
    }

    // Cadastra um novo Team
    public function cadastrar($nome, $grupo_id, $continente, $jogos ) {
        // Valida se professor existe
        
         return $this->AlunoModel->cadastrarTeam($nome, $grupo_id, $continentes, $jogos);
    }

    // Lista todos os Selecoes
    public function listar() {
        $teams = $this->TeamModel->buscarTodasSelecoes();
        include_once "Sistema/View/Teams/listar.php";
        return $teams;
    }

    // Lista Selecoes apenas do aluno informado (por nome)
    public function listarPorSelecoesNome( $nome) {
        return $this->TeamModel->buscarSelecoes($nome);
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
    public function atualizar($id, $nome, $grupo_id, $continente, $jogos) {
        return $this->TeamModel->atualizarTeam($id, $nome, $grupo_id, $continente, $jogos);
    }

}
?>
