<?php
require_once __DIR__ . '/../Model/UsersM.php';
require_once __DIR__ . '/../DB/Database.php';

class UserC {
    private $model;
    private $cargos = ['Técnico', 'Árbitro', 'Jogador', 'Auxiliar Técnico', 'Médico',];

    public function __construct($pdo) {
        $this->model = new UsersM($pdo);
    }

    public function processRequest() {
        $action = isset($_GET['action']) ? $_GET['action'] : 'list';

        switch ($action) {
            case 'list':
                $this->listUsers();
                break;
            case 'create':
                $this->createUser();
                break;
            case 'store':
                $this->storeUser();
                break;
            case 'edit':
                $this->editUser();
                break;
            case 'update':
                $this->updateUser();
                break;
            case 'delete':
                $this->deleteUser();
                break;
            default:
                $this->listUsers();
                break;
        }
    }

    private function listUsers() {
        $users = $this->model->getAll();
        include __DIR__ . '/../View/Users/list.php';
    }

    private function createUser() {
        $selecoes = $this->model->getSelecoes();
        $cargos = $this->cargos;
        include __DIR__ . '/../View/Users/create.php';
    }

    private function storeUser() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = $_POST['nome'];
            $idade = $_POST['idade'];
            $cargo = $_POST['cargo'];
            $selecao_id = isset($_POST['selecao_id']) && $_POST['selecao_id'] !== "" ? $_POST['selecao_id'] : null;
            $this->model->create($nome, $idade, $cargo, $selecao_id);
            header('Location: index.php?controller=user&action=list');
        }
    }

    private function editUser() {
        $id = $_GET['id'];
        $user = $this->model->getById($id);
        $selecoes = $this->model->getSelecoes();
        $cargos = $this->cargos;
        include __DIR__ . '/../View/Users/edit.php';
    }

    private function updateUser() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $nome = $_POST['nome'];
            $idade = $_POST['idade'];
            $cargo = $_POST['cargo'];
            $selecao_id = isset($_POST['selecao_id']) && $_POST['selecao_id'] !== "" ? $_POST['selecao_id'] : null;
            $this->model->update($id, $nome, $idade, $cargo, $selecao_id);
            header('Location: index.php?controller=user&action=list');
        }
    }

    private function deleteUser() {
        $id = $_GET['id'];
        $this->model->delete($id);
        header('Location: index.php?controller=user&action=list');
    }
}

// Instantiate and process
$controller = new UserC($pdo);
$controller->processRequest();
?>
