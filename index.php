<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Concessionária</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f4f4f4;
        }
        header {
            text-align: center;
            margin-bottom: 20px;
        }
        h1 {
            color: #333;
        }
        nav ul {
            padding: 0;
            margin: 0;
            text-align: center;
        }
        nav ul li {
            display: inline;
            margin-right: 20px;
        }
        nav ul li a {
            text-decoration: none;
            color: #333;
            font-weight: bold;
            font-size: 18px;
        }
        nav ul li a:hover {
            color: #007bff;
        }
        .info {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 5px;
            margin-top: 20px;
        }
        footer {
            text-align: center;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #ccc;
        }
    </style>
</head>
<body>
    <div class="container mt-5 p-4 bg-white shadow">
        <header>
            <h1>Bem-vindo à Concessionária</h1>
        </header>
        <nav>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="listarClientes.php" class="btn btn-link">Gerenciar Clientes</a></li>
                <li class="list-inline-item"><a href="listarAlugueis.php" class="btn btn-link">Gerenciar Aluguéis</a></li>
                <li class="list-inline-item"><a href="listarFuncionarios.php" class="btn btn-link">Gerenciar Funcionários</a></li>
                <li class="list-inline-item"><a href="Desafios.php" class="btn btn-link">Desafios</a></li>
            </ul>
            <div class="d-flex justify-content-center flex-wrap">
                <img src="/img/conce.jfif" class="img-fluid m-2" alt="Banner da Concessionária">
                <img src="/img/conce.jfif" class="img-fluid m-2" alt="Banner da Concessionária">
                <img src="/img/conce.jfif" class="img-fluid m-2" alt="Banner da Concessionária">
                <img src="/img/conce.jfif" class="img-fluid m-2" alt="Banner da Concessionária">
            </div>
        </nav>
        <section>
            <div class="info">
                <h2>Informativos:</h2>
                <p>Aqui você pode gerenciar os clientes, aluguéis e funcionários da concessionária.</p>
                <p>Explore as opções do menu acima para acessar as diferentes funcionalidades.</p>
            </div>
        </section>
        <footer>
            <p>&copy; 2024 Concessionária. Todos os direitos reservados.</p>
        </footer>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
