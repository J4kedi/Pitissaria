<?php
include("connection.php");

$nome = $_POST["nome_ingrediente"];
$validade = $_POST["dt_validade"];
$quantidade = $_POST["quantidade_ingrediente"];
$preco_compra = $_POST["preco_compra"];

$sql = "SELECT * FROM ingredientes WHERE nome_ingrediente = '$nome'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // O ingrediente já existe, exibir uma mensagem de erro em outra pagina
    echo '<h1>Ingrediente já cadastrado. Por favor, verifique novamente.</h1>'; //aqui ele mostra a pagina com o texto em H1
    echo '<script>setTimeout(function() { history.back(); }, 3000);</script>'; // Atraso de 3 segundos 
} else {
    // O ingrediente não existe, inserir no banco de dados 
    $sql_insert = "INSERT INTO ingredientes(nome_ingrediente, dt_validade, quantidade_ingrediente, preco_compra) VALUES('$nome', '$validade','$quantidade','$preco_compra')";
    
    if ($conn->query($sql_insert) === TRUE) {
        echo "<p>Ingrediente cadastrado com sucesso.</p>";
        echo '<script>setTimeout(function() { history.back(); }, 3000);</script>'; // Atraso de 3 segundos 
    } else {
        echo "Erro ao cadastrar o ingrediente: " . $conn->error;
    }
}

// Feche a conexão após o uso, se necessário
$conn->close();
?>
