<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pizzaiolo</title>
    <link rel="stylesheet" href="../Style/cad_ingredientes.css">
    <link rel="stylesheet" href="../Style/padrao.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="shortcut icon" href="../imagens/icone/pizza.ico" type="image/x-icon">
</head>
<body>
<?php
    include("connection.php");
    include("../geral/menu.php");
    include("validacao_gerente")
    include("validacao_gerente_pizzaiolo");
    verificarGerente();
    verificarAcesso();

    
    
    $id = $_POST["id"];

    $nome = $_POST["nome"];

    $username = $_POST["username"];

    $cpf = $_POST["cpf"];

    $email = $_POST["email"];

    $senha = $POST["senha"];

    $data_nascimento = $POST["data_nascimento"];

    $num_telefone = $POST["num_telefone"];

    $estado = $POST["estado"];

    $cep = $POST["cep"];

    $cidade = $POST["cidade"];

    $rua = $POST["rua"];

    $sql = "UPDATE usuarios SET nome = '$nome', username = '$username', cpf = '$cpf', email = '$email', senha = '$senha', data_nascimento = '$data_nascimento', celular = '$celular' WHERE id = $id";
    $sql_endereco = "UPDATE usuario_endereco SET estado = '$estado',cep = '$cep', cidade = '$cidade', rua = '$rua' WHERE $id = 'id'";
    
    $result =  $conn->query($sql);

    if ($result === TRUE) {
        echo "<h1>Dados alterados com sucesso.</h1>";
        echo '<script>setTimeout(function() { window.location.href = "lista_ingredientes.php"; }, 2000);</script>'; // Redireciona para lista_ingredientes.php após 2 segundos 
    }   
    else{
        echo "Erro ao cadastrar ingrediente: " . $conn->error;
    }
?>

</body>
</html>

