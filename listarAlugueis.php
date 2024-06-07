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
    <link rel="stylesheet" href="style.css">
    <title>Listar Aluguéis</title>
</head>
<body>
    <h1>Listar Aluguéis</h1>
    <a href="registrarAluguel.php">Registrar Aluguel</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Cliente</th>
            <th>Carro</th>
            <th>Data Início</th>
            <th>Data Fim</th>
        </tr>
        <?php foreach ($alugueis as $aluguel) { ?>
            <tr>
                <td><?= $aluguel['id'] ?></td>
                <td><?= $aluguel['cliente'] ?></td>
                <td><?= $aluguel['carro'] ?></td>
                <td><?= $aluguel['data_inicio'] ?></td>
                <td><?= $aluguel['data_fim'] ?></td>
            </tr>
        <?php } ?>
    </table>
    <a href="index.php">Voltar ao Início</a>
</body>
</html>
