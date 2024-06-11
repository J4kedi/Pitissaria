<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../imagens/icone/pizza.ico" type="image/x-icon">
    <link rel="stylesheet" href="../Style/form.css">
    <title>Cadastro de Pizzaiolo</title>
</head>
<body>
    <?php
        include("../paginas/geral/menu.php");
        require_once("sessao/verificaUsuario.php");
        verificaSessaoPizzaiolo();
        verificaSessaoCliente();
    ?>

    <div class="form-container">
        <h1>Cadastro de Pizzaiolo</h1>
        <form action="cadastro_php.php" id="form1" class="form" method="POST">
            <div class="divisao">
                <div class="campos">
                    <label for="nome">Nome:</label>
                    <input type="text" name="nome" id="nome" required>
                </div>
                <div class="campos">  
                    <label for="tipo_usuario">Tipo de Usuario:</label>
                    <input type="text" name="tipo_usuario" id="tipo_usuario" value = "pizzaiolo" required>
                </div>
                <div class="campos">
                    <label for="username">Username:</label>
                    <input type="text" name="username" id="username" required>
                </div>
                <div class="campos">
                    <label for="cpf">CPF:</label>
                    <input type="text" name="cpf" id="cpf" required>
                </div>
                <div class="campos">
                    <label for="email">Email:</label>
                    <input type="text" name="email" id="email" required>
                </div>
                <div class="campos">
                    <label for="senha">Senha:</label>
                    <input type="password" name="senha" id="senha" min = 8>
                </div>
                <div class="campos">
                    <label for="dt_nasc">Data de Nascimento:</label>
                    <input type="date" name="data_nascimento" id="data_nascimento" max = "2006-01-01" min ="1940-12-31">
                </div>
            </div>
            <div class="divisao">
                <div class="campos">
                    <label for="celular">Telefone:</label>
                    <input type="text" name="celular" id="celular">
                </div>
                <div class="campos">
                    <label for="cep">CEP:</label>
                    <input type="text" name="cep" id="cep">
                </div>
                <div class="campos">
                    <label for="rua">Rua:</label>
                    <input type="text" name="rua" id="rua">
                </div>
                <div class="campos">
                    <label for="num_res">Numero da Residencia:</label>
                    <input type="text" name="num_res" id="num_res" required>
                </div>
                <div class="campos">
                    <label for="cidade">Cidade:</label>
                    <input type="text" name="cidade" id="cidade">
                </div>
                <div class="campos">
                    <label for="estado">Estado:</label>
                    <input type="text" name="estado" id="estado">
                </div>
            </div>
            <button type="submit" id="btn-enviar">Cadastrar</button>
        </form>
    </div>

    <script src="../Js/paginas/camposEndereco.js"></script>
    <script src="../Js/novaValidacao/viaCep.js"></script>
    <script src="../Js/novaValidacao/cpf.js"></script>
    <script src="../Js/novaValidacao/erro.js"></script>
    <script src="../Js/novaValidacao/cadastro.js"></script>
    <script src="../Js/novaValidacao/escuta.js"></script>
</body>
</html>