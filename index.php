<?php include("incs/checkLogin.php"); include("incs/database.php"); ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>(<? include("incs/unfixedErrorCount.php"); ?>) ExceptionBase.NET</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="css/normalize.min.css">
        <link rel="stylesheet" href="css/main.css">

        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
    </head>
    <body>
        <div id="wrapper">
			<div id="header">
				<h1>ExceptionBase.NET</h1>
				<h2>Fehleranalyse von VB.NET Programmen</h2>
			</div>
			
			<div id="leftFloat">
				<p>Verfügbare Programme:</p>
				<ul>
				<?php include("incs/listAppTable.php"); ?>
				</ul>
			</div>
			
			<div id="rightFloat">
				<? if(!isset($_GET["appid"])){ ?>
					<div id="filter">
						<span style="float: right;">User: <? echo $_SESSION["username"]; ?> | <a href="/logout.php">Logout</a></span>
						<div style="clear: both;"></div>
					</div>
					
					<div id="content">
						<p>Bitte wählen Sie ein Programm aus der Liste der verfügbaren Programme aus, dessen Fehler angezeigt werden sollen.</p>
						<p>Momentan ungelöste Fehler: <? include("incs/unfixedErrorCount.php"); ?></p>
					</div>
				<? } else { ?>
					
					<div id="filter">
						<? if(!isset($_GET["id"]) && !isset($_GET["filter"])) { ?>
							<a href="?">Zurück</a> | (<? if($_GET["sort"] != 1) echo "<b>" ?><a href="?appid=<? echo $_GET["appid"] ?>&fixed=<? echo $_GET["fixed"] ?>&sort=0">Unsortiert</a><? if($_GET["sort"] != 1) echo "</b>" ?> | 
													  <? if($_GET["sort"] == 1) echo "<b>" ?><a href="?appid=<? echo $_GET["appid"] ?>&fixed=<? echo $_GET["fixed"] ?>&sort=1">Sortiert</a><? if($_GET["sort"] == 1) echo "</b>" ?>) |
													 (<? if($_GET["fixed"] != 1) echo "<b>" ?><a href="?appid=<? echo $_GET["appid"] ?>&sort=<? echo $_GET["sort"] ?>&fixed=0">Ungelöst</a><? if($_GET["fixed"] != 1) echo "</b>" ?> | 
													  <? if($_GET["fixed"] == 1) echo "<b>" ?><a href="?appid=<? echo $_GET["appid"] ?>&sort=<? echo $_GET["sort"] ?>&fixed=1">Gelöst</a><? if($_GET["fixed"] == 1) echo "</b>" ?>)
						<? } else { ?>
							<a href="?appid=<? echo $_GET["appid"] ?>&fixed=<? echo $_GET["fixed"] ?>&sort=<? echo $_GET["sort"] ?>">Zurück</a> | Fehler - Detailansicht
						<? } ?>					
						<span style="float: right;">User: <? echo $_SESSION["username"]; ?> | <a href="/logout.php">Logout</a></span>
					</div>
					
					<div id="content">
						<? 
							if(isset($_GET["id"])){
								include("incs/listSingleException.php");
							} else if(isset($_GET["filter"])) {
								include("incs/listExceptionsByMessage.php");
							} else {
								if($_GET["sort"] == 1){
									include("incs/listExceptionsSorted.php");
								}else{
									include("incs/listExceptionsUnsorted.php");
								}
							}
						?>
					</div>
				<? } ?>
			</div>
			
			<div style="clear: both;"></div>
		</div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>
