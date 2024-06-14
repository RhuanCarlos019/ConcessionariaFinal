<?php
include 'db.php';

// Verifica se o ID do aluguel foi fornecido na URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    // Redireciona de volta para a página de listagem de aluguéis se o ID não for fornecido
    header("Location: listarAlugueis.php");
    exit;
}

// Inicializa variáveis de erro vazias
$cliente_id_err = $carro_id_err = $data_inicio_err = $data_fim_err = "";

// Processa os dados do formulário quando o formulário é submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Valida o ID do aluguel
    $id = $_POST['id'];

    // Valida o ID do cliente
    $cliente_id = $_POST['cliente_id'];
    if (empty($cliente_id)) {
        $cliente_id_err = "Por favor, selecione um cliente.";
    }

    // Valida o ID do carro
    $carro_id = $_POST['carro_id'];
    if (empty($carro_id)) {
        $carro_id_err = "Por favor, selecione um carro.";
    }

    // Valida a data de início do aluguel
    $data_inicio = $_POST['data_inicio'];
    if (empty($data_inicio)) {
        $data_inicio_err = "Por favor, insira a data de início.";
    }

    // Valida a data de fim do aluguel
    $data_fim = $_POST['data_fim'];
    if (empty($data_fim)) {
        $data_fim_err = "Por favor, insira a data de fim.";
    }

    // Verifica se não há erros de entrada antes de inserir no banco de dados
    if (empty($cliente_id_err) && empty($carro_id_err) && empty($data_inicio_err) && empty($data_fim_err)) {
        // Prepara a declaração UPDATE
        $sql = "UPDATE alugueis SET cliente_id=:cliente_id, carro_id=:carro_id, data_inicio=:data_inicio, data_fim=:data_fim WHERE id=:id";

        try {
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":cliente_id", $cliente_id);
            $stmt->bindParam(":carro_id", $carro_id);
            $stmt->bindParam(":data_inicio", $data_inicio);
            $stmt->bindParam(":data_fim", $data_fim);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            echo "Aluguel atualizado com sucesso!";
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
    }
} else {
    // Verifica se o ID do aluguel foi passado na URL e preenche os campos do formulário com os dados do aluguel
    if (isset($_GET['id']) && !empty(trim($_GET['id']))) {
        // Prepara uma declaração SELECT
        $sql = "SELECT * FROM alugueis WHERE id = :id";

        if ($stmt = $pdo->prepare($sql)) {
            // Vincula variáveis à instrução preparada como parâmetros
            $stmt->bindParam(":id", $param_id);

            // Define os parâmetros
            $param_id = trim($_GET["id"]);

            // Tentativa de executar a declaração preparada
            if ($stmt->execute()) {
                if ($stmt->rowCount() == 1) {
                    // Recupera a linha do resultado como uma matriz associativa
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);

                    // Recupera os valores dos campos individuais
                    $cliente_id = $row["cliente_id"];
                    $carro_id = $row["carro_id"];
                    $data_inicio = $row["data_inicio"];
                    $data_fim = $row["data_fim"];
                } else {
                    // Redireciona para a página de erro se o ID do aluguel não existir
                    header("location: error.php");
                    exit();
                }
            } else {
                echo "Oops! Algo deu errado. Por favor, tente novamente mais tarde.";
            }
        }

        // Fecha a declaração
        unset($stmt);
    }
}

// Carrega os dados dos clientes e carros
$sqlClientes = "SELECT * FROM clientes";
$clientes = $pdo->query($sqlClientes)->fetchAll();

$sqlCarros = "SELECT * FROM carros";
$carros = $pdo->query($sqlCarros)->fetchAll();

// Fecha a conexão
unset($pdo);
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Editar Aluguel</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Editar Aluguel</h1>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . "?id=" . $_GET['id']; ?>">
            <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
            <div class="form-group <?php echo (!empty($cliente_id_err)) ? 'has-error' : ''; ?>">
                <label for="cliente_id">Cliente:</label>
                <select name="cliente_id" class="form-control" required>
                    <?php foreach ($clientes as $cliente) { ?>
                        <option value="<?= $cliente['id'] ?>" <?= ($cliente_id == $cliente['id']) ? 'selected' : '' ?>><?= $cliente['nome'] ?></option>
                    <?php } ?>
                </select>
                <span class="text-danger"><?php echo $cliente_id_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($carro_id_err)) ? 'has-error' : ''; ?>">
                <label for="carro_id">Carro:</label>
                <select name="carro_id" class="form-control" required>
                    <?php foreach ($carros as $carro) { ?>
                        <option value="<?= $carro['id'] ?>" <?= ($carro_id == $carro['id']) ? 'selected' : '' ?>><?= $carro['modelo'] ?></option>
                    <?php } ?>
                </select>
                <span class="text-danger"><?php echo $carro_id_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($data_inicio_err)) ? 'has-error' : ''; ?>">
                <label for="data_inicio">Data Início:</label>
                <input type="datetime-local" id="data_inicio" name="data_inicio" class="form-control" value="<?php echo $data_inicio; ?>" required>
                <span class="text-danger"><?php echo $data_inicio_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($data_fim_err)) ? 'has-error' : ''; ?>">
                <label for="data_fim">Data Fim:</label>
                <input type="datetime-local" id="data_fim" name="data_fim" class="form-control" value="<?php echo $data_fim; ?>" required>
                <span class="text-danger"><?php echo $data_fim_err; ?></span>
            </div>
            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
            <a href="listarAlugueis.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
