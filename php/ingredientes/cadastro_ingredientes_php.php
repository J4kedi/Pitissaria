<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../../Style/cad_ingredientes.css">
<title>Caixa com H1 no Centro da Tela</title>
<style>

</style>
</head>
<body>
<?php
include("connection.php");

$nome = $_POST["nome_ingrediente"];
$validade = $_POST["dt_validade"];
$quantidade = $_POST["quantidade_ingrediente"];
$preco_compra = $_POST["preco_compra"];

$sql = "SELECT * FROM ingredientes WHERE nome_ingrediente = '$nome'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // O insumo já existe, exibir uma mensagem de erro em outra pagina
    echo '<h1>Insumo já cadastrado. Por favor cadastre outro insumo.</h1>'; //aqui ele mostra a pagina com o texto em H1
    echo '<script>setTimeout(function() { history.back(); }, 5000);</script>'; // Atraso de 5 segundos 
} else {
    // O insumo não existe, inserir no banco de dados 
    $sql_insert = "INSERT INTO ingredientes(nome_ingrediente, dt_validade, quantidade_ingrediente, preco_compra) VALUES('$nome', '$validade','$quantidade','$preco_compra')";
    
    if ($conn->query($sql_insert) === TRUE) {
        echo "<h1>Insumo cadastrado com sucesso.</h1>";
        echo '<script>setTimeout(function() { window.location.href = "lista_ingredientes.php"; }, 5000);</script>'; // Redireciona para lista_ingredientes.php após 5 segundos 
    } else {
        echo "Erro ao cadastrar o ingrediente: " . $conn->error;
    }
}

// Feche a conexão após o uso, se necessário
$conn->close();
?>


</body>
</html>

