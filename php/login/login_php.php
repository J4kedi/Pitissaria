<?php 
    session_start();
    require_once "connection.php";

    if ($conn->connect_error) {
        die("<strong> Falha de conexão: </strong>" . $conn->connect_error);
    }

    $username = $conn->real_escape_string($_POST['username']); // prepara a string recebida para ser utilizada em comando SQL
    $senha   = $conn->real_escape_string($_POST['senha']); // prepara a string recebida para ser utilizada em comando SQL

?>