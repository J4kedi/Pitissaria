<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Ingredientes</title>
    <link rel="stylesheet" href="../Style/cad_ingredientes.css">
    <link rel="shortcut icon" href="../imagens/icone/pizza.ico" type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<?php
    include("connection.php");

    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $validade = $_POST["data_validade"];
    $data_entrada = $_POST["data_entrada"];
    $quantidade = $_POST["quantidade"];
    $preco = $_POST["preco"];

    $sql = "UPDATE ingredientes SET nome = '$nome', data_entrada = '$data_entrada', data_validade = '$validade', quantidade = '$quantidade', preco = '$preco' WHERE id = $id";
    $result =  $conn->query($sql);

    if ($result === TRUE) {
        $success_message = "Dados alterados com sucesso.";
        echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Sucesso',
                text: '$success_message',
                timer: 3000,
                showConfirmButton: false
            }).then(() => {
                window.location.href = 'lista_ingredientes.php';
            });
        </script>";
    }   
    else{
        $error_message = "Erro ao cadastrar ingrediente: " . $conn->error;
        echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Erro',
                text: '$error_message',
                timer: 3000,
                showConfirmButton: false
            }).then(() => {
                window.location.href = 'cadastro_ingredientes.php';
            });
        </script>";
    }
?>

</body>
</html>
