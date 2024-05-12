<?php
include("../php/connection.php");
session_start(); // Inicia a sessão

$login = $_POST["username"]; // Alterado para corresponder ao nome do campo no formulário
$password = md5($_POST["senha"]); // Alterado para corresponder ao nome do campo no formulário

$sql = "SELECT username, senha, tipo_usuario, id FROM usuarios WHERE username = '$login'"; // Ajustado para corresponder aos nomes das colunas na tabela

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        if ($row["senha"] == $password) {
            $_SESSION['tp_user'] = $row['tipo_usuario']; // Armazena o valor de tp_user na sessão
            $_SESSION['logged_in'] = true; // Define a variável de sessão para indicar que o login foi bem-sucedido
            $_SESSION['id_user'] = $row['id'];
            header("location: index.php?login_success=1"); // Redireciona para a página principal com um parâmetro indicando login bem-sucedido
            exit(); // Adicionado para garantir que o script pare de ser executado após o redirecionamento
        }
    }
}

// Se chegou até aqui, significa que o login não foi bem-sucedido
header("location: login.php?login_error=1"); // Redireciona de volta para a página de login com um parâmetro indicando erro de login
exit(); // Adicionado para garantir que o script pare de ser executado após o redirecionamento
?>
