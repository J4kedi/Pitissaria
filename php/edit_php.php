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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<?php
    include("connection.php");
    include("../paginas/geral/menu.php");
    require_once("sessao/verificaUsuario.php");
    verificaSessaoPizzaiolo();
    verificaSessaoCliente();

    
    
    $id = $_POST["id"];

    $nome = $_POST["nome"];

    $username = $_POST["username"];

    $cpf = $_POST["cpf"];

    $email = $_POST["email"];

    $senha = $_POST["senha"];

    $data_nascimento = $_POST["data_nascimento"];

    $celular = $_POST["celular"];

    $estado = $_POST["estado"];

    $cep = $_POST["cep"];

    $cidade = $_POST["cidade"];

    $num_res = $_POST["num_res"];

    $rua = $_POST["rua"];

    $sqlUsuario = "UPDATE usuarios u SET u.nome = '$nome', u.email = '$email', u.cpf = '$cpf', u.data_nascimento = '$data_nascimento',
            u.celular = '$celular', u.username = '$username' WHERE u.id = $id";

    $resultUsuario = $conn -> query($sqlUsuario);

    $sqlEnderecos = " UPDATE enderecos e JOIN usuario_endereco ue ON e.id = ue.endereco_id
    SET e.cep = '$cep', e.rua = '$rua', e.num_res = '$num_res', e.cidade = '$cidade', e.estado = '$estado' WHERE ue.usuario_id = $id";

    
    $resultEndereco = $conn -> query($sqlEnderecos);


    if ($resultUsuario === True || $resultEndereco === True) {
        ?>

        <script>
            swal.fire({
                title: 'Dados atualizados com sucesso.',
                icon:'success',
                text: 'Redirecionando para a listagem de pizzaiolos.',
                timer: 3000,
            }).then(function() {
                window.location.href = "../php/listagem.php";
            });
        </script>
        <?php
    }   
    else{
        <script>
        swal.fire({
            title: 'Erro ao editar dados.',
            icon:'error',
            text: 'Por favor, tente novamente.',
            timer: 3000,
        }).then(function() {
                window.location.href = "../php/edit.php";
            });
    </script>
    }
?>

</body>
</html>

