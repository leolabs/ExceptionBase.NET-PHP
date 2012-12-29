<?php
	session_start();
	
	if(!isset($_SESSION["login"]) || !isset($_SESSION["username"])){
		header("Location: /login.php");
	}
?>