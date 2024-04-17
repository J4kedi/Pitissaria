<?php
include '../php/connection.php';


    // Receber os dados do formulário
    $id = $_POST["id_user"];
    $nome = $_POST["nome"];
    $senha = $_POST["senha"];
    $username = $_POST["username"];
    $cpf = $_POST["cpf"];
    $email = $_POST["email"];
    $dt_nasc = $_POST["dt_nasc"];
    $rua = $_POST["rua"];
    $cep = $_POST["cep"];
    $num_telefone = $_POST["num_telefone"];
    $estado = $_POST["estado"];
    $cidade = $_POST["cidade"];
    $rua = $_POST["rua"];

    // Montar a query SQL para atualizar os dados do usuário
    $sql = "UPDATE usuarios SET 
            nome = '$nome', 
            senha = '$senha', 
            username = '$username', 
            cpf = '$cpf', 
            email = '$email', 
            dt_nasc = '$dt_nasc', 
            nome_rua = '$nome_rua', 
            cep = '$cep', 
            num_res = '$num_res', 
            num_telefone = '$num_telefone', 
            estado = '$estado', 
            cidade = '$cidade' 
            WHERE id = $id";

    // Executar a query SQL
    if ($conn->query($sql) === TRUE) {
        // Redirecionar o usuário de volta para a página de edição com uma mensagem de sucesso
        echo "<h1>Dados alterados com sucesso.</h1>";
        echo '<script>setTimeout(function() { window.location.href = "index.php"; }, 2000);</script>'; // Redireciona para lista_ingredientes.php após 2 segundos 
    } else {
        // Se ocorrer algum erro, exibir uma mensagem de erro
        echo "Erro ao cadastrar ingrediente: " . $conn->error;
    }


// Fechar a conexão com o banco de dados
$conn->close();
?>
