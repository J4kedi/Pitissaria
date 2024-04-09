<?php
// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se os campos de usuário, senha e função foram preenchidos
    if (isset($_POST["nome"]) && isset($_POST["senha"]) && isset($_POST["tp_user"])) {
        // Conecta ao banco de dados
        $conn = new mysqli("localhost", "root", "0000", "teste1");

        // Verifica se houve algum erro na conexão
        if ($conn->connect_error) {
            die("Erro de conexão: " . $conn->connect_error);
        }

        $username = $_POST["nome"];
        $password = $_POST["senha"];
        $role = $_POST["tp_user"];

        // Prepara a consulta SQL para buscar o usuário com o username e a função fornecidos
        $sql = "SELECT id_user, nome, senha, tp_user FROM user WHERE nome = $username AND tp_user = $role";

        // Prepara e executa a declaração
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $username, $role);
        $stmt->execute();
        $result = $stmt->get_result();

        // Verifica se o usuário foi encontrado
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            // Verifica se a senha fornecida corresponde à senha no banco de dados
            if (password_verify($password, $row["senha"])) {
                // Inicia a sessão
                session_start();
                // Define variáveis de sessão para indicar que o usuário está logado e seu papel
                $_SESSION["logged_in"] = true;
                $_SESSION["role"] = $role;
                // Redireciona para a página adequada após o login bem-sucedido
                if ($role == "gerente") {
                    header("Location: ../ingredientes/lista_ingredientes.php");
                } elseif ($role != "gerente") {
                    header("Location: pagina_admin.php");
                }
                exit();
            } else {
                echo "Credenciais inválidas. Por favor, tente novamente.";
            }
        } else {
            echo "Credenciais inválidas. Por favor, tente novamente.";
        }

        // Fecha a conexão com o banco de dados
        $stmt->close();
        $conn->close();
    }
}
?>