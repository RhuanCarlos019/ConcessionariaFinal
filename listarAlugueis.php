<?php
include 'db.php';

$sql = "SELECT alugueis.id, clientes.nome AS cliente, carros.modelo AS carro, alugueis.data_inicio, alugueis.data_fim 
        FROM alugueis 
        JOIN clientes ON alugueis.cliente_id = clientes.id 
        JOIN carros ON alugueis.carro_id = carros.id";
$stmt = $pdo->query($sql);
$alugueis = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Listar Aluguéis</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Listar Aluguéis</h1>
        <a href="registrarAluguel.php" class="btn btn-primary mb-3">Registrar Aluguel</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Cliente</th>
                    <th>Carro</th>
                    <th>Data Início</th>
                    <th>Data Fim</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($alugueis as $aluguel) { ?>
                    <tr>
                        <td><?= $aluguel['id'] ?></td>
                        <td><?= $aluguel['cliente'] ?></td>
                        <td><?= $aluguel['carro'] ?></td>
                        <td><?= $aluguel['data_inicio'] ?></td>
                        <td><?= $aluguel['data_fim'] ?></td>
                        <td>
                            <a href="editarAluguel.php?id=<?= $aluguel['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                            <a href="deletarAluguel.php?id=<?= $aluguel['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja deletar este aluguel?')">Deletar</a>
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
