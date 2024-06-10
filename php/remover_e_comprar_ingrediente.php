<?php

    include("connection.php");

    session_start(); 
    
    $id_user = $_SESSION['sessao'];

    $body = json_decode(file_get_contents("php://input"),true);

    $idPizza = $body["id"];
    $ingredientes = $body["ingredientes"];
    $total = $body["total"];

    foreach($ingredientes as $ingrediente){
        ["id" =>$id, "quantidade" =>$quantidade]=$ingrediente; //Estou desestruturando o array 
        $sql = "UPDATE ingredientes SET quantidade = quantidade - $quantidade WHERE id = $id";
        $conn->query($sql);
    }

    $get_user = "SELECT e.id FROM usuario_endereco INNER JOIN enderecos e WHERE usuario_id = $id_user limit 1";
    $enderecoId = $conn->query($get_user)->fetch_assoc()["id"];

    $stmt = $conn->prepare("INSERT INTO pedidos( id_usuario, data_pedido, total, endereco_entrega_id ) VALUES ($id_user, NOW(), $total, $enderecoId)");
    $stmt->execute();

    $pedidoId = $conn->insert_id;

    $sql = "INSERT INTO itens_pedido( id_pedido, id_pizza, quantidade, preco_unitario  ) VALUES ($pedidoId, $idPizza , 1, $total)";
    $conn->query($sql);
    var_dump($conn->error);

?>