<?php


function verificarGerente() {
    if (!isset($_SESSION['tp_user']) || $_SESSION['tp_user'] !== 'gerente') {
        // Redirecionar para uma página de acesso negado ou página de login
        header("Location: {$_SERVER['HTTP_REFERER']}");
        exit();
    }
}




?>
