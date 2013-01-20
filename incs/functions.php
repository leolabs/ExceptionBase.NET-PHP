<?
	function tryGet($index){
		if(isset($_GET[$index])){
			return $_GET[$index];
		}else{
			return "";
		}
	}
?>