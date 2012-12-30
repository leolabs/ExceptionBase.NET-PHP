<?php
	include("incs/database.php");
	
	$user = mysql_real_escape_string($_GET["user"]);
	$pass = mysql_real_escape_string($_GET["pass"]);
	$mail = mysql_real_escape_string($_GET["mail"]);
	$passhash = crypt($pass, $crypto);
	
	$request = utf8_decode("INSERT INTO users (Username, PasswordHash, Mail) VALUES ('$user', '$passhash', '$mail')");
	
	$result = mysql_query($request) or die ("Request failed: " . mysql_error());
	echo $result;
?>