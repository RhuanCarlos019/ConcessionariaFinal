<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Deleta o aluguel com o ID fornecido
    $sql = "DELETE FROM alugueis WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    
    if ($stmt->execute([$id])) {
        echo "<script>alert('Aluguel deletado com sucesso!'); window.location.href='listarAlugueis.php';</script>";
    } else {
        echo "<script>alert('Erro ao deletar aluguel.'); window.location.href='listarAlugueis.php';</script>";
    }
} else {
    echo "<script>alert('ID de aluguel não fornecido.'); window.location.href='listarAlugueis.php';</script>";
}
?>
