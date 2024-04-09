<?php
		require('verifica_login.php');
		$url = dirname($_SERVER['SCRIPT_NAME']);                   // Obtém URL básica da aplicação Web
		$url = substr($url,strrpos($url,"\\/")+1,strlen($url));    // Retira 1o. '/'
		if (substr_count($url, '/') >= 1){                          
			$url = substr($url,strrpos($url,"\\/"),strlen($url));  // Retira 2o. '/', se ainda houver esse caracter
			$url = strstr($url, '/',true);
		}
		if ($_SESSION['tp_user'] == 'gerente'){
			$url = "Location: /" . $url . "php\ingredientes\lista_ingredientes.php";	// Monta página para reurlecionamento
			header($url);                                         		// Vai para a página de login / inicial
			exit();
		}else if ($_SESSION['nomeTipoUsu'] != 'Administrador'){     	// Não é Professor nem Administrador
			$url = "Location: " . $url . "/index.php";         			// Monta página para reurlecionamento
			header($url);												// Vai para a página de login / inicial
			exit();
		}
	?>