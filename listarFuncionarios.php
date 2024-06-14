<?php
include 'db.php';

$sql = "SELECT * FROM funcionarios";
$stmt = $pdo->query($sql);
$funcionarios = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Listar Funcionários</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Listar Funcionários</h1>
        <a href="adicionarFuncionario.php" class="btn btn-success mb-3">Adicionar Funcionário</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Cargo</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($funcionarios as $funcionario) { ?>
                    <tr>
                        <td><?= $funcionario['id'] ?></td>
                        <td><?= $funcionario['nome'] ?></td>
                        <td><?= $funcionario['email'] ?></td>
                        <td><?= $funcionario['cargo'] ?></td>
                        <td>
                            <a href="editarFuncionario.php?id=<?= $funcionario['id'] ?>" class="btn btn-primary btn-sm">Editar</a>
                            <a href="deletarFuncionario.php?id=<?= $funcionario['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja deletar?')">Deletar</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <a href="index.php" class="btn btn-secondary">Voltar ao Início</a>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
