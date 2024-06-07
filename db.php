<?php
$dsn = 'pgsql:host=localhost;dbname=concessBD';
$username = 'postgres';
$password = 'postgres';

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Conexão falhou: ' . $e->getMessage();
}
?>

