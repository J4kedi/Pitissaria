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

    // Verificar se o ingrediente já existe no banco de dados
    $sql_check = "SELECT COUNT(*) FROM ingredientes WHERE nome = ?";
    $stmt_check = $conn->prepare($sql_check);
    $stmt_check->bind_param("s", $nome);
    $stmt_check->execute();
    $stmt_check->bind_result($count);
    $stmt_check->fetch();
    $stmt_check->close();

    if ($count > 0) {
        // Redirecionar de volta para a página de cadastro com uma mensagem de erro
        header("Location: cadastro_ingredientes.php?error=O ingrediente já está cadastrado no sistema.");
        exit();
    } else {
        // Preparar e executar a consulta SQL para inserir os dados
        $sql_insert = "INSERT INTO ingredientes (nome, data_validade, data_entrada, quantidade, preco) VALUES (?, ?, ?, ?, ?)";
        $stmt_insert = $conn->prepare($sql_insert);
        $stmt_insert->bind_param("sssdi", $nome, $validade, $data_entrada, $quantidade, $preco_compra);

        if ($stmt_insert->execute()) {
            // Redirecionar para a página de cadastro com uma mensagem de sucesso
            header("Location: cadastro_ingredientes.php?success=Ingrediente cadastrado com sucesso.");
            exit();
        } else {
            // Redirecionar de volta para a página de cadastro com uma mensagem de erro
            header("Location: cadastro_ingredientes.php?error=Erro ao cadastrar o ingrediente: " . $conn->error);
            exit();
        }

        // Fechar a conexão
        $stmt_insert->close();
    }

    $conn->close();
} else {
    // Se o método de requisição não for POST, redirecionar para o formulário de cadastro
    header("Location: cadastro_ingredientes.php");
    exit();
}
?>
