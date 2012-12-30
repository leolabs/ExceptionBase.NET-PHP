<?php
	include("../incs/database.php");
	
	$user = mysql_real_escape_string($_GET["user"]);
	$pass = mysql_real_escape_string($_GET["pass"]);
	$mail = mysql_real_escape_string($_GET["mail"]);
	$passhash = crypt($pass, $crypto);
	
	$request = utf8_decode("INSERT INTO users (Username, PasswordHash, Mail) VALUES ('$user', '$passhash', '$mail')");
	
	$doubleCheck = mysql_query("SELECT * FROM users WHERE Username='$user'");
	
	if(mysql_num_rows($doubleCheck) == 0){
		$result = mysql_query($request) or die ("Request failed: " . mysql_error());
	} else {
		$result = "Der Benutzer $user existiert bereits in der Datenbank.";
	}
	
	echo $result;
?>