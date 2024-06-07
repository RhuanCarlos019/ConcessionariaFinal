<?php
// Inclui o arquivo de conexão com o banco de dados
include_once 'db.php';

// Consulta para encontrar os carros que nunca foram alugados
$sql = "SELECT * FROM carros WHERE id NOT IN (SELECT DISTINCT carro_id FROM alugueis)";

$result = $pdo->query($sql);
$rows = $result->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carros que nunca foram alugados</title>
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

        ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        li {
            font-size: 18px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Carros que nunca foram alugados</h1>
        <ul>
            <?php if ($rows) : ?>
                <?php foreach ($rows as $row) : ?>
                    <li><?php echo $row['modelo']; ?> (Placa: <?php echo $row['placa']; ?>)</li>
                <?php endforeach; ?>
            <?php else : ?>
                <li>Nenhum carro encontrado.</li>
            <?php endif; ?>
        </ul>
    </div>
</body>
</html>
