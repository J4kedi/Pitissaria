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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <?php
        include("connection.php");
        include("../paginas/geral/menu.php");
        require_once("sessao/verificaUsuario.php");
        verificaSessaoPizzaiolo();
        verificaSessaoCliente();

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
        ?>
        <script>
            swal.fire({
                title: 'Pizzaiolo já existente.',
                icon:'error',
                text: 'Por favor, tente novamente.',
                timer: 3000,
            }).then(function() {
                    window.location.href = "../php/cadastro.php";
                });
        </script>
    <?php
         
        } else {
            // O pizzaiolo não existe, inserir no banco de dados 
            $sql_usuario = "INSERT INTO usuarios(nome, email, senha, cpf, tipo_usuario, data_nascimento, celular, username) VALUES('$nome', '$email','$senha','$cpf', '$tipo_usuario', '$data_nascimento', '$celular', '$username')";
            $result_usuario = $conn -> query($sql_usuario);
            $usuarioID = $conn -> insert_id;

            $sql_endereco = "INSERT INTO enderecos(cep, rua, num_res, cidade, estado) VALUES ('$cep', '$rua', '$num_res', '$cidade', '$estado')";
            $result_endereco = $conn -> query($sql_endereco);
            $enderecoID = $conn -> insert_id;

            $sql_Usuario_Endereco = "INSERT INTO usuario_endereco(usuario_id, endereco_id) VALUES ($usuarioID, $enderecoID)";
            $resultUsuarioEndereco = $conn -> query($sql_Usuario_Endereco);
            ?>

            <script>
                swal.fire({
                    title: 'Pizzaiolo cadastrado com sucesso.',
                    icon:'success',
                    text: 'Redirecionando para a listagem de pizzaiolos.',
                    timer: 3000,
                }).then(function() {
                    window.location.href = "../php/listagem.php";
                });
            </script>
            <?php

        }

        // Feche a conexão após o uso, se necessário
        $conn->close();
    ?>


</body>
</html>

