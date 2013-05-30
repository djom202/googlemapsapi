<?php
	if(defined('env')){
		switch (env) {
			case 'development':
				$server_db = '127.0.0.1';
				$user_db = 'root';
				$pass_db = '';
				$db = 'pasteur';
				break;
			case 'production':
				break;
			case 'test':
				break;
			default:
				# code...
				break;
		}

		$_SESSION['link'] = mysql_connect($server_db,$user_db,$pass_db);
		if(!$_SESSION['link']){
			echo 'Error en la conexion al servidor de base de datos.';
			exit();
		}else{
			$bd_select = mysql_select_db($db,$_SESSION['link']);
			if (!$bd_select) { echo 'Error en la conexion a la base de datos.'; exit(); }
		}
		unset($server_db,$user_db,$pass_db,$db);
	}else{
		echo 'no defined<br>';
	}
?>