<?php
	ob_start('ob_gzhandler');
	header('Vary: Accept-Encoding');
	$cache_expire = 0;
	header("Pragma: private");
	header("Pragma: no-cache");
	header("Pragma: no-store");
	header('Expires: ' . date('D, d M Y H:i:s', time()+$cache_expire) . ' GMT');

	session_start();

	define('env', 'development');
	include('connect.php');
?>