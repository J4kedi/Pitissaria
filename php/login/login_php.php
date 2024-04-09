<?php 
    session_start();
    require_once "connection.php";

    if ($conn->connect_error) {
        die("<strong> Falha de conexão: </strong>" . $conn->connect_error);
    }

    $username = $conn->real_escape_string($_POST['login']); // prepara a string recebida para ser utilizada em comando SQL
    $senha   = $conn->real_escape_string($_POST['senha']); // prepara a string recebida para ser utilizada em comando SQL

    $sql = "SELECT id_user, nome, FROM user WHERE tp_user = id_user AND login = '$username' AND senha = md5('$senha')";

    if ($result = $conn->query($sql)){
        if ($result->num_rows==1){
            $row = $result->fetch_assoc();
            $_SESSION['login'] = $username;
            $_SESSION['id_user'] = $row['id_usuario'];
            $_SESSION['nome'] = $row['nome'];
            unset($_SESSION['nao_autenticado']);
            if ($_SESSION['tp_user'] == 'gerente'){
                $conn->close();
                header('location:php\ingredientes\lista_ingredientes.php')
                exit()
            }
        }
    }
?>