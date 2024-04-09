<?php
		require('verifica_login_php.php');
		if ($_SESSION['tp_user'] == 'gerente'){
			$url = "Location: ingredientes/lista_ingredientes.php";	// Monta página para reurlecionamento
			header($url);                                         		// Vai para a página de login / inicial
			exit();
		}else if ($_SESSION['nomeTipoUsu'] != 'cliente'){     	// Não é Professor nem Administrador
			$url = "Location: HTML/index.php";         			// Monta página para reurlecionamento
			header($url);												// Vai para a página de login / inicial
			exit();
		}
	?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
  <link rel="stylesheet" href="../Style/padrao.css">
  <link rel="stylesheet" href="../Style/index.css">
  <title>Pitissaria</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="shortcut icon" href="../imagens\icone\pizza.ico" type="image/x-icon">

</head>

<body>
  <?php include '../geral/header.php' ?>

  <main class="text-center">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
          aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
          aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
          aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="img-fluid d-md-none" src="../ASSETS/imagemTelaDeInicio-Mobile.png"
            alt="Imagem de pizza indo para o forno">
          <img class="img-fluid d-none d-md-block d-xl-none" src="..\ASSETS\imagemTelaDeInicio-Tablet.png"
            alt="Imagem de pizza indo para o forno">
          <img class="img-fluid d-none d-xl-block" src="..\ASSETS\imagemTelaDeInicio-Desktop.png"
            alt="Imagem de pizza indo para o forno">
          <div class="carousel-caption d-none d-md-block">
            <h5>A pizza, com sua massa crocante, molho de tomate e uma variedade de coberturas suculentas.</h5>
          </div>
        </div>
        <div class="carousel-item">
          <img class="img-fluid d-md-none" src="../ASSETS/pizzaSegundaImagem-Mobile.jpg" alt="Imagem de pizza">
          <img class="img-fluid d-none d-md-block d-xl-none" src="../ASSETS/pizzaSegundaImagem-Tablet.jpg"alt="Imagem de pizza">
          <img class="img-fluid d-none d-xl-block" src="../ASSETS/pizzaSegundaImagem-Desktop.jpg"alt="Imagem de pizza">
          <div class="carousel-caption d-none d-md-block">
            <h5>"Nada supera a sensação reconfortante de uma fatia de pizza quentinha, derretendo queijo sobre uma base
              de massa fresca e aromática.</h5>
          </div>
        </div>
        <div class="carousel-item">
          <img class="img-fluid d-md-none" src="../ASSETS/pizzaTerceiraImagem-MOBILE.jpeg"
            alt="Imagem de pizza sendo servida">
          <img class="img-fluid d-none d-md-block d-xl-none" src="..\ASSETS\pizzaTerceiraImagem-Tablet.jpeg"
            alt="Imagem de pizza sendo servida">
          <img class="img-fluid d-none d-xl-block" src="..\ASSETS\pizzaTerceiraImagem-Desktop2.jpeg"
            alt="Imagem de pizza sendo servida">
          <div class="carousel-caption d-none d-md-block">
            <h5>A pizza é uma obra de arte culinária, uma combinação perfeita de ingredientes que se unem para criar uma
              explosão de sabor em cada mordida.</h5>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

    <h1>Pitissaria</h1>

    <div class="sobre-expand-md">
      <h2>Sobre nós</h2>
      <p>
        Bem-vindo à Pitissaria, onde cada fatia é uma experiência!
        Fundada em 2001 por um grupo de amigos apaixonados por pizza e boa comida,
        a Pitissaria rapidamente se tornou um ponto de encontro querido pela comunidade de São Jorge.
        nome "Pitissaria" foi inspirado na combinação de "pizza" e "felicidade",
        refletindo nossa missão de trazer alegria aos nossos clientes por meio de deliciosas criações de pizza.
      </p>
      <p>
        Nosso compromisso com a qualidade é inabalável. Utilizamos ingredientes frescos e locais sempre que possível,
        garantindo que cada pizza seja uma explosão de sabores autênticos. Nossos fornos são aquecidos a lenha,
        proporcionando uma crosta crocante e um sabor defumado que conquista até os paladares mais exigentes.
      </p>
      <p>
        Buon appetito!
      </p>
    </div>

  </main>

  <?php include '../geral/footer.php'?>
  <script src="../JavaScript/index.js"></script>
</body>

</html>