<?php
session_start(); // Inicia a sessão
session_destroy(); // Destrói todas as variáveis de sessão
$url = "index.php"; // URL para redirecionamento
header("Location: " . $url); // Vai para a página de login / inicial
exit();
?>
