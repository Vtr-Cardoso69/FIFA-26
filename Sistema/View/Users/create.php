<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Usuário</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Novo Usuário</h2>
    <form action="index.php?controller=user&action=store" method="POST">
        <div class="form-group">
            <label>Nome</label>
            <input type="text" name="nome" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Idade</label>
            <input type="number" name="idade" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Cargo</label>
            <select name="cargo" class="form-control" required>
                <option value="">Selecione um cargo</option>
                <?php foreach ($cargos as $cargo_op): ?>
                    <option value="<?php echo $cargo_op; ?>"><?php echo $cargo_op; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label>Seleção</label>
            <select name="selecao_id" class="form-control">
                <option value="">Nenhuma</option>
                <?php if (!empty($selecoes)): ?>
                    <?php foreach ($selecoes as $selecao): ?>
                        <option value="<?php echo $selecao['id']; ?>"><?php echo $selecao['nome']; ?></option>
                    <?php endforeach; ?>
                <?php endif; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="index.php?controller=user&action=list" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</body>
</html>
