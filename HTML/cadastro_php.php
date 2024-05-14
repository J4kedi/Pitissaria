<?php
    include("../php/connection.php");

    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = md5($_POST["senha"]);
    $cpf = $_POST["cpf"];
    $dt_nasc = $_POST["dt_nasc"];
    $num_telefone = $_POST["telefone"];
    $username = $_POST["username"];

    $cep = $_POST["cep"];
    $rua = $_POST["rua"];
    $num_res = $_POST["num_res"];
    $cidade = $_POST["cidade"];
    $estado = $_POST["estado"];

    $sql = "SELECT * FROM usuarios WHERE cpf = '$cpf'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // O usuario já existe, exibir uma mensagem de erro em outra pagina
        echo '<h1>usuario já cadastrado. Por favor cadastre outro .</h1>'; //aqui ele mostra a pagina com o texto em H1
        echo '<script>setTimeout(function() { history.back(); }, 2000);</script>'; // Atraso de 10 ms 
    } else {
        // O usuario não existe, inserir no banco de dados 
        $sqlUsuario = "INSERT INTO usuarios(nome, email, senha, cpf, data_nascimento, celular, username) VALUES('$nome', '$email', '$senha', '$cpf', '$dt_nasc', '$num_telefone', '$username')";
        $resultUsuario = $conn->query($sqlUsuario);
        $usuarioId = $conn->insert_id;        
        
        
        $sqlEndereco = "INSERT INTO enderecos(cep, rua, num_res, cidade, estado) VALUES('$cep', '$rua', '$num_res', '$cidade', '$estado')";
        $resultEndereco = $conn->query($sqlEndereco);
        $enderecoId = $conn->insert_id;
        
        $sqlUsuarioEndereco = "INSERT INTO usuario_endereco(usuario_id, endereco_id) VALUES($usuarioId, $enderecoId)";
        $resultUsuarioEndereco = $conn->query($sqlUsuarioEndereco);

        if ($resultUsuario === TRUE and $resultEndereco === TRUE and $resultUsuarioEndereco === True) {
            echo "<h1>Usuario cadastrado com sucesso.</h1>";
            echo '<script>setTimeout(function() { window.location.href = "index.php"; }, 2000);</script>'; // Redireciona para index.php após 10 ms 
        } else {
            echo "Erro ao cadastrar o usuario: " . $conn->error;
        }
    }

    // Feche a conexão após o uso, se necessário
    $conn->close();
?>