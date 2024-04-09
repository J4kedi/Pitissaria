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

