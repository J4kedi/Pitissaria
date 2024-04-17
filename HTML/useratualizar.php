<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
</head>
<body>
    <?php 
        include '../geral/menu.php';
        include '../php/connection.php';
        
        // Verifique se um ID de usuário foi enviado através da solicitação GET
        if(isset($_GET['id_user'])) {
            $id = $_GET['id_user'];
            
            // Execute uma consulta para recuperar as informações do usuário com base no ID
            $sql = "SELECT * FROM user_endereco_user WHERE id_user = $id";
            $result = $conn->query($sql);
            
    ?>
    <main class="container">
        <h1>Editar Usuário</h1>
        <form action="editar_usuario.php" method="POST">
            <!-- Inclua os campos do formulário pré-preenchidos com as informações do usuário -->
            <input type="hidden" name="id" value="<?php echo $usuario['id_user']; ?>">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" value="<?php echo $usuario['nome']; ?>" required>
            </div>
            <div class="form-group">
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" value="<?php echo $usuario['senha']; ?>" required>
            </div>
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" value="<?php echo $usuario['username']; ?>" required>
            </div>
            <div class="form-group">
                <label for="cpf">CPF:</label>
                <input type="text" id="cpf" name="cpf" value="<?php echo $usuario['cpf']; ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo $usuario['email']; ?>" required>
            </div>
            <div class="form-group">
                <label for="dt_nasc">Data de Nascimento:</label>
                <input type="date" id="dt_nasc" name="dt_nasc" value="<?php echo $usuario['dt_nasc']; ?>" required>
            </div>
            <div class="form-group">
                <label for="nome_rua">Nome da Rua:</label>
                <input type="text" id="nome_rua" name="nome_rua" value="<?php echo $usuario['nome_rua']; ?>" required>
            </div>
            <div class="form-group">
                <label for="cep">CEP:</label>
                <input type="number" id="cep" name="cep" value="<?php echo $usuario['cep']; ?>" required>
            </div>
            <div class="form-group">
                <label for="num_res">Número da Residência:</label>
                <input type="number" id="num_res" name="num_res" value="<?php echo $usuario['num_res']; ?>" required>
            </div>
            <div class="form-group">
                <label for="num_telefone">Número de Telefone:</label>
                <input type="number" id="num_telefone" name="num_telefone" value="<?php echo $usuario['num_telefone']; ?>" required>
            </div>
            <div class="form-group">
                <label for="estado">Estado:</label>
                <input type="text" id="estado" name="estado" value="<?php echo $usuario['estado']; ?>" required>
            </div>
            <div class="form-group">
                <label for="cidade">Cidade:</label>
                <input type="text" id="cidade" name="cidade" value="<?php echo $usuario['cidade']; ?>" required>
            </div>
            <!-- Adicione os outros campos do formulário para editar outras informações do usuário -->
            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
        </form>
    </main>
    <?php 
        }else {
            echo "<p>ID do usuário não fornecido.</p>";
        }
        
        include '../geral/footer.php';
    ?>
</body>
</html>
