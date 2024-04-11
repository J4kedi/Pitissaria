<?php 
include("connection.php");
session_start(); // Inicia a sessão

$login = $_POST["nome"]; // Alterado para corresponder ao nome do campo no formulário
$password = $_POST["senha"]; // Alterado para corresponder ao nome do campo no formulário

$sql = "SELECT nome, senha, tp_user FROM user WHERE nome = '$login' AND senha = '$password'"; // Ajustado para corresponder aos nomes das colunas na tabela

$result = $conn->query($sql);

if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        $_SESSION['tp_user'] = $row['tp_user']; // Armazena o valor de tp_user na sessão
        $_SESSION['logged_in'] = true; // Define a variável de sessão para indicar que o login foi bem-sucedido
        header("location: index.php?login_success=1"); // Redireciona para a página principal com um parâmetro indicando login bem-sucedido
        exit(); // Adicionado para garantir que o script pare de ser executado após o redirecionamento
    }
}
else{
    echo "Erro ao logar";
}
?>
