<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Ingredientes</title>
    <link rel="stylesheet" href="../Style/cad_ingredientes.css">
    <link rel="shortcut icon" href="../imagens/icone/pizza.ico" type="image/x-icon">
</head>
<body>
<?php
    include("connection.php");

    
    $id = $_POST["id"];
    $nome = $_POST["nome_ingrediente"];
    $validade = $_POST["dt_validade"];
    $quantidade = $_POST["quantidade_ingrediente"];
    $preco_compra = $_POST["preco_compra"];

    $sql = "UPDATE ingrediente SET nome_ingrediente = '$nome', dt_validade = '$validade', quantidade_ingrediente = '$quantidade', preco_compra = '$preco_compra' WHERE id_ingrediente = $id";
    $result =  $conn->query($sql);

    if ($result === TRUE) {
        echo "<h1>Dados alterados com sucesso.</h1>";
        echo '<script>setTimeout(function() { window.location.href = "lista_ingredientes.php"; }, 3000);</script>'; // Redireciona para lista_ingredientes.php após 3 segundos 
    }   
    else{
        echo "Erro ao cadastrar ingrediente: " . $conn->error;
    }
?>

</body>
</html>

