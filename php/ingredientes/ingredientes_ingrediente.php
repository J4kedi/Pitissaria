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
    require_once "connection.php";
    include("validacao_acesso_php.php");
    validar_acesso();

    // Verificar se o id_ingrediente foi passado na URL
    if (isset($_GET['id'])) {
        // Obter o id do ingrediente da URL
        $id = $_GET['id'];

        // Consulta SQL para selecionar os detalhes do ingrediente com o ID fornecido
        $sql = "SELECT id, nome_ingrediente, dt_validade, quantidade_ingrediente, preco_compra FROM ingredientes WHERE id = $id";

        // Executar a consulta SQL
        $result = $conn->query($sql);
        ?>
        <div>
            <a href="lista_ingredientes.php"><h3 class="voltar_listagem">Voltar a Listagem</h3></a><br>
        </div>
        <?php
        // Verificar se há resultados
        if ($result && $result->num_rows > 0) {
            // Exibir os detalhes do ingrediente em uma tabela
            echo "<table>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr><th>ID</th><td>{$row['id']}</td></tr>";
                echo "<tr><th>Ingrediente</th><td>{$row['nome_ingrediente']}</td></tr>";
                echo "<tr><th>Data de Validade</th><td>" . date("d/m/Y", strtotime($row["dt_validade"])) . "</td></tr>";
                echo "<tr><th>Quantidade</th><td>{$row['quantidade_ingrediente']} Kg</td></tr>";
                echo "<tr><th>Preço da Compra</th><td>R$ {$row['preco_compra']}</td></tr>";
            }
            echo "</table>";
        } else {
            echo "Nenhum ingrediente encontrado com o ID fornecido.";
        }
    } else {
        echo "ID do ingrediente não foi fornecido.";
    }

    // Fechar a conexão com o banco de dados
    $conn->close();
    ?>
</body>
</html>

