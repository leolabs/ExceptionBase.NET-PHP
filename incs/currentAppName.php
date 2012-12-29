<?php
	$appid = $_GET["appid"];
	$result = mysql_query("SELECT * FROM applications WHERE `ID`='$appid'") or die(mysql_error());
	$app = "";
	
	while($row = mysql_fetch_object($result)){$app = $row->Name;}
	echo $app;
?>