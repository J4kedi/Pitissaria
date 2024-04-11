<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../../Style/cad_ingredientes.css">
</head>
<body>
<?php
include("connection.php");

$nome = $_POST["nome"];
$senha = $_POST["senha"];
$cpf = $_POST["cpf"];
$email = $_POST["email"];
$dt_nasc = $_POST["dt_nasc"];
$nome_rua = $_POST["nome_rua"]
$cep = $_POST["cep"];
$num_res = $_POST["num_res"];
$num_telefone = $_POST["num_telefone"];

$sql = "SELECT * FROM user WHERE cpf = '$cpf'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // O usuario já existe, exibir uma mensagem de erro em outra pagina
    echo '<h1>usuario já cadastrado. Por favor cadastre outro .</h1>'; //aqui ele mostra a pagina com o texto em H1
    echo '<script>setTimeout(function() { history.back(); }, 5000);</script>'; // Atraso de 5 segundos 
} else {
    // O usuario não existe, inserir no banco de dados 
    $sql_insert = "INSERT INTO user(nome, senha, cpf, email, dt_nasc, cep, num_res, num_telefone) VALUES('$nome', '$senha','$cpf','$email', '$dt_nasc', '$cep', '$num_res', '$num_telefone')";
    
    if ($conn->query($sql_insert) === TRUE) {
        echo "<h1>Usuario cadastrado com sucesso.</h1>";
        echo '<script>setTimeout(function() { window.location.href = "index.php"; }, 5000);</script>'; // Redireciona para index.php após 5 segundos 
    } else {
        echo "Erro ao cadastrar o usuario: " . $conn->error;
    }
}

// Feche a conexão após o uso, se necessário
$conn->close();
?>


</body>
</html>

