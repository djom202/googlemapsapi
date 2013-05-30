<?php
	include('config.php');

	if(isset($_REQUEST['user'])){ $user=$_REQUEST['user']; }else{ echo json_decode('No se recivio el nombre de usuario.'); exit(); }
	if(isset($_REQUEST['pass'])){ $pass=md5($_REQUEST['pass']); }else{ echo json_decode('No se recivio la contraseña del usuario.'); exit(); }


	$sql='SELECT `online`, `estado` FROM `usuarios` WHERE `user`="'.$user.'" AND `pass`="'.$pass.'"';
	include('sql.php');
	if($result != 0){
		if($row=mysql_fetch_array($result)){ $estado = $row['estado']; $online = $row['online']; }
		if($estado == "0"){
			echo 'El usuario no esta habilitado, contactese con el administardor.';
			exit();
		}
		if($online == "1"){
			echo 'El usuario ya esta Online, contactese con el administardor.';
			exit();
		}
	}else{ echo 'no existe un resultado.'; }


	$sql='SELECT CONCAT(`nombre`, " ",`apellido`) as nombre, `id`, `cedula`, `email` FROM `usuarios` WHERE `user` = "'.$user.'" AND `pass` =  "'.$pass.'" AND `online` = "0" AND `estado` = "1"';
	include('sql.php');

	if($row=mysql_fetch_assoc($result)){
		$nom = $row['nombre'];
		$_SESSION['user_id'] = $row['id'];
		$_SESSION['user_ced'] = $row['cedula'];
		$_SESSION['user_name'] = $row['nombre'];
		$_SESSION['user_email'] = $row['email'];
		echo json_encode($nom);
	}

	if(isset($_SESSION['user_id'])){
		$sql='UPDATE `usuarios` SET `online` = "1" WHERE `id` = "'.$_SESSION['user_id'].'" AND `estado` = "1"';
		include('../clases/sql.php');
	}

?>