<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Ingrediente</title>
    <link rel="stylesheet" href="../../Style/ingredientes_ingredientes.css">
    <link rel="shortcut icon" href="../../imagens/icone/pizza.ico" type="image/x-icon">
</head>
<body>
    <?php
    //definir a conexão com o banco de dados
    require_once "../connection.php";
    include("../validacao_acesso_php.php");
    verificar_acesso_gerente();
    verificar_acesso_pizzaiolo();
    verificarAcessoGerenteEPizzaiolo();
    


        // Consulta SQL para selecionar os detalhes do pizzaiolo com o ID fornecido
        $sql = "SELECT id_user, nome, tp_user, username, dt_nasc, cpf, email, senha, dt_nasc, num_telefone, estado, cep, cidade, rua FROM user_endereco_user";

        // Executar a consulta SQL
        $result = $conn->query($sql);
        ?>
        <div>
            <a href="listagem.php"><h3 class="voltar_listagem">Voltar a Listagem</h3></a><br>
        </div>
        <?php
        // Verificar se há resultados
        if ($result && $result->num_rows > 0) {
            // Exibir os detalhes do ingrediente em uma tabela
            echo "<table>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr><th>ID</th><td>{$row['id_user']}</td></tr>";

                echo "<tr><th>Nome</th><td>{$row['nome']}</td></tr>";

                echo "<tr><th>Tipo de usuario</th><td>{$row['tp_user']}</td></tr>";

                echo "<tr><th>Username</th><td>{$row['username']}</td></tr>";

                echo "<tr><th>CPF</th><td>{$row['cpf']}</td></tr>";

                echo "<tr><th>email</th><td>{$row['email']}</td></tr>";

                echo "<tr><th>Senha</th><td>{$row['senha']}</td></tr>";

                echo "<tr><th>Data de Nascimento</th><td>" . date("d/m/Y", strtotime($row["dt_nasc"])) . "</td></tr>";

                echo "<tr><th>Numero de telefone</th><td>{$row['num_telefone']}</td></tr>";

                echo "<tr><th>Estado</th><td>{$row['estado']}</td></tr>";

                echo "<tr><th>CEP</th><td>{$row['cep']}</td></tr>";

                echo "<tr><th>Cidade</th><td>{$row['cidade']}</td></tr>";

                echo "<tr><th>Rua</th><td>{$row['rua']}</td></tr>";
            }
            echo "</table>";
        } else {
            echo "Nenhum ingrediente encontrado com o ID fornecido.";
        }
    

    // Fechar a conexão com o banco de dados
    $conn->close();
    ?>
</body>
</html>

