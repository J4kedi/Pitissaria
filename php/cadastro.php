<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Pizzaiolo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../Style/editar_pizzaiolo.css">
    <link rel="stylesheet" href="../Style/padrao.css">
    <link rel="shortcut icon" href="../imagens/icone/pizza.ico" type="image/x-icon">
</head>
<body>
    <?php
        include("../paginas/geral/menu.php");
        require_once("sessao/verificaUsuario.php");
        verificaSessaoPizzaiolo();
        verificaSessaoCliente();
    ?>

    <a href="../php/listagem.php" class="btn btn-primary">Voltar</a>
    <main>
        <div class="container">
            <h1>Cadastro de pizzaiolo</h1>
            <form action="cadastro_php.php" id="form1" method="POST">

                <div class="coluna1">
                    <div class="campo">
                        <label for="nome">Nome:</label>
                        <input type="text" name="nome" id="nome" required>
                        <br>
                    </div>
                    <div class="campo">
                        <label for="tipo_usuario">Tipo de Usuario:</label>
                        <input type="text" name="tipo_usuario" id="tipo_usuario" value = "pizzaiolo" required>
                        <br>
                    </div>
                    <div class="campo">
                        <label for="username">Username:</label>
                        <input type="text" name="username" id="username" required>
                        <br>
                    </div>
                    <div class="campo">
                        <label for="cpf">CPF:</label>
                        <input type="text" name="cpf" id="cpf" required>
                        <br>
                    </div>
                    <div class="campo">
                        <label for="email">Email:</label>
                        <input type="text" name="email" id="email" required>
                        <br>
                    </div>
                    <div class="campo">
                        <label for="senha">Senha:</lablefone:</label>
                        <input type="password" name="senha" id="senha" min = 8>
                        <br>
                    </div>
                    <div class="campo">
                        <label for="dt_nasc">Data de Nascimento:</label>
                        <input type="date" name="data_nascimento" id="data_nascimento" max = "2006-01-01" min ="1940-12-31">
                        <br>
                    </div>
            
                </div>

                <div class="coluna2">

                    <div class="campo">
                        <label for="celular">Telefone:</label>
                        <input type="text" name="celular" id="celular">
                        <br>
                    </div>
                    <div class="campo">
                        <label for="cep">CEP:</label>
                        <input type="text" name="cep" id="cep">
                        <br>
                    </div>
                    <div class="campo">
                        <label for="rua">Rua:</label>
                        <input type="text" name="rua" id="rua">
                        <br>
                    </div>
                    <div class="campo">
                        <label for="num_res">Numero da Residencia:</label>
                        <input type="text" name="num_res" id="num_res" required>
                        <br>
                    </div>
                    <div class="campo">
                        <label for="cidade">Cidade:</label>
                        <input type="text" name="cidade" id="cidade">
                        <br>
                    </div>
                    <div class="campo">
                        <label for="estado">Estado:</label>
                        <input type="text" name="estado" id="estado">
                        <br>
                    </div>
                    <button type="submit" id ="submit" class="btn btn-primary">Cadastrar</button>
                </div>
            </form>
        </div>
    </main>

    <Script>
        
    </Script>




    <script src="../Js/paginas/camposEndereco.js"></script>
    <script src="../Js/novaValidacao/viaCep.js"></script>
    <script src="../Js/novaValidacao/cpf.js"></script>
    <script src="../Js/novaValidacao/erro.js"></script>
    <script src="../Js/novaValidacao/cadastro.js"></script>
    <script src="../Js/novaValidacao/escuta.js"></script>

</body>
</html>
