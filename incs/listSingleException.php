<?php
	$id = $_GET["id"];
	$appid = $_GET["appid"];
	
	$result = mysql_query("SELECT * FROM exceptions WHERE `ID`='$id' AND `App`='$appid'") or die(mysql_error());
	
	while($row = mysql_fetch_object($result))
	{
		$date = explode(" ", $row->Date);
		$fixed = $row->Fixed;
		$version = $row->Version;
		$framework = $row->NETFramework;
		$os = explode(" ", $row->InstalledOS);
		
		$msg = utf8_encode($row->ExceptionMessage);
		$inner = utf8_encode($row->ExceptionInner);
		$stack = utf8_encode($row->StackTrace);
		$method = utf8_encode($row->ErrorMethod);
		$userdesc = utf8_encode($row->UserDescription);
		
		echo "<h2>Allgemeine Informationen</h2>";
		echo "<table>";
		echo "<tr class=\"head\"><th width=\"24\">&nbsp</th><th>ID</th><th width=\"86\">Datum</th><th>Version</th><th>.NET Version</th><th>System</th></tr>";
		echo "<tr>";
		echo "<td align=\"center\" class=\"status_$fixed\"><a href=\"/changeStatus.php?id=" . $id . "&oldstatus=" . $fixed . "\"></a></td>";
		echo "<td align=\"center\">" . $id . "</td>";
		echo "<td align=\"center\">" . $date[0] . "</td>";
		echo "<td align=\"center\">" . $version . "</td>";
		echo "<td align=\"center\">" . $framework . "</td>";
		echo "<td align=\"center\">" . end($os) . "</td>";
		echo "</tr>\n";
		echo "</table>";
		
		echo "<h2>Detailinformationen</h2>";
		echo "<h3>Fehler-Beschreibung</h3>";
		echo "<div class=\"code wrap\">" . $msg . "</div>";
		echo "<h3>Benutzer-Beschreibung</h3>";
		echo "<div class=\"code wrap\">" . $userdesc . "</div>";
		echo "<h3>Fehler-Details</h3>";
		echo "<div class=\"code\">" . $inner . "</div>";
		echo "<h3>Fehler-Stack</h3>";
		echo "<div class=\"code\">" . $stack . "</div>";
		echo "<h3>Fehler-Methode</h3>";
		echo "<div class=\"code\">" . $method . "</div>";
	}
?>