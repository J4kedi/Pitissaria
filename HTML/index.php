<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../Style/index.css">
  <link rel="stylesheet" href="../Style/padrao.css">
  <title>Pitissaria</title>
  <link rel="shortcut icon" href="../imagens/icone/pizza.ico" type="image/x-icon">
</head>

<body>
  <?php include '../geral/header.php'?>

  <div class="overlay-i"></div>

  <div id="modalSuccess" class="modal">
    <div class="modal-content">
      <p>Login bem-sucedido!</p>
      <p>Bem-vindo!</p>
    </div>
  </div>

  <main class="text-center container">
  
    <div class="sobre-expand-md">
      <h1>Pitissaria</h1>
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
  if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
    // Verifica se o modal já foi exibido
    if (!isset($_SESSION['modal_exibido']) || !$_SESSION['modal_exibido']) {
      // Define a mensagem do modal de acordo com o tipo de usuário
      $modal_message = "<p>Login bem-sucedido!</p>";
      if ($_SESSION['tp_user'] === 'gerente') {
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
  <br>
  <?php include '../geral/footer.php'?>
</body>
</html>