<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Ingredientes</title>
    <link rel="stylesheet" href="../Style/edit_pizzaiolo.css">
    <link rel="shortcut icon" href="../imagens/icone/pizza.ico" type="image/x-icon">
</head>
<body>
<?php
    include("../php/connection.php");

    // Supondo que você tenha uma sessão iniciada e armazenando o ID do usuário nela
    // Vou presumir que você está usando a superglobal $_SESSION para armazenar o ID do usuário logado
    session_start();

    // Verificando se o usuário está logado antes de acessar seus dados
    if(isset($_SESSION['id_user'])) {
        $id_user = $_SESSION['id_user'];

        $sql = "SELECT id_user, nome, tp_user, username, dt_nasc, cpf, email, senha, dt_nasc, num_telefone, estado, cep, cidade, rua FROM user_endereco_user WHERE id_user = $id_user";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $nome = $row["nome"];
                $tp_user = $row["tp_user"];
                $username = $row["username"];
                $cpf = $row["cpf"];
                $email = $row["email"];
                $senha = $row["senha"];
                $dt_nasc = $row["dt_nasc"];
                $num_telefone = $row["num_telefone"];
                $estado = $row["estado"];
                $cep = $row["cep"];
                $cidade = $row["cidade"];
                $rua = $row["rua"];
            }
        } else {
            echo "Nenhum usuário encontrado.";
        }
    } else {
        echo "Usuário não logado.";
    }
?>

    <a href="user.php"><h3>Voltar a listagem</h3></a>
    <main class = "container">
        <h2>Editar informações</h2>
        <form action="cadastro_php.php" id="form1" method="POST">

            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" value ="<?php echo $nome?>" required>
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
            <label for="num_telefone">Numero de telefone</label>
            <input type="text" name="num_telefone" id="num_telefone" value ="<?php echo $num_telefone?>" required>
            <br>
            <label for="estado">Estado:</label>
            <input type="text" name="estado" id="estado" value ="<?php echo $estado?>" required>
            <br>
            <label for="cep">CEP:</label>
            <input type="text" name="cep" id="cep" value ="<?php echo $cep?>" required>
            <br>
            <label for="dt_nasc">Data de Nascimento:</label>
            <input type="date" name="td_nasc" id="dt_nasc" value ="<?php echo $dt_nasc?>" required>
            <br>
            <label for="num_telefone">Telefone:</label>
            <input type="text" name="num_telefone" id="num_telefone" value ="<?php echo $num_telefone?>" required>
            <br>
            <label for="cidade">Cidade:</label>
            <input type="text" name="cidade" id="cidade" value ="<?php echo $cidade?>" required>
            <br>
            <label for="rua">Rua:</label>
            <input type="text" name="rua" id="rua" value = "<?php echo $rua?>" required>
            <br>

            <input type="hidden" name="id" value="<?php echo $id_user?>" required>

            <input type="submit" value="Atualizar Informações" id = "submit">
        </form>
        
        
    </main>
    
</body>
</html>
