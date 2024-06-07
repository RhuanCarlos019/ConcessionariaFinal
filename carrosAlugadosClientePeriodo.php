<?php
// Inclui o arquivo de conexão com o banco de dados
include_once 'db.php';

// Parâmetros de busca
$cliente_id = 1; // Substitua pelo ID do cliente desejado
$data_inicio = '2024-01-01';
$data_fim = '2024-12-31';

// Consulta para selecionar os carros alugados por um cliente em um período específico
$sql = "SELECT c.modelo, c.ano, c.cor, a.data_inicio, a.data_fim
        FROM alugueis a
        INNER JOIN carros c ON a.carro_id = c.id
        WHERE a.cliente_id = :cliente_id
        AND a.data_inicio BETWEEN :data_inicio AND :data_fim";

$stmt = $pdo->prepare($sql);
$stmt->bindParam(':cliente_id', $cliente_id, PDO::PARAM_INT);
$stmt->bindParam(':data_inicio', $data_inicio, PDO::PARAM_STR);
$stmt->bindParam(':data_fim', $data_fim, PDO::PARAM_STR);
$stmt->execute();
$alugueis = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carros Alugados por Cliente em Período Específico</title>
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Carros Alugados por Cliente em Período Específico</h1>
        <table>
            <thead>
                <tr>
                    <th>Modelo</th>
                    <th>Ano</th>
                    <th>Cor</th>
                    <th>Data de Início</th>
                    <th>Data de Fim</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($alugueis as $aluguel): ?>
                    <tr>
                        <td><?php echo $aluguel['modelo']; ?></td>
                        <td><?php echo $aluguel['ano']; ?></td>
                        <td><?php echo $aluguel['cor']; ?></td>
                        <td><?php echo $aluguel['data_inicio']; ?></td>
                        <td><?php echo $aluguel['data_fim']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
