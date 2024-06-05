<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../imagens/icone/pizza.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Editar Pizzaiolo</title>
    <link rel="stylesheet" href="../Style/padrao.css">
    <link rel="stylesheet" href="../Style/editar_pizzaiolo.css">
</head>
<body>
<?php
    include("connection.php");
    include("../paginas/geral/menu.php");
    require_once("sessao/verificaUsuario.php");
    verificaSessaoPizzaiolo();
    verificaSessaoCliente();

    $sql =  "SELECT u.id, u.nome, u.tipo_usuario, u.email, u.cpf, u.data_nascimento, u.celular, u.username, e.cep, e.rua, e.num_res, e.cidade, e.estado
    FROM usuarios u INNER JOIN usuario_endereco ue ON u.id = ue.usuario_id INNER JOIN enderecos e ON ue.endereco_id = e.id WHERE tipo_usuario = 'pizzaiolo'";


    $result = $conn->query($sql);


    if ($result->num_rows>0 || $result_endereco -> num_rows > 0){
        while($row = $result->fetch_assoc()){

            $id = $row["id"];

            $nome = $row["nome"];

            $tipo_usuario = $row["tipo_usuario"];

            $username = $row["username"];

            $cpf = $row["cpf"];

            $email = $row["email"];
            
            $data_nascimento = $row["data_nascimento"];

            $celular = $row["celular"];

            $estado = $row["estado"];

            $cep = $row["cep"];

            $cidade = $row["cidade"];

            $rua = $row["rua"];

            $num_res = ["num_res"];

        }
    }
?>
    <a href="lista.php" class="btn btn-primary">Voltar</a>
    <main>

        <h1>Editar informações</h1>
        <div class = "container">

            <form action="edit_php.php" id="form1" method="POST">
                <div class ="coluna1">
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
                    <label for="celular">Numero de telefone</label>
                    <input type="text" name="celular" id="celular" value ="<?php echo $celular?>" required>
                    <br>
                </div>
                <div class ="coluna2">
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
                    <label for="num_res">Numero da residencia:</label>
                    <input type="number" name="num_res" id="num_res" value="<?php echo $num_res?>" required>
                    <br>
                    <input type="submit" value="Atualizar pizzaiolo" id = "submit">
                    <br>
                </div>
                <input type="hidden" name="id" value="<?php echo $id?>" required>

            </form>
        </div>
    </main>

</body>
</html>
