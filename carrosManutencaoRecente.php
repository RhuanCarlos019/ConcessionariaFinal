<?php
// Inclui o arquivo de conexão com o banco de dados
include_once 'db.php';

// Consulta para encontrar os carros com a manutenção mais recente
$sql = "SELECT c.modelo, c.placa, m.data_manutencao
        FROM carros c
        LEFT JOIN manutencao m ON c.id = m.carro_id
        ORDER BY m.data_manutencao DESC
        LIMIT 10";

$result = $pdo->query($sql);
$rows = $result->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carros com manutenção mais recente</title>
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

        table, th, td {
            border: 1px solid #ccc;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Carros com manutenção mais recente</h1>
        <table>
            <thead>
                <tr>
                    <th>Modelo</th>
                    <th>Placa</th>
                    <th>Data da Manutenção</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($rows) : ?>
                    <?php foreach ($rows as $row) : ?>
                        <tr>
                            <td><?php echo $row['modelo']; ?></td>
                            <td><?php echo $row['placa']; ?></td>
                            <td><?php echo $row['data_manutencao']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="3">Nenhum carro com manutenção encontrada.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
