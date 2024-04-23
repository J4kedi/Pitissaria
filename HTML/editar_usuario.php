<?php
    include '../php/connection.php';

    session_start();

    // Receber os dados do formulário
    if(isset($_SESSION['id_user'])) {
        $id_user = $_SESSION['id_user'];
    }

    $nome = $_POST["nome"];
    $senha = md5($_POST["senha"]);
    $username = $_POST["username"];
    $cpf = $_POST["cpf"];
    $email = $_POST["email"];
    $dt_nasc = $_POST["dt_nasc"];
    $rua = $_POST["rua"];
    $cep = $_POST["cep"];
    $num_telefone = $_POST["num_telefone"];
    $estado = $_POST["estado"];
    $cidade = $_POST["cidade"];

    // Montar a query SQL para atualizar os dados do usuário
    $sql = "UPDATE user_endereco_user SET 
            nome = '$nome', 
            senha = '$senha', 
            username = '$username', 
            cpf = '$cpf', 
            email = '$email', 
            dt_nasc = '$dt_nasc', 
            rua = '$rua', 
            cep = '$cep', 
            num_telefone = '$num_telefone', 
            estado = '$estado', 
            cidade = '$cidade'
            WHERE id_user = '$id_user';";

    $result = $conn->query($sql);

    // Executar a query SQL
    if ($result) {
        // Redirecionar o usuário de volta para a página de edição com uma mensagem de sucesso
        echo '<h1>Dados alterados com sucesso.</h1>';
        echo '<script>setTimeout(function() { window.location.href = "user.php"; }, 1000);</script>'; // Redireciona para lista_ingredientes.php após 2 segundos 
    } else {
        // Se ocorrer algum erro, exibir uma mensagem de erro
        echo 'Erro ao atualizar o usuario: '. $conn->error;
    }


    // Fechar a conexão com o banco de dados
    $conn->close();
?>    