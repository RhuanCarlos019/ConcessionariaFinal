<?php
// Inclui o arquivo de conexão com o banco de dados
include_once 'db.php';

// Consulta para encontrar o cliente que mais alugou veículos
$sql = "SELECT c.nome AS nome_cliente, COUNT(*) AS total_alugueis
        FROM clientes c
        JOIN alugueis a ON c.id = a.cliente_id
        GROUP BY c.nome
        ORDER BY total_alugueis DESC
        LIMIT 1";

$result = $pdo->query($sql);
$row = $result->fetch(PDO::FETCH_ASSOC);
$nome_cliente = $row['nome_cliente'];
$total_alugueis = $row['total_alugueis'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cliente que mais alugou veículos</title>
    <link href="style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 36px;
            text-align: center;
            margin-bottom: 30px;
        }

        p {
            font-size: 18px;
            text-align: center;
            margin-top: 20px;
        }

        .highlight {
            font-weight: bold;
            color: #007bff;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Cliente que mais alugou veículos</h1>
        <?php if ($nome_cliente) : ?>
            <p>O cliente <span class="highlight"><?php echo $nome_cliente; ?></span> foi quem mais alugou veículos, com um total de <span class="highlight"><?php echo $total_alugueis; ?></span> alugueis.</p>
        <?php else : ?>
            <p>Nenhum dado disponível.</p>
        <?php endif; ?>
    </div>
</body>
</html>
