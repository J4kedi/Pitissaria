<?php
include('../php/connection.php');

session_start();
if (!isset($_SESSION['sessao'])) {
    header("Location: ../paginas/login.php");
    exit();
}

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

if (isset($_POST['delete_item'])) {
    $id_item = $_POST['id_item'];

    // SQL para excluir o item do pedido
    $sql_delete = "DELETE FROM itens_pedido WHERE id = $id_item";
    if ($conn->query($sql_delete) === TRUE) {
        echo "<script>alert('Item excluído com sucesso!'); window.location.href = 'carrinho_teste.php';</script>";
    } else {
        echo "Erro ao excluir o item: " . $conn->error;
    }
} else {
    header("Location: carrinho.php");
}

// Fechar conexão com o banco de dados
$conn->close();
?>
