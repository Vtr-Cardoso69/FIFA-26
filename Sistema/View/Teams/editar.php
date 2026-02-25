
<?php
require_once __DIR__ . '/../../DB/Database.php';
require_once __DIR__ . '/../../Controller/TeamsC.php';
$TeamController = new TeamController($pdo);

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$team = null;

if ($id > 0) {
    // Buscar dados atuais do time
    $team = $TeamController->buscarTeam($id);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $id > 0) {
    $nome = $_POST['nome'];
    $grupo_id = $_POST['grupo_id'];
    $continente = $_POST['continente'];
    $TeamController->editar($id, $nome, $grupo_id, $continente);
    header("Location: listar.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Seleção</title>
    <link rel="stylesheet" href="../../../cssTeam/cadastro.css">
</head>
<body>
   
    <?php if ($team): ?>
    <form method="POST">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($team['nome']); ?>" required><br><br>
        <label for="grupo_id">Grupo:</label>
        <input type="number" id="grupo_id" name="grupo_id" value="<?php echo htmlspecialchars($team['grupo_id']); ?>" required><br><br>
        <label for="continente">Continente:</label>
        <select id="continente" name="continente" required>
            <option value="">-- Selecione --</option>
            <option value="africa" <?php if($team['continente']=='africa') echo 'selected'; ?>>África</option>
            <option value="america" <?php if($team['continente']=='america') echo 'selected'; ?>>América</option>
            <option value="europa" <?php if($team['continente']=='europa') echo 'selected'; ?>>Europa</option>
            <option value="asia" <?php if($team['continente']=='asia') echo 'selected'; ?>>Ásia</option>
            <option value="oceania" <?php if($team['continente']=='oceania') echo 'selected'; ?>>Oceania</option>
        </select><br><br>
        <input type="submit" value="Salvar">
    </form>
    <?php else: ?>
        <p>Seleção não encontrada.</p>
    <?php endif; ?>

    <footer class="footer">
        <div class="container">
            <p>&copy; 2026 FIFA World Cup Project - Desenvolvido por FIFA DEVs</p>
            <div class="">
                <a href="https://github.com/WPOTC">Colaborador 1</a>
                <a href="https://github.com/PedroSENAI2008">Colaborador 2</a>
                <a href="https://github.com/Vtr-Cardoso69">Colaborador 3</a>
            </div>
        </div>
    </footer>
</body>
</html> <!-- SIXXX SEVENNNNN  -->