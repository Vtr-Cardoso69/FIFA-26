<?php

require_once __DIR__ . '/../Model/UsersM.php';
require_once __DIR__ . '/../Model/TeamsM.php';
require_once __DIR__ . '/../DB/Database.php';

class UserController {
    private UsersModel $usersModel;
    private TeamModel $teamsModel;
    private array $cargos = ['Jogador', 'Técnico', 'Árbitro', 'Preparador Físico', 'Médico'];

    public function __construct(PDO $pdo) {
        $this->usersModel = new UsersModel($pdo);
        $this->teamsModel = new TeamModel($pdo);
    }

    public function listar(): array {
        return $this->usersModel->listarUsuarios();
    }

    public function buscarUsuario(int $id): ?array {
        return $this->usersModel->buscarUsuario($id);
    }

    public function salvar(array $dados): void {
        $this->usersModel->salvar($dados);
    }

    public function deletar(int $id): void {
        $this->usersModel->deletar($id);
    }

    public function obterCargos(): array {
        return $this->cargos;
    }

    public function obterSelecoes(): array {
        return $this->teamsModel->buscarTodasSelecoes();
    }
}
