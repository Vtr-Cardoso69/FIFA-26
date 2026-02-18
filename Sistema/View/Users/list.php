<?php
require_once __DIR__ . '/../../DB/Database.php';
require_once __DIR__ . '/../../Model/UsersM.php';

$usersModel = new UsersModel($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])) {
	$id = (int) $_POST['delete_id'];
	$usersModel->deletar($id);
	header('Location: list.php');
	exit;
}

$usuarios = $usersModel->listarUsuarios();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Usuários Cadastrados</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
	<h2>Usuários Cadastrados</h2>
	<a href="create.php" class="btn btn-primary mb-3">Novo Usuário</a>
	<table class="table table-bordered table-striped">
		<thead>
			<tr>
				<th>ID</th>
				<th>Nome</th>
				<th>Idade</th>
				<th>Cargo</th>
				<th>Seleção</th>
				<th>Ações</th>
			</tr>
		</thead>
		<tbody>
		<?php if (!empty($usuarios)): ?>
			<?php foreach ($usuarios as $usuario): ?>
				<tr>
					<td><?php echo $usuario['id']; ?></td>
					<td><?php echo htmlspecialchars($usuario['nome']); ?></td>
					<td><?php echo $usuario['idade']; ?></td>
					<td><?php echo htmlspecialchars($usuario['cargo']); ?></td>
					<td><?php echo htmlspecialchars($usuario['selecao_nome'] ?? ''); ?></td>
					<td>
						<form action="edit.php" method="POST" style="display:inline;">
							<input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">
							<button type="submit" class="btn btn-sm btn-warning">Editar</button>
						</form>
						<form action="list.php" method="POST" style="display:inline;" onsubmit="return confirm('Tem certeza que deseja excluir este usuário?');">
							<input type="hidden" name="delete_id" value="<?php echo $usuario['id']; ?>">
							<button type="submit" class="btn btn-sm btn-danger">Excluir</button>
						</form>
					</td>
				</tr>
			<?php endforeach; ?>
		<?php else: ?>
			<tr><td colspan="6">Nenhum usuário cadastrado.</td></tr>
		<?php endif; ?>
		</tbody>
	</table>
 <a href="../../../index.php" class="btn btn-secondary">Voltar
	
 </a>
</div>
</body>
</html>
