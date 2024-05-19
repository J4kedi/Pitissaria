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
        include("../geral/menu.php");
        include("connection.php");
        include("validacao_gerente.php");
        verificarGerente();

        $nome = $_POST["nome"];
        $tipo_usuario = "pizzaiolo";
        $username = $_POST["username"];
        $cpf = $_POST["cpf"];
        $email = $_POST["email"];
        $senha = $_POST["senha"];
        $data_nascimento = $_POST["data_nascimento"];
        $celular = $_POST["celular"];   
        $cep = $_POST["cep"];
        $rua = $_POST["rua"];
        $num_res = $_POST["num_res"];
        $cidade = $_POST["cidade"];
        $estado = $_POST["estado"];

        $sql_select = "SELECT * FROM usuarios WHERE cpf = '$cpf'";
        $result = $conn->query($sql_select);

        if ($result->num_rows > 0) {
            // O Pizzaiolo já existe, exibir uma mensagem de erro em outra pagina
            echo '<h1>Pizzaiolo já existente.</h1>'; //aqui ele mostra a pagina com o texto em H1
            echo '<script>setTimeout(function() { history.back(); }, 2000);</script>'; // Atraso de 2 segundos 
        } else {
            // O pizzaiolo não existe, inserir no banco de dados 
            $sql_usuario = "INSERT INTO usuarios(nome, tipo_usuario, username, cpf, email, senha, data_nascimento, celular) VALUES('$nome', '$tipo_usuario', '$username','$cpf', '$email', '$senha','$data_nascimento','$celular)";
            $result_usuario = $conn -> query($sql_usuario);
            $usuarioID = $conn -> insert_id;

            $sql_endereco = "INSERT INTO enderecos(cep, rua, num_res, cidade, estado) VALUES ('$cep', '$rua', '$num_res', '$cidade', '$estado')";
            $result_endereco = $conn -> query($sql_endereco);
            $enderecoID = $conn -> insert_id;

            $sql_Usuario_Endereco = "INSERT INTO usuarui_endereco(usuario_id, endereco_id) VALUES ($usuarioID, $enderecoID)";
            $resultUsuarioEndereco = $conn -> query($sql_Usuario_Endereco);

            
            if ($result_usuario === True and $result_endereco === True and $resultUsuarioEndereco === True) {
                echo "<h1>Pizzaiolo cadastrado com sucesso.</h1>";
                echo '<script>setTimeout(function() { window.location.href = "listagem.php"; }, 5000);</script>'; // Redireciona para listagem após 5 segundos 
            } else {
                echo "Erro ao cadastrar o ingrediente: " . $conn->error;
            }
        }

        // Feche a conexão após o uso, se necessário
        $conn->close();
    ?>


</body>
</html>

