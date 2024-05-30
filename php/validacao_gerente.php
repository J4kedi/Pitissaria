<?php


function verificarGerente() {
    // Verifica se a variável de sessão 'tp_user' está definida e se o valor é 'gerente'
    if (!isset($_SESSION['tipo_usuario']) || $_SESSION['tipo_usuario'] !== 'gerente') {
        // Redireciona para a página de login ou acesso negado
        header("Location: ../paginas/index.php");
        exit();
    }
}
?>
