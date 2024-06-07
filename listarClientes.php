<?php
include 'db.php';

$sql = "SELECT * FROM clientes";
$stmt = $pdo->query($sql);
$clientes = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Listar Clientes</title>
</head>
<body>
    <h1>Listar Clientes</h1>
    <a href="adicionarCliente.php">Adicionar Cliente</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Ações</th>
        </tr>
        <?php foreach ($clientes as $cliente) { ?>
            <tr>
                <td><?= $cliente['id'] ?></td>
                <td><?= $cliente['nome'] ?></td>
                <td><?= $cliente['email'] ?></td>
                <td><?= $cliente['telefone'] ?></td>
                <td>
                    <a href="editarCliente.php?id=<?= $cliente['id'] ?>">Editar</a>
                    <a href="deletarCliente.php?id=<?= $cliente['id'] ?>" onclick="return confirm('Tem certeza que deseja deletar?')">Deletar</a>
                </td>
            </tr>
        <?php } ?>
    </table>
    <a href="index.php">Voltar ao Início</a>
</body>
</html>
