  // Mostrar o modal quando a página carregar
  window.onload = function () {
    $('#loginModal').modal('show');

    // Esconder o modal após 5 segundos
    setTimeout(function () {
      $('#loginModal').modal('hide');
    }, 5000);
  };