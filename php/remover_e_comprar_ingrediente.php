<?php

    include("connection.php");

    session_start(); 
    
    $id_user = $_SESSION['id_user'];

    $body = json_decode(file_get_contents("php://input"),true);

    $id_ingredientes = $body["id_ingredientes"];

    $id = $body["id"];

    $lista_ingredientes = implode("," , $id_ingredientes);

    $sql = "UPDATE ingrediente SET quantidade_ingrediente = quantidade_ingrediente -1 WHERE id_ingrediente in($lista_ingredientes)";

    $conn->query($sql);

    $sql = "INSERT INTO pizza_compradas(id_user_endereco_user, id_pizza, status_pizza) VALUES ($id_user,$id, 'value_1')";
    echo $sql;
    $conn->query($sql);


?>