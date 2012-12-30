<?php
	include("../incs/database.php");
	
	$name = mysql_real_escape_string($_GET["name"]);
	
	$request = utf8_decode("INSERT INTO `applications` (Name) VALUES ('$name')");
	$result = mysql_query($request) or die ("Request failed: " . mysql_error());
	
	echo $result . "<br />";
	echo $name . " hat die ID " . mysql_insert_id();
?>