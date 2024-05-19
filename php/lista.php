<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Pizzaiolo</title>
    <link rel="stylesheet" href="../Style/edit_pizzaiolo.css">
    <link rel="stylesheet" href="../Style/padrao.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="shortcut icon" href="../imagens/icone/pizza.ico" type="image/x-icon">
</head>
<body>
    <?php
        //definir a conexão com o banco de dados
        include("../geral/menu.php");
        include("connection.php");
        include("validacao_gerente.php");
        verificarGerente();
    
    
        $id = $_SESSION['id'];

        // Consulta SQL para selecionar os detalhes do pizzaiolo com o ID fornecido
        $sql = "SELECT u.id, u.nome, u.tipo_usuario, u.email,
                u.cpf, u.data_nascimento, u.celular, u.username,
                e.cep, e.rua, e.num_res, e.cidade, e.estado
                FROM usuarios u INNER JOIN usuario_endereco ue ON u.id = ue.usuario_id 
                INNER JOIN enderecos e ON ue.endereco_id = e.id WHERE u.id = $id";

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
                echo "<tr><th>ID</th><td>{$row['id']}</td></tr>";

                echo "<tr><th>Nome</th><td>{$row['nome']}</td></tr>";

                echo "<tr><th>Tipo de usuario</th><td>{$row['tipo_usuario']}</td></tr>";

                echo "<tr><th>Username</th><td>{$row['username']}</td></tr>";

                echo "<tr><th>CPF</th><td>{$row['cpf']}</td></tr>";

                echo "<tr><th>email</th><td>{$row['email']}</td></tr>";

                echo "<tr><th>Senha</th><td>{$row['senha']}</td></tr>";

                echo "<tr><th>Data de Nascimento</th><td>" . date("d/m/Y", strtotime($row["data_nascimento"])) . "</td></tr>";

                echo "<tr><th>Numero de telefone</th><td>{$row['celular']}</td></tr>";

                echo "<tr><th>Estado</th><td>{$row['estado']}</td></tr>";

                echo "<tr><th>CEP</th><td>{$row['cep']}</td></tr>";
                
                echo "<tr><th>Numero da residencia</th><td>{$row['num_res']}</td></tr>";

                echo "<tr><th>Cidade</th><td>{$row['cidade']}</td></tr>";

                echo "<tr><th>Rua</th><td>{$row['rua']}</td></tr>";
            }
            echo "</table>";
        } else {
            echo "Nenhum pizzaiolo encontrado com o ID fornecido.";
        }
    

    // Fechar a conexão com o banco de dados
    $conn->close();
    ?>
</body>
</html>

