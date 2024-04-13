<?php

    session_start(); // Inicia a sessão
    session_destroy();                     // Destrói todas as variáveis de sessão
    $url = "Location: index.php";         // URL para redirecionamento
    header($url);                    // Vai para a página de login / inicial
    exit();
?>