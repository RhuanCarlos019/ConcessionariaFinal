<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cliente_id = $_POST['cliente_id'];
    $carro_id = $_POST['carro_id'];
    $data_inicio = $_POST['data_inicio'];
    $data_fim = $_POST['data_fim'];

    $sql = "INSERT INTO alugueis (cliente_id, carro_id, data_inicio, data_fim) VALUES (?, ?, ?, ?)";

    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$cliente_id, $carro_id, $data_inicio, $data_fim]);
        echo "Aluguel registrado com sucesso!";
    } catch (PDOException $e) {
        if ($e->getCode() == 23505) {
            echo "Erro: Este carro já está alugado neste período.";
        } else {
            echo "Erro: " . $e->getMessage();
        }
    }
}

$sqlClientes = "SELECT * FROM clientes";
$clientes = $pdo->query($sqlClientes)->fetchAll();

$sqlCarros = "SELECT * FROM carros";
$carros = $pdo->query($sqlCarros)->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../css/style.css">
    <title>Registrar Aluguel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        form {
            max-width: 400px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        select,
        input[type="datetime-local"],
        button[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        button[type="submit"] {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button[type="submit"]:hover {
            background-color: #0056b3;
        }
        a {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #007bff;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Registrar Aluguel</h1>
    <form method="POST">
        Cliente:
        <select name="cliente_id" required>
            <?php foreach ($clientes as $cliente) { ?>
                <option value="<?= $cliente['id'] ?>"><?= $cliente['nome'] ?></option>
            <?php } ?>
        </select><br>
        Carro:
        <select name="carro_id" required>
            <?php foreach ($carros as $carro) { ?>
                <option value="<?= $carro['id'] ?>"><?= $carro['modelo'] ?></option>
            <?php } ?>
        </select><br>
        Data Início: <input type="datetime-local" name="data_inicio" required><br>
        Data Fim: <input type="datetime-local" name="data_fim" required><br>
        <button type="submit">Registrar</button>
    </form>
    <a href="listarAlugueis.php">Voltar à Lista de Aluguéis</a>
</body>
</html>
