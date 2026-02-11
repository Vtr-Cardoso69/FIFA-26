<?php
require_once __DIR__ . '/../DB/Database.php';

class UsersM {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAll() {
        $stmt = $this->pdo->prepare("SELECT u.*, s.nome as selecao_nome FROM usuarios u LEFT JOIN selecoes s ON u.selecao_id = s.id");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM usuarios WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($nome, $idade, $cargo, $selecao_id) {
        $selecao_id = !empty($selecao_id) ? $selecao_id : null;
        $stmt = $this->pdo->prepare("INSERT INTO usuarios (nome, idade, cargo, selecao_id) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$nome, $idade, $cargo, $selecao_id]);
    }

    public function update($id, $nome, $idade, $cargo, $selecao_id) {
        $selecao_id = !empty($selecao_id) ? $selecao_id : null;
        $stmt = $this->pdo->prepare("UPDATE usuarios SET nome = ?, idade = ?, cargo = ?, selecao_id = ? WHERE id = ?");
        return $stmt->execute([$nome, $idade, $cargo, $selecao_id, $id]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM usuarios WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function getSelecoes() {
        $stmt = $this->pdo->prepare("SELECT id, nome FROM selecoes");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
