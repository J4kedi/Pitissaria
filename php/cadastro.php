<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Pizzaiolo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../Style/cad_ingredientes.css">
    <link rel="stylesheet" href="../Style/padrao.css">
    <link rel="shortcut icon" href="../imagens/icone/pizza.ico" type="image/x-icon">
</head>
<body>
    <?php
    include("validacao_acesso_php.php");
    include("../geral/menu.php");

    ?>

    <a href="../HTML/index.php">Voltar para pagina principal</a>
    <main>
        <div class="container">
            <h1>Cadastro de pizzaiolo</h1>
            <form action="cadastro_php.php" id="form1" method="POST">

                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" required>
                <br>
                <label for="tp_user">Tipo de Usuario:</label>
                <input type="text" name="tp_user" id="tp_user" required default = "pizzaiolo">
                <br>
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" required>
                <br>
                <label for="cpf">CPF:</label>
                <input type="text" name="cpf" id="cpf" required>
                <br>
                <label for="email">Email:</label>
                <input type="text" name="email" id="email" required>
                <br>
                <label for="senha">Senha:</lablefone:</label>
                <input type="password" name="num_telefone" id="num_telefone" min = 8>
                <br>
                <label for="dt_nasc">Data de Nascimento:</label>
                <input type="date" name="td_nasc" id="dt_nasc" max = "2006-01-01" max ="1940-12-31">
                <br>
                <label for="num_telefone">Telefone:</label>
                <input type="text" name="cep" id="cep">
                <br>
                <label for="estado">Estado:</label>
                <input type="text" name="estado" id="estado">
                <br>
                <label for="cep">CEP:</label>
                <input type="text" name="senha" id="senha">
                <br>
                <label for="cidade">Cidade:</label>
                <input type="text" name="cidade" id="cidade">
                <br>
                <label for="rua">Rua:</label>
                <input type="text" name="rua" id="rua">
                <br>
                <button type="submit" id ="submit">Enviar</button>
            </form>
        </div>
    </main>
</body>
</html>