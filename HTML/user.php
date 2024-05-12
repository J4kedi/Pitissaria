<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Style/user.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../Style/padrao.css">
    <title>Perfil</title>
</head>
<body>
    <?php include '../geral/menu.php'?> 
    <main> 
    <?php
        include("../php/connection.php");

            $id = $_SESSION['id_user'];

            // Consulta apenas os dados do usuário logado
            $sql = "SELECT id, nome, username, cpf, email, data_nascimento, celular FROM usuarios WHERE id = '$id'";
            $result = $conn->query($sql);
            // Verificar se há resultados
            if ($result && $result->num_rows > 0) {
                // Exibir os detalhes do ingrediente em uma tabela
                echo "<table>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr><th>Nome: </th><td>{$row['nome']}</td></tr>";
                    echo "<tr><th>Username: </th><td>{$row['username']}</td></tr>";
                    echo "<tr><th>CPF: </th><td>{$row['cpf']}</td></tr>";
                    echo "<tr><th>Email: </th><td>{$row['email']}</td></tr>";
                    echo "<tr><th>Data nascimento: </th><td>{$row['data_nascimento']}</td></tr>";
                    echo "<tr><th>Numero de telefone: </th><td>{$row['celular']}</td></tr>";
                    echo "<tr><th><a href='useratualizar.php?id={$row['id']}' style= 'color:white; text-decoration:none;'>Editar</a></th></tr>";
                }
                echo "</table>";
            } else {
                echo "Nenhum usuario encontrado !. ";
            }
        
    
        // Fechar a conexão com o banco de dados
        $conn->close();
        ?>
    </main>

    <?php include '../geral/footer.php'?>
</body>
</html>
