<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Ingredientes</title>
    <link rel="stylesheet" href="../../Style/cad_ingredientes.css">
    <link rel="shortcut icon" href="../../imagens/icone/pizza.ico" type="image/x-icon">
</head>
<body>
    <?php
    include("validacao_acesso_php.php");
    validar_acesso();
    ?>

    <a href="../../HTML/index.php">Voltar para pagina principal</a>
    <main>
        <div class="container">
            <h1>Cadastro de Ingredientes</h1>
            <form action="cadastro_php.php" id="form1" method="POST">

            
                <label for="tp_user">Tipo de Usuario:</label>
                <input type="text" name="tp_user" id="tp_user" default = "pizzaiolo">
        

                <button type="submit" id="submit">Enviar</button>
            </form>
        </div>
    </main>
</body>
</html>
