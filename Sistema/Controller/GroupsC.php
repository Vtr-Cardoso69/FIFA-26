<?php
require_once __DIR__ . "/../Model/GroupsM.php";

class GroupController {
    private $GroupModel;
    
    public function __construct($pdo) {
        $this->GroupModel = new GroupModel($pdo);
    }

    // Cadastra um novo Group
    public function cadastrar($nome, $slot1, $slot2 ) {
        // Valida se professor existe
        return $this->GroupModel->cadastrarGrupo($nome, $slot1,$slot2 );
    }

    // Lista todos os Selecoes
    public function listar() {
        $groups = $this->GroupModel->buscarTodasSelecoes();
        include_once __DIR__ . '/../View/Groups/listar.php';
        return $groups;
    }

    // Lista Selecoes apenas do aluno informado (por nome)
    public function listarPorSelecoesNome( $nome) {
        return $this->GroupModel->buscarSelecoes($nome);
    }

    // Busca um Group por ID
    public function buscarGroup($id) {
        return $this->GroupModel->buscarSelecoes($id);
    }

    // Deleta um Group por ID
    public function deletar($id) {
        return $this->GroupModel->deletarGroup($id);
    }

    // Atualiza um Group por ID
    public function atualizar($id, $nome, $slot1, $slot2) {
        return $this->GroupModel->atualizarGroup($id, $nome, $slot1, $slot2);
    }

    public function quadro() {
    $grupos = $this->GroupModel->buscarGruposComTimes();
    require __DIR__ . '/../View/Groups/quadro.php';
}

}
?>

?>