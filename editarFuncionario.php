<?php
// Inclui o arquivo de conexão com o banco de dados
include_once 'db.php';

// Verifica se o ID do funcionário foi fornecido na URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    // Redireciona de volta para a página de listagem de funcionários se o ID não for fornecido
    header("Location: listarFuncionarios.php");
    exit;
}

// Inicializa variáveis de erro vazias
$nome_err = $email_err = $cargo_err = "";

// Processa os dados do formulário quando o formulário é submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Valida o ID do funcionário
    $id = $_POST['id'];

    // Valida o nome do funcionário
    $input_nome = trim($_POST["nome"]);
    if (empty($input_nome)) {
        $nome_err = "Por favor, insira o nome do funcionário.";
    } else {
        $nome = $input_nome;
    }

    // Valida o email do funcionário
    $input_email = trim($_POST["email"]);
    if (empty($input_email)) {
        $email_err = "Por favor, insira o email do funcionário.";
    } else {
        $email = $input_email;
    }

    // Valida o cargo do funcionário
    $input_cargo = trim($_POST["cargo"]);
    if (empty($input_cargo)) {
        $cargo_err = "Por favor, insira o cargo do funcionário.";
    } else {
        $cargo = $input_cargo;
    }

    // Verifica se não há erros de entrada antes de inserir no banco de dados
    if (empty($nome_err) && empty($email_err) && empty($cargo_err)) {
        // Prepara a declaração UPDATE
        $sql = "UPDATE funcionarios SET nome = :nome, email = :email, cargo = :cargo WHERE id = :id";

        if ($stmt = $pdo->prepare($sql)) {
            // Vincula variáveis à instrução preparada como parâmetros
            $stmt->bindParam(":nome", $nome);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":cargo", $cargo);
            $stmt->bindParam(":id", $id);

            // Tentativa de executar a declaração preparada
            if ($stmt->execute()) {
                // Redireciona de volta para a página de listagem de funcionários
                header("Location: listarFuncionarios.php");
                exit();
            } else {
                echo "Algo deu errado. Por favor, tente novamente mais tarde.";
            }
        } else {
            echo "Não foi possível preparar a declaração SQL.";
        }

        // Fecha a declaração
        unset($stmt);
    }

    // Fecha a conexão
    unset($pdo);
} else {
    // Verifica se o ID do funcionário foi passado na URL e preenche os campos do formulário com os dados do funcionário
    if (isset($_GET['id']) && !empty(trim($_GET['id']))) {
        // Prepara uma declaração SELECT
        $sql = "SELECT * FROM funcionarios WHERE id = :id";

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
                    $nome = $row["nome"];
                    $email = $row["email"];
                    $cargo = $row["cargo"];
                } else {
                    // Redireciona para a página de erro se o ID do funcionário não existir
                    header("location: error.php");
                    exit();
                }
            } else {
                echo "Oops! Algo deu errado. Por favor, tente novamente mais tarde.";
            }
        }

        // Fecha a declaração
        unset($stmt);

        // Fecha a conexão
        unset($pdo);
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Funcionário</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Editar Funcionário</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . "?id=" . $_GET['id']; ?>" method="post">
            <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
            <div class="form-group <?php echo (!empty($nome_err)) ? 'has-error' : ''; ?>">
                <label>Nome</label>
                <input type="text" name="nome" class="form-control" value="<?php echo $nome; ?>">
                <span class="help-block"><?php echo $nome_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="<?php echo $email; ?>">
                <span class="help-block"><?php echo $email_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($cargo_err)) ? 'has-error' : ''; ?>">
                <label>Cargo</label>
                <input type="text" name="cargo" class="form-control" value="<?php echo $cargo; ?>">
                <span class="help-block"><?php echo $cargo_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Salvar">
                <a href="listarFuncionarios.php" class="btn btn-default">Cancelar</a>
            </div>
        </form>
    </div>
</body>
</html>
