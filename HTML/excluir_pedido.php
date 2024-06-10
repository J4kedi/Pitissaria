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

if (isset($_POST['id'])) {
    $id_pedido = $_POST['id'];

    // SQL to delete the pedido and its items
    $sql_delete_itens = "DELETE FROM itens_pedido WHERE id_pedido = $id_pedido";
    $sql_delete_pedido = "DELETE FROM pedidos WHERE id = $id_pedido";

    if ($conn->query($sql_delete_itens) === TRUE && $conn->query($sql_delete_pedido) === TRUE) {
        echo "Pedido excluído com sucesso!";
    } else {
        echo "Erro ao excluir o pedido: " . $conn->error;
    }
} else {
    echo "ID do pedido não fornecido.";
}

// Fechar conexão com o banco de dados
$conn->close();
?>
