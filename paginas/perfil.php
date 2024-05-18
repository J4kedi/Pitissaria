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
                <!-- Nome -->
                <label for="nome">Nome:</label>
                <input type="text" name="nome" required value="<?php echo "$nome"?>">
                <!-- Username -->
                <label for="username">Username:</label>
                <input class="desativado" type="text" name="username" disabled value="<?php echo "$username"?>">
                <!-- Email -->
                <label for="email">Email:</label>
                <input class="desativado" type="email" name="email" disabled value="<?php echo "$email"?>">
                <!-- CPF -->
                <label for="cpf">CPF:</label>
                <input class="desativado" type="text" name="cpf" disabled value="<?php echo "$cpf"?>">
                <!-- Celular -->
                <label for="celular">Celular:</label>
                <input type="text" name="celular" required value="<?php echo "$celular"?>">
                <!-- Data de Nascimento -->
                <label for="data-nascimento">Data de Nascimento:</label>
                <input type="date" name="data-nascimento" required value="<?php echo "$dataNascimento"?>">
            </div>

            <div class="divisao">
                <!-- CEP -->
                <label for="cep">CEP:</label>
                <input type="text" name="cep" required value="<?php echo "$cep"?>">
                <!-- Estado -->
                <label for="estado">Estado:</label>
                <input class="desativado" type="text" name="estado" required disabled value="<?php echo "$estado"?>">
                <!-- Cidade -->
                <label for="cidade">Cidade:</label>
                <input class="desativado" type="text" name="cidade" required disabled value="<?php echo "$cidade"?>">
                <!-- Rua -->
                <label for="rua">Rua:</label>
                <input type="text" name="rua" required value="<?php echo "$rua"?>">
                <!-- Número Residência -->
                <label for="num-res">Número Casa:</label>
                <input type="number" name="num-res" required value="<?php echo "$numRes"?>">

                <label for="endereco">Selecione seu endereco:</label>
                <select id="endereco" name="endereco">
                    <?php exibirEnderecos($enderecos);?>
                </select>
            </div>
            <!-- Botão Enviar -->
            <button type="submit" id="btn-enviar">Salvar</button>
        </form>
    </div>
    
    <?php include('geral/footer.php');?>

    <script src="../Js/paginas/perfil.js"></script>
</body>
</html>