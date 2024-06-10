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

    if ($result->num_rows>0){
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
            $num_res = $row["num_res"];
            $rua = $row["rua"];
        }
    }
?>
    <a href="listagem.php" class="btn btn-primary">Voltar</a>
    <main>
        <h1>Editar informações</h1>
        <div class="container">
            <form action="edit_php.php" id="form1" method="POST">
                <div class="coluna1">
                    <div class = "campo">
                        <label for="nome">Nome:</label>
                        <input type="text" name="nome" id="nome" value="<?php echo $nome?>" required>
                    </div>
                    <br>
                    <div class = "campo">
                        <label for="tp_user">Tipo de Usuario:</label>
                        <input type="text" name="tipo_usuario" id="tipo_usuario" value="<?php echo $tipo_usuario?>" default="pizzaiolo" required>
                    </div>
                    <br>
                    <div class = "campo">
                        <label for="username">Username:</label>
                        <input type="text" name="username" id="username" value="<?php echo $username?>" required>
                    </div>
                    <br>
                    <div class = "campo">
                        <label for="cpf">CPF:</label>
                        <input type="text" name="cpf" id="cpf" value="<?php echo $cpf?>" required>
                    </div>
                    <br>
                    <div class = "campo">
                        <label for="email">Email:</label>
                        <input type="text" name="email" id="email" value="<?php echo $email?>" required>
                    </div>
                    <br>
                    <div class = "campo">
                        <label for="celular">Numero de telefone:</label>
                        <input type="text" name="celular" id="celular" value="<?php echo $celular?>" required>
                    </div>
                    <br>
                </div>
                <div class="coluna2">
                    <div class = "campo">
                        <label for="estado">Estado:</label>
                        <input type="text" name="estado" id="estado" value="<?php echo $estado?>" required>
                    </div>
                    <br>
                    <div class = "campo">
                        <label for="cep">CEP:</label>
                        <input type="text" name="cep" id="cep" value="<?php echo $cep?>" required>
                    </div>
                    <br>
                    <div class = "campo">
                        <label for="dt_nasc">Data de Nascimento:</label>
                        <input type="date" name="data_nascimento" id="data_nascimento" value="<?php echo $data_nascimento?>" required>
                    </div>
                    <br>
                    <div class = "campo">
                        <label for="cidade">Cidade:</label>
                        <input type="text" name="cidade" id="cidade" value="<?php echo $cidade?>" required>
                    </div>
                    <br>
                    <div class = "campo">
                        <label for="rua">Rua:</label>
                        <input type="text" name="rua" id="rua" value="<?php echo $rua?>" required>
                    </div>
                    <br>
                    <div class = "campo">
                        <label for="num_res">Numero da residencia:</label>
                        <input type="number" name="num_res" id="num_res" value="<?php echo $num_res?>" required>
                    </div>
                    <br>
                    <input type="submit" value="Atualizar pizzaiolo" id="submit">
                    <br>
                </div>
                <input type="hidden" name="id" value="<?php echo $id?>" required>
            </form>
        </div>
    </main>
    <script src="../Js/paginas/camposEndereco.js"></script>
    <script src="../Js/novaValidacao/viaCep.js"></script>
    <script src="../Js/novaValidacao/cpf.js"></script>
    <script src="../Js/novaValidacao/erro.js"></script>
    <script src="../Js/novaValidacao/cadastro.js"></script>
    <script src="../Js/novaValidacao/escuta.js"></script>

</body>
</html>
