<?php
// Incluir arquivo de conexão com o banco de dados
include("connection.php");


// Verificar se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar os dados do formulário
    $nome = $_POST["nome"];
    $validade = $_POST["data_validade"];
    $data_entrada = $_POST["data_entrada"];
    $quantidade = $_POST["quantidade"];
    $preco_compra = $_POST["preco"];

    // Preparar e executar a consulta SQL para inserir os dados
    $sql = "INSERT INTO ingredientes (nome, data_validade, data_entrada, quantidade, preco) VALUES ('$nome', '$validade','$data_entrada', '$quantidade','$preco_compra')";
    $stmt = $conn->prepare($sql);

    if ($stmt->execute()) {
        // Redirecionar para a página de sucesso após o cadastro
        header("Location: lista_ingredientes.php");
        exit();
    } else {
        // Exibir mensagem de erro caso a inserção falhe
        echo "Erro ao cadastrar o ingrediente: " . $conn->error;
    }

    // Fechar a conexão
    $stmt->close();
    $conn->close();
} else {
    // Se o método de requisição não for POST, redirecionar para o formulário de cadastro
    header("Location: cadastro_ingredientes.php");
    exit();
}
?>
