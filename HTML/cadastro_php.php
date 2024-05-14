<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../Style/cad_ingredientes.css">
</head>
<body>
<?php
include("../php/connection.php");

$email = $_POST["email"];
$username = $_POST["username"];
$senha = md5($_POST["senha"]);
$nome = $_POST["nome"];
$cpf = $_POST["cpf"];
$dt_nasc = $_POST["dt_nasc"];
$num_telefone = $_POST["telefone"];
$cep = $_POST["cep"];
$rua = $_POST["rua"];
$estado = $_POST["estado"];
$cidade = $_POST["cidade"];

$sql = "SELECT * FROM user_endereco_user WHERE cpf = '$cpf'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // O usuario já existe, exibir uma mensagem de erro em outra pagina
    echo '<h1>usuario já cadastrado. Por favor cadastre outro .</h1>'; //aqui ele mostra a pagina com o texto em H1
    echo '<script>setTimeout(function() { history.back(); }, 2000);</script>'; // Atraso de 10 ms 
} else {
    // O usuario não existe, inserir no banco de dados 
    $sql_insert = "INSERT INTO usuarios(nome, senha, username, cpf, email, data_nascimento, rua, cep, estado, cidade, celular) VALUES('$nome', '$senha','$username','$cpf','$email', '$dt_nasc', '$rua', '$cep', '$estado', '$cidade', '$num_telefone')";
    
    if ($conn->query($sql_insert) === TRUE) {
        echo "<h1>Usuario cadastrado com sucesso.</h1>";
        echo '<script>setTimeout(function() { window.location.href = "index.php"; }, 2000);</script>'; // Redireciona para index.php após 10 ms 
    } else {
        echo "Erro ao cadastrar o usuario: " . $conn->error;
    }
}

// Feche a conexão após o uso, se necessário
$conn->close();
?>


</body>
</html>

