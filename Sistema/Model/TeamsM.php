<?php   

class TeamModel{
    
    private $pdo;

    public function __construct(PDO $pdo){
        $this->pdo = $pdo;
    }

    public function buscarTodasSelecoes(){
        $stmt = $this->pdo->query('SELECT * FROM selecoes');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    
    public function buscarSelecao($id) {
        $stmt = $this->pdo->prepare('SELECT * FROM selecoes WHERE id = :id');
        $stmt->execute(['id' => $id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result !== false ? $result : null;
    }

    public function cadastrarSelecao($nome, $continente, $grupo_id, $jogos){
        $sql = ('INSERT INTO selecoes (nome, continente, grupo_id, jogos) VALUES (:nome, :continente, :grupo_id, :jogos) ');
        $stmt=$this->pdo->prepare($sql);
        $stmt->execute([
            'nome'=>$nome,
            'continente'=>$continente,
            'grupo_id'=>$grupo_id,
            'jogos'=> $jogos,
        ]);
    }

    // Busca Selecao pelo continente (útil para validações)
    public function buscarPorcontinente($continente) {
        $stmt = $this->pdo->prepare('SELECT * FROM selecoes WHERE continente = :continente');
        $stmt->execute(['continente' => $continente]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result !== false ? $result : null;
    }

    // Busca Selecao pelo nome (útil se armazenamos o nome no registro de treinos)
    public function buscarPorNome($nome) {
        $stmt = $this->pdo->prepare('SELECT * FROM selecoes WHERE nome = :nome');
        $stmt->execute(['nome' => $nome]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result !== false ? $result : null;
    }

    public function editarSelecao($id, $nome, $continente, $grupo_id){
        $sql= "UPDATE selecoes SET nome=?, continente=?, grupo_id=?, WHERE id=?";
        $stmt=$this->pdo->prepare($sql);
      
    }
    
    public function deletarSelecao($id){
        $sql = "DELETE FROM selecoes WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$id]);
    }

    
}