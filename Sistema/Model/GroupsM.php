<?php
require_once __DIR__ . '/../DB/Database.php';
class GroupModel{
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    
    public function buscarTodos() {
        $stmt = $this->pdo->query("SELECT * FROM grupos");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
        public function buscarGrupo($id) {
        $stmt = $this->pdo->prepare('SELECT * FROM grupos WHERE id = :id');
        $stmt->execute(['id' => $id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result !== false ? $result : null;
    }

    public function cadastrarGrupo($nome,){
        $sql = 'INSERT INTO grupos (nome) VALUES (:nome)';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'nome' => $nome,
            
        ]);
    }

    public function buscarGruposComTimes() {
    $sql = "
        SELECT 
            grupos.id AS grupo_id,
            grupos.nome AS nome_grupo,
            selecoes.id AS time_id,
            selecoes.nome AS nome_time
        FROM grupos
        LEFT JOIN selecoes
            ON selecoes.grupo_id = grupos.id
        ORDER BY grupos.id
    ";

    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

}
?>