<?php
    if(!$_SESSION['login']){                                    // Não houve login ainda
        $url = "Location: /" . $url . "HTML\index.php";             // Monta URL para redirecionamento
        header($url);                                           // Vai para a página de login / inicial
        exit();
    }