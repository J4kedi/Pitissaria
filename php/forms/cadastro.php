<?php
    session_start();
    require_once('../conexao/connection.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST['nome'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $confirmarSenha = $_POST['confirmar-senha'];
        $cpf = $_POST['cpf'];
        $dataNascimento = $_POST['data-nascimento'];
        $celular = $_POST['celular'];
        $cep = $_POST['cep'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];
        $rua = $_POST['rua'];
        $num_res = $_POST['num-res'];

        if ($senha !== $confirmarSenha) {
            echo "A senha e a confirmação de senha não coincidem.";
            exit;
        }

        // Inserir dados na tabela enderecos
        $sqlEndereco = "INSERT INTO enderecos (cep, rua, num_res, cidade, estado) 
                        VALUES (:cep, :rua, :num_res, :cidade, :estado)";
        $stmtEndereco = $conn->prepare($sqlEndereco);
        $resultadoEndereco = $stmtEndereco->execute([
            ':cep' => $cep,
            ':rua' => $rua,
            ':num_res' => $num_res,
            ':cidade' => $cidade,
            ':estado' => $estado,
        ]);

        if (!$resultadoEndereco) {
            echo "Erro ao cadastrar endereço.";
            exit;
        }

        // Obter o ID do endereço inserido
        $enderecoId = $conn->lastInsertId();
        
        // Inserir dados na tabela usuarios
        $sqlUsuario = "INSERT INTO usuarios (nome, email, senha, cpf, data_nascimento, celular, username) 
                    VALUES (:nome, :email, MD5(:senha), :cpf, :data_nascimento, :celular, :username)";
        $stmtUsuario = $conn->prepare($sqlUsuario);
        $resultadoUsuario = $stmtUsuario->execute([
            ':nome' => $nome,
            ':email' => $email,
            ':senha' => $senha,
            ':cpf' => $cpf,
            ':data_nascimento' => $dataNascimento,
            ':celular' => $celular,
            ':username' => $username,
        ]);
        
        $usuarioId = $conn->lastInsertId();

        // Inserir dados na tabela usuario_endereco
        $sqlUsuarioEndereco = "INSERT INTO usuario_endereco (usuario_id, endereco_id) 
                    VALUES (:usuarioId, :enderecoId)";
        $stmtUsuarioEndereco = $conn->prepare($sqlUsuarioEndereco);
        $resultadoUsuarioEndereco = $stmtUsuarioEndereco->execute([
            ':usuarioId' => $usuarioId,
            ':enderecoId' => $enderecoId,
        ]);

        if ($resultadoUsuario and $resultadoUsuarioEndereco) {
            echo "Cadastro realizado com sucesso!";

            $nomeSeparado = explode(' ', $nome);
            $_SESSION['sessao'] = $id;
            $_SESSION['nome'] = $nome;
            $_SESSION['username'] = $username;
            $_SESSION['primeiroNome'] = $nomeSeparado[0];
            $_SESSION['tipo_usuario'] = $resultadoUsuario['tipo_usuario'];
            header("Location: ../../paginas/perfil.php");
            exit;
        }

        echo 'Erro ao cadastrar usuário.';
        exit;
    }
?>