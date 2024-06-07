<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        header {
            text-align: center;
            margin-bottom: 20px;
        }
        header img {
            width: 100%;
            max-width: 800px;
        }
        h1 {
            color: #333;
        }
        nav ul {
            list-style-type: none;
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
        }
        footer {
            text-align: center;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #ccc;
        }
    </style>
    <title>Concessionária</title>
</head>
<body>
    <div class="container">
        <header>
            <h1>Bem-vindo à Concessionária</h1>
        </header>
        <nav>
            <ul>
                <li><a href="listarClientes.php">Gerenciar Clientes</a></li>
                <li><a href="listarAlugueis.php">Gerenciar Aluguéis</a></li>
                <li><a href="listarFuncionarios.php">Gerenciar Funcionários</a></li>
                <li><a href="Desafios.php">Desafios</a></li>
            </ul>
            <img src="/img/conce.jfif" alt="Banner da Concessionária">
            <img src="/img/conce.jfif" alt="Banner da Concessionária">
            <img src="/img/conce.jfif" alt="Banner da Concessionária">
            <img src="/img/conce.jfif" alt="Banner da Concessionária">
            <img src="/img/conce.jfif" alt="Banner da Concessionária">
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
</body>
</html>
