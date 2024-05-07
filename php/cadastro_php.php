<!DOCTYPE html>
<html lang="PT-Br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"> 
    <link rel="stylesheet" href="../Style/cad_ingredientes.css">
    <link rel="stylesheet" href="../Style/padrao.css">
    <link rel="shortcut icon" href="../imagens/icone/pizza.ico" type="image/x-icon">
    <title>Cadastro pizzaiolo</title>
</head>
<body>
    <?php
    include("connection.php");
    include("../geral/menu.php");
    include("validacao_acesso_php.php");

    $nome = $_POST["nome"];
    $tp_user = "pizzaiolo";
    $username = $_POST["username"];
    $cpf = $_POST["cpf"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $dt_nasc = $_POST["dt_nasc"];
    $num_telefone = $_POST["num_telefone"];
    $estado = $_POST["estado"];
    $cep = $_POST["cep"];
    $cidade = $_POST["cidade"];
    $rua = $_POST["rua"];


    $sql = "SELECT * FROM user_endereco_user WHERE cpf = '$cpf'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // O Pizzaiolo já existe, exibir uma mensagem de erro em outra pagina
        echo '<h1>Pizzaiolo já existente.</h1>'; //aqui ele mostra a pagina com o texto em H1
        echo '<script>setTimeout(function() { history.back(); }, 2000);</script>'; // Atraso de 2 segundos 
    } else {
        // O insumo não existe, inserir no banco de dados 
        $sql_insert = "INSERT INTO user_endereco_user(nome, tp_user, username, cpf, email, senha, dt_nasc, num_telefone, estado, cep, cidade, rua) VALUES('$nome','$tp_user','$username','$cpf','$email','$senha','$dt_nasc','$num_telefone,'$estado', '$cep','$cidade','$rua')";
        
        if ($conn->query($sql_insert) === TRUE) {
            echo "<h1>Pizzaiolo cadastrado.</h1>";
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
