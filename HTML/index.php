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
<?php include '..\geral\header.php' ?>

<div class="overlay"></div>

<div id="modalSuccess" class="modal">
    <div class="modal-content">
        <p>Login bem-sucedido!</p>
        <p>Bem-vindo!</p>
    </div>

</div>

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

  
  <?php


// Verifica se o usuário está logado
if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
    // Verifica se o modal já foi exibido
    if(!isset($_SESSION['modal_exibido']) || !$_SESSION['modal_exibido']) {
        // Define a mensagem do modal de acordo com o tipo de usuário
        $modal_message = "<p>Login bem-sucedido!</p>";
        if($_SESSION['tp_user'] === 'gerente') {
            $modal_message .= "<p>Gerente logado</p>";
        } elseif ($_SESSION['tp_user'] === 'cliente') {
            $modal_message .= "<p>Seja bem vindo cliente</p>";
        } elseif ($_SESSION['tp_user'] === 'pizzaiolo') {
            $modal_message .= "<p>Pizzaiolo logado</p>";
        }

        // Exibe o modal de sucesso com a mensagem adequada
        echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    const modalSuccess = document.getElementById('modalSuccess');
                    const overlay = document.querySelector('.overlay');
                    const messageContainer = modalSuccess.querySelector('.modal-content');

                    messageContainer.innerHTML = '{$modal_message}';
                    modalSuccess.style.display = 'block';
                    overlay.style.display = 'block';

                    // Configura um temporizador para fechar o modal após 2 segundos
                    setTimeout(function() {
                        modalSuccess.style.display = 'none';
                        overlay.style.display = 'none';
                    }, 2000); // 2000 milissegundos = 2 segundos

                    // Define que o modal foi exibido
                    " . $_SESSION['modal_exibido'] = true . ";
                });
            </script>";
    }
}
?>



</body>
</html>