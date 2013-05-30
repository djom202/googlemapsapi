<?php
    try {
    	$result=mysql_query($sql,$_SESSION['link']) or die("Error: ".mysql_error().'<br>'.$sql);
	}
	catch (Exception $e){
		echo $e;
	    mysql_close($_SESSION['link']);
	    return false;
	}
?>