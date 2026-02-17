<?php
require_once __DIR__ . '/../../DB/Database.php';
require_once __DIR__ . '/../../Model/UsersM.php';
require_once __DIR__ . '/../../Model/TeamsM.php';

$usersModel = new UsersModel($pdo);
$teamsModel = new TeamModel($pdo);

$cargos = ['Jogador', 'Técnico', 'Árbitro', 'Preparador Físico', 'Médico'];
$selecoes = $teamsModel->buscarTodasSelecoes();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id']) && isset($_POST['nome'])) {
	$dados = [
		'id' => (int) $_POST['id'],
		'nome' => $_POST['nome'],
		'idade' => $_POST['idade'],
		'cargo' => $_POST['cargo'],
		'selecao_id' => $_POST['selecao_id'] ?: null
	];

	$usersModel->salvar($dados);

	header('Location: list.php');
	exit;
}

$id = isset($_POST['id']) ? (int) $_POST['id'] : (int) ($_GET['id'] ?? 0);
$user = $usersModel->buscarUsuario($id);

if (!$user) {
	header('Location: list.php');
	exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Editar Usuário</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
	<h2>Editar Usuário</h2>
	<form action="edit.php" method="POST">
		<input type="hidden" name="id" value="<?php echo $user['id']; ?>">
		<div class="form-group">
			<label>Nome</label>
			<input type="text" name="nome" class="form-control" value="<?php echo htmlspecialchars($user['nome']); ?>" required>
		</div>
		<div class="form-group">
			<label>Idade</label>
			<input type="number" name="idade" class="form-control" value="<?php echo $user['idade']; ?>" required>
		</div>
		<div class="form-group">
			<label>Cargo</label>
			<select name="cargo" class="form-control" required>
				<option value="">Selecione um cargo</option>
				<?php foreach ($cargos as $cargo_op): ?>
					<option value="<?php echo htmlspecialchars($cargo_op); ?>" <?php echo ($cargo_op == $user['cargo']) ? 'selected' : ''; ?>>
						<?php echo htmlspecialchars($cargo_op); ?>
					</option>
				<?php endforeach; ?>
			</select>
		</div>
		<div class="form-group">
			<label>Seleção</label>
			<select name="selecao_id" class="form-control">
				<option value="">Nenhuma</option>
				<?php foreach ($selecoes as $selecao): ?>
					<option value="<?php echo $selecao['id']; ?>" <?php echo ($selecao['id'] == $user['selecao_id']) ? 'selected' : ''; ?>>
						<?php echo htmlspecialchars($selecao['nome']); ?>
					</option>
				<?php endforeach; ?>
			</select>
		</div>
		<button type="submit" class="btn btn-success">Salvar Alterações</button>
		<a href="list.php" class="btn btn-secondary">Cancelar</a>
	</form>
</div>
</body>
</html>
