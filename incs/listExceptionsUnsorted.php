<?php
	echo "<table>";
	echo "<tr class=\"head\"><th>ID</th><th width=\"86\">Datum</th><th>Fehler</th><th>Version</th></tr>";

	if(isset($_GET["fixed"])){
		$fixed = mysql_real_escape_string($_GET["fixed"]);
	}else{
		$fixed = "0";
	}
	
	$appid = mysql_real_escape_string($_GET["appid"]);
	
	$result = mysql_query("SELECT * FROM exceptions WHERE `Fixed`='$fixed' AND `App`='$appid'") or die(mysql_error());
	
	while($row = mysql_fetch_object($result))
	{
		$datetime = explode(" ", $row->Date);
		$version = explode(" ", $row->Version);
		echo "<tr>";
		echo "<td><a href=\"?appid=" . $_GET["appid"] . "&sort=" . $_GET["sort"] . "&fixed=" . $_GET["fixed"] . "&id=" . $row->ID . "\">" . $row->ID . "</a></td>";
		echo "<td align=\"center\">" . $datetime[0] . "</td>";
		echo "<td><a href=\"?appid=" . $_GET["appid"] . "&sort=" . $_GET["sort"] . "&fixed=" . $_GET["fixed"] . "&id=" . $row->ID . "\">" . utf8_encode($row->ExceptionMessage) . "</a></td>";
		echo "<td align=\"center\">" . $version[0] . "</td>";
		echo "</tr>\n";
	}
	
	echo "</table>";
?>