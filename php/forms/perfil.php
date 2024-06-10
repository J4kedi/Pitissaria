<?php
    session_start();
    require_once('../conexao/connection.php');
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $novoEndereco = false;

        $cep = $_POST['cep'];
        $num_res = $_POST['num-res'];
        $nome = $_POST['nome'];
        $celular = $_POST['celular'];
        $dataNascimento = $_POST['data-nascimento'];
    
        $sqlEndereco = "SELECT id FROM enderecos WHERE cep = :cep AND num_res = :num_res";
        $stmtEndereco = $conn->prepare($sqlEndereco);
        $stmtEndereco->execute([':cep' => $cep, ':num_res' => $num_res]);
        $enderecoId = $stmtEndereco->fetchColumn();
    
        if (!$enderecoId) {
            $sqlInsertEndereco = "INSERT INTO enderecos (cep, rua, num_res, cidade, estado) 
                                  VALUES (:cep, :rua, :num_res, :cidade, :estado)";
            $stmtInsertEndereco = $conn->prepare($sqlInsertEndereco);
            $stmtInsertEndereco->execute([
                ':cep' => $cep,
                ':rua' => $_POST['rua'],
                ':num_res' => $num_res,
                ':cidade' => $_POST['cidade'],
                ':estado' => $_POST['estado'],
            ]);
            $enderecoId = $conn->lastInsertId();
            $novoEndereco = true;
        }
    
        $sqlUpdateUsuario = "UPDATE usuarios SET nome = :nome, celular = :celular, data_nascimento = :data_nascimento 
                             WHERE id = :id";
        $stmtUpdateUsuario = $conn->prepare($sqlUpdateUsuario);
        $stmtUpdateUsuario->execute([
            ':nome' => $nome,
            ':celular' => $celular,
            ':data_nascimento' => $dataNascimento,
            ':id' => $_SESSION['sessao'],
        ]);

        $sqlUsuario = "SELECT nome FROM usuarios where id = :id";
        $stmtUsuario = $conn->prepare($sqlUsuario);
        $stmtUsuario->execute([
            ':id' => $_SESSION['sessao'],
        ]);
        $result = $stmtUsuario->fetch(PDO::FETCH_ASSOC);

        $nomeSeparado = explode(' ', $result['nome']);
        $_SESSION['nome'] = $result['nome'];
        $_SESSION['primeiroNome'] = $nomeSeparado[0];

        if ($novoEndereco) {
            $sqlInsertUsuarioEndereco = "INSERT INTO usuario_endereco (usuario_id, endereco_id) 
                                         VALUES (:usuario_id, :endereco_id)";
            $stmtInsertUsuarioEndereco = $conn->prepare($sqlInsertUsuarioEndereco);
            $stmtInsertUsuarioEndereco->execute([
                ':usuario_id' => $_SESSION['sessao'],
                ':endereco_id' => $enderecoId,
            ]);
        }
    }
    
    echo '<script>
            window.alert("edição concluída");
            setTimeout(function() { window.location.href = "../../paginas/perfil.php"; }, 1);
        </script>';
    exit;    
?>