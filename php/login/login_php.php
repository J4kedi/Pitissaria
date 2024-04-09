<?php 
session_start();
require_once "../ingredientes/connection.php";

if ($conn->connect_error) {
    die("<strong> Falha de conexão: </strong>" . $conn->connect_error);
}

$username = $conn->real_escape_string($_POST['login']);
$senha = $conn->real_escape_string($_POST['senha']);

$sql = "SELECT id_user, nome FROM user WHERE login = '$username' AND senha = md5('$senha')";

if ($result = $conn->query($sql)){
    if ($result->num_rows == 1){
        $row = $result->fetch_assoc();
        $_SESSION['login'] = $username;
        $_SESSION['id_user'] = $row['id_user'];
        $_SESSION['nome'] = $row['nome'];
        unset($_SESSION['nao_autenticado']);
        // Aqui você precisa definir o tipo de usuário em $_SESSION['tp_user']
        // e depois verificar se é 'gerente' ou outro tipo
        if ($_SESSION['tp_user'] == 'gerente'){
            $conn->close();
            header('location: ingredientes/lista_ingredientes.php');
            exit(); // Sempre finalize o script após um redirecionamento de cabeçalho
        }
    }
    else{
        echo("erro");
        exit();
        header('location: index.php'); 
    }
}
?>
