<?php
// Inclui o arquivo de conexão com o banco de dados
include_once 'db.php';

// Consulta para selecionar os carros e suas informações de manutenção
$sql = "SELECT ca.id AS carro_id, ca.modelo, m.data_manutencao, m.descricao
        FROM carros ca
        LEFT JOIN manutencao m ON ca.id = m.carro_id
        ORDER BY m.data_manutencao DESC";

$result = $pdo->query($sql);
$carros_manutencao = $result->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carros com Informações de Manutenção</title>
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
        <h1>Carros com Informações de Manutenção</h1>
        <table>
            <thead>
                <tr>
                    <th>ID do Carro</th>
                    <th>Modelo</th>
                    <th>Data de Manutenção</th>
                    <th>Descrição da Manutenção</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($carros_manutencao as $carro_manutencao): ?>
                    <tr>
                        <td><?php echo $carro_manutencao['carro_id']; ?></td>
                        <td><?php echo $carro_manutencao['modelo']; ?></td>
                        <td><?php echo $carro_manutencao['data_manutencao']; ?></td>
                        <td><?php echo $carro_manutencao['descricao']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
