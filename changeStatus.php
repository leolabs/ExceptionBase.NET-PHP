<?php
	include("incs/checkLogin.php");
	include("incs/database.php");
	
	$id = $_GET["id"];
	
	if($_GET["oldstatus"] == "1"){
		$fixed = 0;
	}else{
		$fixed = 1;
	}
	
	$result = mysql_query("UPDATE exceptions Set `Fixed`='$fixed' WHERE `ID`='$id'") or die(mysql_error());
	
	header ("Location: " . $_SERVER["HTTP_REFERER"]); 
?>