<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include('geral/menu.php');?>

    <?php 
        require_once('../php/sessao/verificaUsuario.php');
        verificaSessao();
        include('../php/consultas/consultaDadosCarrinho.php');
    ?>

    <main>
        <?php exibirCarrinho();?>
    </main>

    <?php include('geral/footer.php')?>
</body>
</html>
