<?
	try{
		$count = mysql_num_rows(mysql_query("SELECT ID FROM exceptions WHERE `Fixed`='0'"));
	}catch (Exception $e) {
		$count = "0";
	}
	echo $count;
?>