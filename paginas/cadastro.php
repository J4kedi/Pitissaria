<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Style/form.css">
    <title>cadastro</title>
</head>

<body>
    <?php include('geral/menu.php'); ?>

    <div class="form-container">
        <h1>Cadastre-se</h1>
        <form action="../PHP/forms/cadastro.php" method="post" id="form" class="form">
            <div class="divisao">
                <div class="campos">
                    <!-- Nome -->
                    <label for="nome">Nome:</label>
                    <input type="text" name="nome" required>
                    <span class="erro">Olá, está inválido o seu nome senhor </span>
                </div>
                <div class="campos">
                    <!-- Username -->
                    <label for="username">Username:</label>
                    <input type="text" name="username" required>
                </div>
                <div class="campos">
                    <!-- Email -->
                    <label for="email">Email:</label>
                    <input type="email" name="email" required>
                </div>
                <div class="campos">
                    <!-- Senha -->
                    <label for="senha">Senha:</label>
                    <input type="password" name="senha" required>
                </div>
                <div class="campos">
                    <!-- Confirmar Senha -->
                    <label for="confirmar-senha">Confirmar Senha:</label>
                    <input type="password" name="confirmar-senha" required>
                </div>
                <div class="campos">
                    <!-- CPF -->
                    <label for="cpf">CPF:</label>
                    <input type="text" name="cpf" required>
                </div>
            </div>
            
            <div class="divisao">
                <!-- Data de Nascimento -->
                <label for="data-nascimento">Data de Nascimento:</label>
                <input type="date" name="data-nascimento" required>
                <!-- Telefone -->
                <label for="celular">Celular:</label>
                <input type="text" name="celular" required>
                <!-- CEP -->
                <label for="cep">CEP:</label>
                <input type="text" name="cep" required>
                <!-- Cidade -->
                <label for="cidade">Cidade:</label>
                <input class="desativado" type="text" name="cidade" required disabled>
                <!-- Rua -->
                <label for="rua">Rua:</label>
                <input type="text" name="rua" required>
                <!-- Número Residência -->
                <label for="num-res">Número Casa:</label>
                <input type="number" name="num-res" required>
            </div>
            <!-- Botão Enviar -->
            <button type="submit" id="btn-enviar">Cadastrar</button>
        </form>
    </div>

    <script src="../Js/novaValidacao/cadastro.js"></script>
    <script src="../Js/novaValidacao/escuta.js"></script>
    <?php include('geral/footer.php'); ?>
</body>
</html>