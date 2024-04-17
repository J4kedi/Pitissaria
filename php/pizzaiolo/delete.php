<?php
    include("../connection.php");
    include("../validacao_acesso_php.php");
    verificar_acesso_gerente();
    verificarAcessoGerente();
    $id = $_GET["id_user"];

    $sql = "DELETE FROM user_endereco_user WHERE id_user = $id";
    if ($conn->query($sql) === TRUE){
        header("location: listagem.php");
    }
    else {
?>
<script>
    alert("Operação falhou");
    history.go(-1);
</script>
<?php
    }


?>