<?php
require_once __DIR__ . '/../DB/Database.php';

class UsersModel {
    private PDO $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function listarUsuarios(): array {
        $sql = 'SELECT u.*, s.nome AS selecao_nome
                FROM usuarios u
                LEFT JOIN selecoes s ON u.selecao_id = s.id';
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarUsuario(int $id): ?array {
        $stmt = $this->pdo->prepare(
            'SELECT * FROM usuarios WHERE id = :id'
        );
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

   public function salvar(array $dados): void {

    if (!empty($dados['id'])) {

        $sql = 'UPDATE usuarios
                SET nome = :nome,
                    idade = :idade,
                    cargo = :cargo,
                    selecao_id = :selecao_id
                WHERE id = :id';

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([
            'id' => $dados['id'],
            'nome' => $dados['nome'],
            'idade' => $dados['idade'],
            'cargo' => $dados['cargo'],
            'selecao_id' => $dados['selecao_id'] ?: null
        ]);

    } else {

        $sql = 'INSERT INTO usuarios
                (nome, idade, cargo, selecao_id)
                VALUES (:nome, :idade, :cargo, :selecao_id)';

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([
            'nome' => $dados['nome'],
            'idade' => $dados['idade'],
            'cargo' => $dados['cargo'],
            'selecao_id' => $dados['selecao_id'] ?: null
        ]);
    }
}


    public function deletar(int $id): void {
        $stmt = $this->pdo->prepare(
            'DELETE FROM usuarios WHERE id = :id'
        );
        $stmt->execute(['id' => $id]);
    }
}


