<?php
	include("../incs/database.php");
	
	$em = mysql_real_escape_string($_POST["em"]);
	$ei = mysql_real_escape_string($_POST["ei"]);
	$st = mysql_real_escape_string($_POST["st"]);
	$eme = mysql_real_escape_string($_POST["eme"]);
	$udesc = mysql_real_escape_string($_POST["udesc"]);
	$appid = mysql_real_escape_string($_POST["appid"]);
	$v = mysql_real_escape_string($_POST["v"]);
	$net = mysql_real_escape_string($_POST["net"]);
	$os = mysql_real_escape_string($_POST["os"]);
	
	$request = utf8_decode("INSERT INTO exceptions (ExceptionMessage, ExceptionInner, StackTrace, ErrorMethod, UserDescription, App, Version, NETFramework, InstalledOS) VALUES
				('$em', '$ei', '$st', '$eme', '$udesc', '$appid', '$v', '$net', '$os')");
				
	$result = mysql_query($request) or die ("0;Request failed: " . mysql_error());
	
	echo $result;
?>