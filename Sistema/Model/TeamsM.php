<?php
require_once __DIR__ . '/../DB/Database.php';

class TeamModel {
    
    private $pdo;

    public function __construct(PDO $pdo){
        $this->pdo = $pdo;
    }

    public function buscarTodasComGrupo() {
        $sql = "
            SELECT 
                selecoes.id,
                selecoes.nome,
                selecoes.continente,
                grupos.nome AS nome_grupo
            FROM selecoes
            LEFT JOIN grupos ON selecoes.grupo_id = grupos.id
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarSelecao($id) {
        $stmt = $this->pdo->prepare(
            'SELECT * FROM selecoes WHERE id = :id'
        );
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    public function cadastrarSelecao($nome, $continente, $grupo_id){
        $sql = "
            INSERT INTO selecoes (nome, continente, grupo_id)
            VALUES (:nome, :continente, :grupo_id)
        ";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            'nome' => $nome,
            'continente' => $continente,
            'grupo_id' => $grupo_id
        ]);
    }

    public function editar($id, $nome, $continente, $grupo_id){
        $sql = "
            UPDATE selecoes 
            SET nome = ?, continente = ?, grupo_id = ?
            WHERE id = ?
        ";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$nome, $continente, $grupo_id, $id]);
    }

    public function deletarSelecao($id){
        $sql = "DELETE FROM selecoes WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$id]);
    }
}