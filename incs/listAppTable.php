<?php
	$result = mysql_query("SELECT * FROM applications") or die(mysql_error());
	
	while($row = mysql_fetch_object($result))
	{
		try {
			$count = mysql_num_rows(mysql_query("SELECT App FROM exceptions WHERE `App`='" . $row->ID . "' AND `Fixed`='0'"));
		}catch (Exception $e) {
			$count = "0";
		}
		
		if($_GET["appid"] == $row->ID) echo "<b>";
		echo "<li><a href=\"?appid=" . $row->ID . "\">[" . $row->ID . "] " . $row->Name . " ("  . $count .  ")</a></li>\n";
		if($_GET["appid"] == $row->ID) echo "</b>";
	}
?>