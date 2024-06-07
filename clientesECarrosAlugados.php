<?php
// Inclui o arquivo de conexão com o banco de dados
include_once 'db.php';

// Consulta para selecionar os clientes e os carros que eles alugaram
$sql = "SELECT c.nome AS cliente_nome, ca.modelo AS carro_modelo
        FROM alugueis a
        INNER JOIN clientes c ON a.cliente_id = c.id
        INNER JOIN carros ca ON a.carro_id = ca.id";

$result = $pdo->query($sql);
$alugueis = $result->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes e Carros Alugados</title>
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
        <h1>Clientes e Carros Alugados</h1>
        <table>
            <thead>
                <tr>
                    <th>Nome do Cliente</th>
                    <th>Modelo do Carro</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($alugueis as $aluguel): ?>
                    <tr>
                        <td><?php echo $aluguel['cliente_nome']; ?></td>
                        <td><?php echo $aluguel['carro_modelo']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
