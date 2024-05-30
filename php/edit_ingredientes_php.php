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
    $nome = $_POST["nome"];
    $validade = $_POST["data_validade"];
    $data_compra = $_POST["data_entrada"];
    $quantidade = $_POST["quantidade"];
    $preco = $_POST["preco"];

    $sql = "UPDATE ingredientes SET nome = '$nome', data_validade = '$validade', data_entrada = '$data_entrada', quantidade = '$quantidade', preco = '$preco' WHERE id = $id";
    $result =  $conn->query($sql);

    if ($result === TRUE) {
        echo "<h1>Dados alterados com sucesso.</h1>";
        echo '<script>setTimeout(function() { window.location.href = "lista_ingredientes.php"; }, 30000);</script>'; // Redireciona para lista_ingredientes.php após 3 segundos 
    }   
    else{
        echo "Erro ao cadastrar ingrediente: " . $conn->error;
    }
?>

</body>
</html>

