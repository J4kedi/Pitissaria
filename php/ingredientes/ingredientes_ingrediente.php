<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Ingrediente</title>
</head>
<body>
    <?php
    // Incluir ou definir a conexão com o banco de dados
    require_once "connection.php";
     // Substitua "conexao.php" pelo caminho correto do arquivo

    // ele está verificar se o id_ingrediente foi passado na URL
    if (isset($_GET['id'])) {
        // Obter o id do ingrediente da URL
        $id = $_GET['id'];

        // Consulta SQL para selecionar os detalhes do ingrediente com o ID fornecido
        $sql = "SELECT id, nome_ingrediente, dt_validade, quantidade_ingrediente, preco_compra FROM ingredientes WHERE id = $id";

        // Executar a consulta SQL
        $result = $conn->query($sql);

        // Verificar se há resultados
        if ($result && $result->num_rows > 0) {
            // Exibir os detalhes do ingrediente
            while ($row = $result->fetch_assoc()) {
                echo "ID: {$row['id']}<br>";
                echo "Ingrediente: {$row['nome_ingrediente']}<br>";
                echo "Data de validade: {$row['dt_validade']}<br>";
                echo "Quantidade: {$row['quantidade_ingrediente']}<br>";
                echo "Preço da compra: {$row['preco_compra']}<br>";
            }
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
