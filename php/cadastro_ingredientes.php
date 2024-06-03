<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Ingredientes</title>
    <link rel="stylesheet" href="../Style/cad_ingredientes.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../Style/padrao.css">
    <link rel="shortcut icon" href="../imagens/icone/pizza.ico" type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <?php include("../geral/menu.php");?>
    <?php include("../paginas/geral/menu.php");?>

    <main>
        <div class="containera">
            <h1>Cadastro de Ingredientes</h1>
            <form action="cadastro_ingredientes_php.php" id="form1" method="POST">
                <label for="nome_ingrediente">Nome do Ingrediente:</label><br>
                <input type="text" id="nome" name="nome" required><br><br>

                <label for="dt_validade">Data de Validade:</label><br>
                <input type="date" id="data_validade" name="data_validade" required><br><br>

                <label for="dt_validade">Data de Entrada:</label><br>
                <input type="date" id="data_entrada" name="data_entrada" required><br><br>

                <label for="quantidade_ingrediente">Quantidade:</label><br>
                <input type="text" id="quantidade" name="quantidade" required oninput="validarNumero(this)" placeholder="Quantidade em KG"><br><br>

                <label for="preco_compra">Preço da compra:</label><br>
                <input type="text" id="preco" name="preco" required oninput="validarNumero(this)"><br><br>

                <button type="submit" id="submit">Enviar</button>
            </form>
        </div>
    </main>

    <?php include("../geral/footer.php")?>

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
