<?php
	include('config.php');

	if(isset($_REQUEST['cedula'])){ $cedula=$_REQUEST['cedula']; }else{ echo json_decode('No se recivio la cedula.'); exit(); }
	if(isset($_REQUEST['nombre'])){ $nombre=$_REQUEST['nombre']; }else{ echo json_decode('No se recivio el nombre.'); exit(); }
	if(isset($_REQUEST['apellido'])){ $apellido=$_REQUEST['apellido']; }else{ echo json_decode('No se recivio el apellido.'); exit(); }
	if(isset($_REQUEST['mail'])){ $mail=$_REQUEST['mail']; }else{ echo json_decode('No se recivio el telefono.'); exit(); }
	if(isset($_REQUEST['user'])){ $user=$_REQUEST['user']; }else{ echo json_decode('No se recivio el nombre de usuario.'); exit(); }
	if(isset($_REQUEST['pass'])){ $pass=md5($_REQUEST['pass']); }else{ echo json_decode('No se recivio la contraseña del usuario.'); exit(); }

	$sql='INSERT INTO `usuarios`(`cedula`, `nombre`, `apellido`, `email`, `user`, `pass`, `estado`) VALUES ("'.$cedula.'","'.$nombre.'","'.$apellido.'","'.$mail.'","'.$user.'","'.$pass.'","1")';
	include('sql.php');

	echo json_encode('Usuario Registrado con Exito.');
?>