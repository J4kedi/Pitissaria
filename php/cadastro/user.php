<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../Style/padrao.css">
    <title>Perfil</title>
</head>
<body>
    <?php include '../geral/menu.php'?> 

    <main> 
    <?php
        include("../connection.php");
        include("../validacao_acesso_php.php");
        verificar_acesso_gerente();
        verificarAcessoGerente();
            $id = $_SESSION['id_user'];

            // Consulta apenas os dados do usuário logado
            $sql = "SELECT nome, username, cpf, email, senha, dt_nasc, num_telefone, estado, cep, cidade, rua, id_user FROM user_endereco_user WHERE id_user = '$id'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $table  = '<table>';
                $table .= '<thead>';
                $table .= '<tr>';
                $table .= '<td>Selecionar Cliente</td>';
                $table .= '<td>Nome</td>';
                $table .= '<td>Usuario</td>';
                $table .= '<td>Cpf</td>';
                $table .= '<td>Email</td>';
                $table .= '<td>Senha</td>';
                $table .= '<td>Data de Nascimento</td>';
                $table .= '<td>Telefone</td>';
                $table .= '<td>Estado</td>';
                $table .= '<td>Cep</td>';
                $table .= '<td>Cidade</td>';
                $table .= '<td>Nome da Rua</td>';
                $table .= '<td>Editar</td>';
                $table .= '</tr>';
                $table .= '</thead>';
                $table .= '<tbody>';

                while($row = $result->fetch_assoc()){
                    $table .= '<tr>';
                    $table .= "<td><input type='checkbox' value='{$row['nome']}'></td>";
                    $table .= "<td>{$row['nome']}</td>";
                    $table .= "<td>{$row['username']}</td>";
                    $table .= "<td>{$row['cpf']}</td>";
                    $table .= "<td>{$row['email']}</td>";
                    $table .= "<td>{$row['senha']}</td>";
                    $table .= "<td>{$row['dt_nasc']}</td>";
                    $table .= "<td>{$row['num_telefone']}</td>";
                    $table .= "<td>{$row['estado']}</td>";
                    $table .= "<td>{$row['cep']}</td>";
                    $table .= "<td>{$row['cidade']}</td>";
                    $table .= "<td>{$row['rua']}</td>";
                    $table .= "<td><a class='btn btn-info' href='../html/useratualizar.php'client/edit/{$row['nome']}'>Editar</a></td>";
                    $table .= '</tr>';
                }
                $table .= '</tbody>';
                $table .= '</table>';
                echo $table;
            } else {
                echo "Nenhum registro encontrado.";
            }

    ?>
    </main>

    <?php include '../geral/footer.php'?>
</body>
</html>
