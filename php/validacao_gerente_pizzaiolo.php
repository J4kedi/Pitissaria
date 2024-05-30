<?php


function verificarAcesso() {
    if (!isset($_SESSION['tipo_usuario']) || !in_array($_SESSION['tipo_usuario'], ['gerente', 'pizzaiolo'])) {
        // Redirecionar para uma página de acesso negado ou página de login
        header("Location: acesso_negado.php");
        exit();
    }
}
?>
