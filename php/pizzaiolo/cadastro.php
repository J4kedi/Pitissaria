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
         if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['tipo'] === 'gerente') {
            // Redirecionar para uma página de erro ou página de login
            header("Location: ../../HTML/index.php"); // Altere para a página que deseja redirecionar
            exit(); // Encerrar o script
        }
       
    ?>

    <a href="../../HTML/index.php">Voltar para pagina principal</a>
    <main>
        <div class="container">
            <h1>Cadastro de Ingredientes</h1>
            <form action="cadastro_php.php" id="form1" method="POST">

                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" required>
                <br>
                <label for="tp_user">Tipo de Usuario:</label>
                <input type="text" name="tp_user" id="tp_user" default = "pizzaiolo" required>
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
                <input type="text" name="num_telefone" id="num_telefone">
                <br>
                <label for="estado">Estado:</label>
                <input type="text" name="estado" id="estado">
                <br>
                <label for="cep">CEP:</label>
                <input type="password" name="senha" id="senha">
                <br>
                <label for="dt_nasc">Data de Nascimento:</label>
                <input type="date" name="td_nasc" id="dt_nasc">
                <br>
                <label for="num_telefone">Telefone:</label>
                <input type="text" name="cep" id="cep">
                <br>
                <label for="cidade">Cidade:</label>
                <input type="text" name="cidade" id="cidade">
                <br>
                <label for="rua">Rua:</label>
                <input type="text" name="rua" id="rua">
                <br>
                <button type="submit" id="submit">Enviar</button>
            </form>
        </div>
    </main>
</body>
</html>
