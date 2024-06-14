<?php
// Inclui o arquivo de conexão com o banco de dados
include_once 'db.php';

// Verifica se o ID do cliente foi fornecido na URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    // Redireciona de volta para a página de listagem de clientes se o ID não for fornecido
    header("Location: listarClientes.php");
    exit;
}

// Inicializa variáveis de erro vazias
$nome_err = $email_err = $telefone_err = "";

// Processa os dados do formulário quando o formulário é submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Valida o ID do cliente
    $id = $_POST['id'];

    // Valida o nome do cliente
    $input_nome = trim($_POST["nome"]);
    if (empty($input_nome)) {
        $nome_err = "Por favor, insira o nome do cliente.";
    } else {
        $nome = $input_nome;
    }

    // Valida o email do cliente
    $input_email = trim($_POST["email"]);
    if (empty($input_email)) {
        $email_err = "Por favor, insira o email do cliente.";
    } else {
        $email = $input_email;
    }

    // Valida o telefone do cliente
    $input_telefone = trim($_POST["telefone"]);
    if (empty($input_telefone)) {
        $telefone_err = "Por favor, insira o telefone do cliente.";
    } else {
        $telefone = $input_telefone;
    }

    // Verifica se não há erros de entrada antes de inserir no banco de dados
    if (empty($nome_err) && empty($email_err) && empty($telefone_err)) {
        // Prepara a declaração UPDATE
        $sql = "UPDATE clientes SET nome=:nome, email=:email, telefone=:telefone WHERE id=:id";

        if ($stmt = $pdo->prepare($sql)) {
            // Vincula variáveis à instrução preparada como parâmetros
            $stmt->bindParam(":nome", $nome);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":telefone", $telefone);
            $stmt->bindParam(":id", $id);

            // Tentativa de executar a declaração preparada
            if ($stmt->execute()) {
                // Redireciona de volta para a página de listagem de clientes
                header("Location: listarClientes.php");
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
    // Verifica se o ID do cliente foi passado na URL e preenche os campos do formulário com os dados do cliente
    if (isset($_GET['id']) && !empty(trim($_GET['id']))) {
        // Prepara uma declaração SELECT
        $sql = "SELECT * FROM clientes WHERE id = :id";

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
                    $telefone = $row["telefone"];
                } else {
                    // Redireciona para a página de erro se o ID do cliente não existir
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
    <title>Editar Cliente</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Editar Cliente</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . "?id=" . $_GET['id']; ?>" method="post">
            <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
            <div class="form-group <?php echo (!empty($nome_err)) ? 'has-error' : ''; ?>">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" value="<?php echo $nome; ?>">
                <span class="help-block"><?php echo $nome_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo $email; ?>">
                <span class="help-block"><?php echo $email_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($telefone_err)) ? 'has-error' : ''; ?>">
                <label for="telefone">Telefone:</label>
                <input type="text" id="telefone" name="telefone" value="<?php echo $telefone; ?>">
                <span class="help-block"><?php echo $telefone_err; ?></span>
            </div>
            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
            <a href="listarClientes.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>
