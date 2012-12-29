<?
	ini_set("default_charset", "utf-8");
	header('content-type: text/html; charset: utf-8');
	
	$crypto = '$2y$07$adsfkjafjbafawjiiawefaighsalfkhafd$';
	
	mysql_connect("localhost", "username", "password") or die("Database connect failed!"); // Add your data here
	mysql_select_db("database") or die("Database select failed"); // Add your database name here
?>