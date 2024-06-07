<?php
// Inclui o arquivo de conexão com o banco de dados
include_once 'db.php';

// Consulta para calcular a receita total da locadora em um determinado período
$sql = "SELECT SUM(valor) AS receita_total FROM alugueis";

$stmt = $pdo->query($sql);
$receita = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receita Total da Locadora</title>
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

        .receita {
            font-size: 24px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Receita Total da Locadora</h1>
        <div class="receita">
            <?php echo "Receita Total: R$ " . number_format($receita['receita_total'], 2, ',', '.'); ?>
        </div>
    </div>
</body>
</html>
