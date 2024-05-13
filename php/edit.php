<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Pizzaiolo</title>
    <link rel="stylesheet" href="../Style/edit_pizzaiolo.css">
    <link rel="stylesheet" href="../Style/padrao.css">
    <link rel="shortcut icon" href="../imagens/icone/pizza.ico" type="image/x-icon">
</head>
<body>
<?php
    include("connection.php");
    include("validacao_acesso_php.php");
    include("../geral/menu.php");
    verificar_acesso_gerente();
    verificar_acesso_pizzaiolo();
    verificarAcessoGerenteEPizzaiolo();
    
    $sql = "SELECT id, nome, tipo_usuario, username, data_nascimento, cpf, email, senha, celular, estado, cep, cidade, rua FROM usuarios";
    $result = $conn->query($sql);

    if ($result->num_rows>0){
        while($row = $result->fetch_assoc()){

            $id = $row["id"];

            $nome = $row["nome"];

            $tipo_usuario = $row["tipo_usuario"];

            $username = $row["username"];

            $cpf = $row["cpf"];

            $email = $row["email"];

            $senha = $row["senha"];

            $data_nascimento = $row["data_nascimento"];

            $celular = $row["celular"];

            $estado = $row["estado"];

            $cep = $row["cep"];

            $cidade = $row["cidade"];

            $rua = $row["rua"];

        }
    }
?>
    <a href="listagem.php"><h3>Voltar a listagem</h3></a>
    <main class = "container">
        <h2>Editar informações</h2>
        <form action="cadastro_php.php" id="form1" method="POST">

            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" value ="<?php echo $nome?>" required>
            <br>
            <label for="tp_user">Tipo de Usuario:</label>
            <input type="text" name="tipo_usuario" id="tipo_usuario" value ="<?php echo $tipo_usuario?>" default = "pizzaiolo" required>
            <br>
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" value ="<?php echo $username?>" required>
            <br>
            <label for="cpf">CPF:</label>
            <input type="text" name="cpf" id="cpf" value ="<?php echo $cpf?>" required>
            <br>
            <label for="email">Email:</label>
            <input type="text" name="email" id="email" value ="<?php echo $email?>" required>
            <br>
            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senha" value ="<?php echo $senha?>">
            <br>
            <label for="celular">Numero de telefone</label>
            <input type="text" name="celular" id="celular" value ="<?php echo $celular?>" required>
            <br>
            <label for="estado">Estado:</label>
            <input type="text" name="estado" id="estado" value ="<?php echo $estado?>" required>
            <br>
            <label for="cep">CEP:</label>
            <input type="text" name="cep" id="cep" value ="<?php echo $cep?>" required>
            <br>
            <label for="dt_nasc">Data de Nascimento:</label>
            <input type="date" name="data_nascimento" id="data_nascimento" value ="<?php echo $data_nascimento?>" required>
            <br>
            <label for="cidade">Cidade:</label>
            <input type="text" name="cidade" id="cidade" value ="<?php echo $cidade?>" required>
            <br>
            <label for="rua">Rua:</label>
            <input type="text" name="rua" id="rua" value = "<?php echo $rua?>" required>
            <br>

            <input type="hidden" name="id" value="<?php echo $id?>" required>

            <input type="submit" value="Atualizar Ingrediente" id = "submit">
        </form>
        
        
    </main>
    
</body>
</html>
