<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../Style/cad_ingredientes.css">
<title>Vericação de Insumos</title>
<link rel="shortcut icon" href="../imagens/icone/pizza.ico" type="image/x-icon">
</head>
<body>
<?php
include("connection.php");   
include("validacao_acesso_php.php");
verificarAcessoGerenteEPizzaiolo();

$nome = $_POST["nome_ingrediente"];
$validade = $_POST["dt_validade"];
$quantidade = $_POST["quantidade_ingrediente"];
$preco_compra = $_POST["preco_compra"];

$sql = "SELECT * FROM ingrediente WHERE nome_ingrediente = '$nome'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // O insumo já existe, exibir uma mensagem de erro em outra pagina
    echo '<h1>Insumo já cadastrado. Por favor cadastre outro insumo.</h1>'; //aqui ele mostra a pagina com o texto em H1
    echo '<script>setTimeout(function() { history.back(); }, 1000);</script>'; // Atraso de 2 segundos 
} else {
    // O insumo não existe, inserir no banco de dados 
    $sql_insert = "INSERT INTO ingredientes(nome, data_validade, quantidade, preco) VALUES('$nome', '$validade','$quantidade','$preco_compra')";
    
    if ($conn->query($sql_insert) === TRUE) {
        echo "<h1>Insumo cadastrado com sucesso.</h1>";
        echo '<script>setTimeout(function() { window.location.href = "lista_ingredientes.php"; }, 2000);</script>'; // Redireciona para lista_ingredientes.php após 5 segundos 
    } else {
        echo "Erro ao cadastrar o ingrediente: " . $conn->error;
    }
}

// Feche a conexão após o uso, se necessário
$conn->close();
?>


</body>
</html>

