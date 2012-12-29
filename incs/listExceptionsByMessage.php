<?php
	$filter = mysql_real_escape_string(utf8_decode($_GET["filter"]));
	$appid = mysql_real_escape_string($_GET["appid"]);
	$fixed = mysql_real_escape_string($_GET["fixed"]);
	
	$result = mysql_query("SELECT * FROM exceptions WHERE `ExceptionMessage`='$filter' AND `App`='$appid' AND `Fixed`='$fixed'") or die(mysql_error());
	
	$ids = array();
	$dates = array();
	$versions = array();
	$frameworks = array();
	$oss = array();
	$msgs = array();
	$inners = array();
	$stacks = array();
	$methods = array();
	$userdescs = array();
	
	while($row = mysql_fetch_object($result))
	{
		$id = $row->ID;
		$date = reset(explode(" ", $row->Date));
		$fixed = $row->Fixed;
		$version = $row->Version;
		$framework = $row->NETFramework;
		$os = end(explode(" ", $row->InstalledOS));
		
		$msg = utf8_encode($row->ExceptionMessage);
		$inner = utf8_encode($row->ExceptionInner);
		$stack = utf8_encode($row->StackTrace);
		$method = utf8_encode($row->ErrorMethod);
		$userdesc = utf8_encode($row->UserDescription);
		
		if(!in_array($id, $ids)) {array_push($ids, $id);}
		if(!in_array($date, $dates)) {array_push($dates, $date);}
		if(!in_array($version, $versions)) {array_push($versions, $version);}
		if(!in_array($framework, $frameworks)) {array_push($frameworks, $framework);}
		if(!in_array($os, $oss)) {array_push($oss, $os);}
		
		if(!in_array($msg, $msgs)) {array_push($msgs, $msg);}
		if(!in_array($inner, $inners)) {array_push($inners, $inner);}
		if(!in_array($stack, $stacks)) {array_push($stacks, $stack);}
		if(!in_array($method, $methods)) {array_push($methods, $method);}
		if(!in_array($userdesc, $userdescs)) {array_push($userdescs, $userdesc);}
	}
	
	echo "<h2>Allgemeine Informationen</h2>";
	echo "<table>";
	echo "<tr class=\"head\"><th>IDs</th><th width=\"86\">Daten</th><th>Versionen</th><th>.NET Versionen</th><th>Systeme</th></tr>";
	echo "<tr>";
	
	echo "<td align=\"center\">";
	foreach ($ids as &$val){$val = "<a href=\"?appid=" . $_GET["appid"] . "&id=" . $val . "\">" . $val . "</a>";}
	echo implode(", ", $ids);
	echo "</td>";
	
	echo "<td align=\"center\">";
	foreach ($dates as $val){echo $val . "<br />";}
	echo "</td>";
	
	echo "<td align=\"center\">";
	foreach ($versions as $val){echo $val . "<br />";}
	echo "</td>";
	
	echo "<td align=\"center\">";
	foreach ($frameworks as $val){echo $val . "<br />";}
	echo "</td>";
	
	echo "<td align=\"center\">";
	foreach ($oss as $val){echo $val . "<br />";}
	echo "</td>";
	echo "</tr>\n";
	echo "</table>";
	
	echo "<h2>Detailinformationen</h2>";
	echo "<h3>Fehler-Beschreibung</h3>";
	foreach ($msgs as $val){
		echo "<div class=\"code wrap\">" . $val . "</div>";
	}
	
	echo "<h3>Benutzer-Beschreibungen</h3>";
	foreach ($userdescs as $val){
		echo "<div class=\"code wrap\">" . $val . "</div>";
	}
	
	echo "<h3>Fehler-Details</h3>";
	foreach ($inners as $val){
		echo "<div class=\"code\">" . $val . "</div>";
	}
	
	echo "<h3>Fehler-Stacks</h3>";
	foreach ($stacks as $val){
		echo "<div class=\"code\">" . $val . "</div>";
	}
	
	echo "<h3>Fehler-Methoden</h3>";
	foreach ($methods as $val){
		echo "<div class=\"code\">" . $val . "</div>";
	}
	
?>