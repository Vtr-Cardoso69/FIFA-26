<?php
class GroupsModel{
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    
    public function buscarTodasSelecoes() {
        $stmt = $this->pdo->query("SELECT * FROM selecoes");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
}
?>