<?php
    include("connection.php");
    
    $id = $_GET["id"];

    $sqlUsuarioEndereco = "DELETE FROM usuario_endereco WHERE usuario_id = $id";
    $sqlUsuario = "DELETE FROM usuarios WHERE id = $id";

    $resultUsuarioEndereco = $conn-> query($sqlUsuarioEndereco);
    $resultUsuario = $conn -> query($sqlUsuario);

    if ($resultUsuarioEndereco === True || $resultUsuario === True){
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