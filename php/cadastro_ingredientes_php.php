<?php
    include("connection.php");

    $nome = $_POST["nome_ingrediente"];
    $validade = $_POST["dt_validade"];
    $quantidade = $_POST["quantidade_ingrediente"];
    $preco_compra = $_POST["preco_compra"];

    $sql = "INSERT INTO ingredientes(nome_ingrediente, dt_validade, quantidade_ingrediente, preco_compra) VALUES('$nome', '$validade','$quantidade','$preco_compra')";
    $result =  $conn->query($sql);

    if ($result === TRUE) {
        header("location: lista_ingredientes.php");
    }   
    else{
        echo "Erro ao cadastrar ingrediente: " . $conn->error;
    }
?>
