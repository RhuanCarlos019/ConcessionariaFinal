<?php
// Inclui o arquivo de conexão com o banco de dados
include_once 'db.php';

// Consulta para calcular a média de dias que os carros ficam alugados
$sql = "SELECT AVG(EXTRACT(DAY FROM (data_fim - data_inicio))) AS media_dias_aluguel
        FROM alugueis";

$result = $pdo->query($sql);
$row = $result->fetch(PDO::FETCH_ASSOC);
$media_dias_aluguel = $row['media_dias_aluguel'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Média de Dias que os Carros Ficam Alugados</title>
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
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Média de Dias que os Carros Ficam Alugados</h1>
        <p><?php echo "A média de dias que os carros ficam alugados é de aproximadamente " . round($media_dias_aluguel, 2) . " dias."; ?></p>
    </div>
</body>
</html>
