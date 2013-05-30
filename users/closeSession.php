<?php
	include('../clases/config.php');

	if(isset($_SESSION['user_id'])){
		$sql='UPDATE `usuarios` SET `online` = "0" WHERE `id` = "'.$_SESSION['user_id'].'" AND `estado` = "1"';
		include('../clases/sql.php');
	}

	session_destroy();
	header('location: ./../');
?>