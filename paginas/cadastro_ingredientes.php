<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../imagens/icone/pizza.ico" type="image/x-icon">
    <link rel="stylesheet" href="../Style/form.css">
    <title>Cadastro de Ingredientes</title>
</head>
<body>
    <?php 
        include('geral/menu.php');
        require_once('../php/sessao/verificaUsuario.php');

        verificaSessaoCliente();
    ?>

    <div class="form-container login-container">
        <h1>Cadastro de Ingredientes</h1>
        <form action="../php/cadastro_ingredientes_php.php" method="post" class="form">
            <div class="divisao">
                <div class="campos">
                    <label for="nome_ingrediente">Nome do Ingrediente:</label>
                    <input type="text" id="nome" name="nome" required>
                </div>
                <div class="campos">
                    <label for="dt_validade">Data de Validade:</label>
                    <input type="date" id="data_validade" name="data_validade" required>
                </div>
                <div class="campos">
                    <label for="dt_validade">Data de Entrada:</label>
                    <input type="date" id="data_entrada" name="data_entrada" required>
                </div>
                <div class="campos">
                    <label for="quantidade_ingrediente">Quantidade:</label>
                    <input type="text" id="quantidade" name="quantidade" required oninput="validarNumero(this)" placeholder="Quantidade em KG">
                </div>
                <div class="campos">
                    <label for="preco_compra">Preço da compra:</label>
                    <input type="text" id="preco" name="preco" required oninput="validarNumero(this)">
                </div>
                <button type="submit" id="btn-enviar">Enviar</button>
            </div>
        </form>
    </div>
    
    <?php include("../paginas/geral/footer.php")?>

    <?php
    if (isset($_GET['error'])) {
        $error_message = $_GET['error'];
        echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Erro',
                text: '$error_message',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'cadastro_ingredientes.php';
                }
            });
        </script>";
    }
    
    if (isset($_GET['success'])) {
        $success_message = $_GET['success'];
        echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Sucesso',
                text: '$success_message',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'lista_ingredientes.php';
                }
            });
        </script>";
    }
    ?>
</body>
</html>
