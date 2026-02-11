<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Usuários</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Usuários</h2>
    <a href="index.php?controller=user&action=create" class="btn btn-primary mb-3">Novo Usuário</a>
    <table class="table table-bordered">
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
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo $user['id']; ?></td>
                <td><?php echo $user['nome']; ?></td>
                <td><?php echo $user['idade']; ?></td>
                <td><?php echo $user['cargo']; ?></td>
                <td><?php echo $user['selecao_nome'] ?? 'Nenhuma'; ?></td>
                <td>
                    <a href="index.php?controller=user&action=edit&id=<?php echo $user['id']; ?>" class="btn btn-warning btn-sm">Editar</a>
                    <a href="index.php?controller=user&action=delete&id=<?php echo $user['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza?')">Excluir</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="index.php" class="btn btn-secondary">Voltar</a>
</div>
</body>
</html>
