<?php
    function verificaSessao() {
        if(!isset($_SESSION['sessao'])) {
            header('location: ../paginas/index.php');
            return True;
        }
    }

    function verificaSessaoCliente() {
        if(verificaSessao()){
            return;
        } else if($_SESSION['tipo_usuario'] == "cliente") {
            header('location: ../paginas/index.php');
        }
    }

    function verificaSessaoPizzaiolo() {
        if(verificaSessao()) {
            return;
        } else if ($_SESSION['tipo_usuario'] == "pizzaiolo"){
            header('location: ../paginas/index.php');
        }
    }

    function verificaSessaoGerente() {
        if(verificaSessao()) {
            return;
        } else if ($_SESSION['tipo_usuario'] == "gerente"){
            header('location:../paginas/index.php');
        }
    }
?>