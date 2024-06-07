<?php
include 'db.php';

$sql = "SELECT * FROM funcionarios";
$stmt = $pdo->query($sql);
$funcionarios = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Listar Funcionários</title>
</head>
<body>
    <h1>Listar Funcionários</h1>
    <a href="adicionarFuncionario.php">Adicionar Funcionário</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Cargo</th>
            <th>Ações</th>
        </tr>
        <?php foreach ($funcionarios as $funcionario) { ?>
            <tr>
                <td><?= $funcionario['id'] ?></td>
                <td><?= $funcionario['nome'] ?></td>
                <td><?= $funcionario['email'] ?></td>
                <td><?= $funcionario['cargo'] ?></td>
                <td>
                    <a href="editarFuncionario.php?id=<?= $funcionario['id'] ?>">Editar</a>
                    <a href="deletarFuncionario.php?id=<?= $funcionario['id'] ?>" onclick="return confirm('Tem certeza que deseja deletar?')">Deletar</a>
                </td>
            </tr>
        <?php } ?>
    </table>
    <a href="index.php">Voltar ao Início</a>
</body>
</html>
