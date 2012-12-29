<?php
	echo "<table>";
	echo "<tr class=\"head\"><th>Fehler</th><th>Anzahl</th></tr>";
	
	$appid = $_GET["appid"];
	
	if(isset($_GET["fixed"])){
		$fixed = $_GET["fixed"];
	}else{
		$fixed = "0";
	}
	
	$result = mysql_query("SELECT * FROM exceptions WHERE `Fixed`='$fixed' AND `App`='$appid'") or die(mysql_error());
	
	$results = array();
	$count = array();
	
	while($row = mysql_fetch_object($result))
	{
		$msg = utf8_encode($row->ExceptionMessage);
		if(!in_array($msg, $results)){
			array_push($results, $msg);
		}
		
		array_push($count, $msg);
	}
	
	$counter = array_count_values($count);
	
	foreach ($results as $value) {
		echo "<tr>";
		
		echo "<td> <a href=\"?appid=" . $_GET["appid"] . "&sort=" . $_GET["sort"] . "&fixed=" . $_GET["fixed"] . "&filter=" . str_replace("\"", "%22", $value) . "\">" . $value . "</a></td>";
		echo "<td align=\"center\">" . $counter[$value] . "</td>";
		
		echo "</tr>\n";
	}
	
	echo "</table>";
?>