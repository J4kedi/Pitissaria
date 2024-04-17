<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../../Style/cad_ingredientes.css">
</head>
<body>
<?php
include("../php/connection.php");

$nome = $_POST["nome"];
$senha = md5($_POST["senha"]);
$username = $_POST["username"];
$cpf = $_POST["cpf"];
$email = $_POST["email"];
$dt_nasc = $_POST["dt_nasc"];
$rua = $_POST["rua"];
$cep = $_POST["cep"];
$estado = $_POST["estado"];
$cidade = $_POST["cidade"];
$num_telefone = $_POST["num_telefone"];

$sql = "SELECT * FROM user_endereco_user WHERE cpf = '$cpf'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // O usuario já existe, exibir uma mensagem de erro em outra pagina
    echo '<h1>usuario já cadastrado. Por favor cadastre outro .</h1>'; //aqui ele mostra a pagina com o texto em H1
    echo '<script>setTimeout(function() { history.back(); }, 1000);</script>'; // Atraso de 5 segundos 
} else {
    // O usuario não existe, inserir no banco de dados 
    $sql_insert = "INSERT INTO user_endereco_user(nome, senha, username, cpf, email, dt_nasc, rua, cep, estado, cidade, num_telefone) VALUES('$nome', '$senha','$username','$cpf','$email', '$dt_nasc', '$rua', '$cep', '$estado', '$cidade', '$num_telefone')";
    
    if ($conn->query($sql_insert) === TRUE) {
        echo "<h1>Usuario cadastrado com sucesso.</h1>";
        echo '<script>setTimeout(function() { window.location.href = "index.php"; }, 1000);</script>'; // Redireciona para index.php após 5 segundos 
    } else {
        echo "Erro ao cadastrar o usuario: " . $conn->error;
    }
}

// Feche a conexão após o uso, se necessário
$conn->close();
?>


</body>
</html>

