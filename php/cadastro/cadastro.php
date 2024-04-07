<?php
    include("connection.php");

    // Função para limpar e validar dados do formulário
    function validarDados($conn, $input) {
        $input = trim($input); // Remove espaços em branco no início e no final
        $input = stripslashes($input); // Remove barras invertidas
        $input = htmlspecialchars($input); // Converte caracteres especiais em entidades HTML
        $input = mysqli_real_escape_string($conn, $input); // Escapa caracteres especiais para prevenir SQL injection
        return $input;
    }

    // Validar e limpar os dados do formulário
    $nome = validarDados($conn, $_POST["nome"]);
    $senha = validarDados($conn, $_POST["senha"]);
    $cpf = validarDados($conn, $_POST["cpf"]);
    $email = validarDados($conn, $_POST["email"]);
    $dt_nasc = validarDados($conn, $_POST["dt_nasc"]);
    $nome_rua = validarDados($conn, $_POST["nome_rua"]);
    $cep = validarDados($conn, $_POST["cep"]);
    $num_res = validarDados($conn, $_POST["nome_res"]);
    $num_telefone = validarDados($conn, $_POST["num_telefone"]);

    // Consulta preparada para evitar SQL injection
    $stmt = $conn->prepare("SELECT * FROM usuario WHERE nome = ?");
    $stmt->bind_param("s", $nome);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // O usuário já existe, exibir uma mensagem de erro
        echo "Usuário já cadastrado!";
    } else {
        // O usuário não existe, inserir no banco de dados de forma segura
        $stmt_insert = $conn->prepare("INSERT INTO usuario(nome, senha, cpf, email, dt_nasc, nome_rua, cep, num_res, num_telefone) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt_insert->bind_param("sssssssss", $nome, $senha, $cpf, $email, $dt_nasc, $nome_rua, $cep, $num_res, $num_telefone);

        if ($stmt_insert->execute()) {
            // Usuário cadastrado com sucesso
            echo "Usuário cadastrado com sucesso!";
        } else {
            // Erro ao cadastrar usuário
            echo "Erro ao cadastrar usuário: " . $stmt_insert->error;
        }
    }

    // Fechar as consultas preparadas e a conexão
    $stmt->close();
    $stmt_insert->close();
    $conn->close();
?>
