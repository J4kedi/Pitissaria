<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Style/form.css">
    <link rel="shortcut icon" href="../imagens/icone/pizza.ico" type="image/x-icon">
    <title>perfil</title>
</head>
<body>
    <?php include('geral/menu.php');?>
    
    <?php 
        require_once("../php/sessao/verificaUsuario.php");
        verificaSessao();
        include("../php/consultas/consultaDadosPerfil.php");
    ?>

    <div class="form-container">
        <?php 
            echo "<h2>Olá, ". $_SESSION['primeiro_nome'] ."!</h2>";
        ?>

        <form action="../PHP/forms/perfil.php" class="form" id="form" method="POST">
            <div class="divisao">
                <div class="campos">
                    <!-- Nome -->
                    <label for="nome">Nome:</label>
                    <input type="text" name="nome" required value="<?php echo "$nome"?>">
                </div>
                <div class="campos">
                    <!-- Username -->
                    <label for="username">Username:</label>
                    <input class="desativado" type="text" name="username" disabled value="<?php echo "$username"?>">
                </div>
                <div class="campos">
                    <!-- Email -->
                    <label for="email">Email:</label>
                    <input class="desativado" type="email" name="email" disabled value="<?php echo "$email"?>">
                </div>
                <div class="campos">
                    <!-- CPF -->
                    <label for="cpf">CPF:</label>
                    <input class="desativado" type="text" name="cpf" disabled value="<?php echo "$cpf"?>">
                </div>
                <div class="campos">
                    <!-- Celular -->
                    <label for="celular">Celular:</label>
                    <input type="text" name="celular" required value="<?php echo "$celular"?>">
                </div>
                <div class="campos">
                    <!-- Data de Nascimento -->
                    <label for="data-nascimento">Data de Nascimento:</label>
                    <input type="date" name="data-nascimento" required value="<?php echo "$dataNascimento"?>">
                </div>
            </div>

            <div class="divisao">
                <div class="campos">
                    <!-- CEP -->
                    <label for="cep">CEP:</label>
                    <input class="desativado" type="text" name="cep" required disabled value="<?php echo "$cep"?>">
                </div>
                <div class="campos">
                    <!-- Estado -->
                    <label for="estado">Estado:</label>
                    <input class="desativado" type="text" name="estado" required disabled value="<?php echo "$estado"?>">
                </div>
                <div class="campos">
                    <!-- Cidade -->
                    <label for="cidade">Cidade:</label>
                    <input class="desativado" type="text" name="cidade" required disabled value="<?php echo "$cidade"?>">
                </div>
                <div class="campos">
                    <!-- Rua -->
                    <label for="rua">Rua:</label>
                    <input class="desativado" type="text" name="rua" required disabled value="<?php echo "$rua"?>">
                </div>
                <div class="campos">
                    <!-- Número Residência -->
                    <label for="num-res">Número Casa:</label>
                    <input class="desativado" type="number" name="num-res" required disabled value="<?php echo "$numRes"?>">
                </div>
                <div class="campos">
                    <!-- Endereços -->
                    <label for="endereco">Selecione seu endereco:</label>
                    <select id="endereco" name="endereco">
                        <?php exibirEnderecos($enderecos);?>
                    </select>
                </div>
            </div>
            <!-- Botão Enviar -->
            <button type="submit" id="btn-enviar">Salvar</button>
        </form>
    </div>
    
    <?php include('geral/footer.php');?>

    <script src="../Js/novaValidacao/viaCep.js"></script>
    <script src="../Js/novaValidacao/cpf.js"></script>
    <script src="../Js/novaValidacao/erro.js"></script>
    <script src="../Js/novaValidacao/cadastro.js"></script>
    <script src="../Js/novaValidacao/escuta.js"></script>
    <script src="../Js/paginas/perfil.js"></script>
</body>
</html>