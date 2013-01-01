<?php session_start(); ?>

<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="utf-8">
        <title>Login - Exception Tracker</title>
        <style>
            ::-moz-selection {
                background: #b3d4fc;
                text-shadow: none;
            }

            ::selection {
                background: #b3d4fc;
                text-shadow: none;
            }

            html {
                padding: 30px 10px;
                font-size: 20px;
                line-height: 1.4;
                color: #737373;
                background: #f0f0f0;
                -webkit-text-size-adjust: 100%;
                -ms-text-size-adjust: 100%;
            }

            html,
            input {
                font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            }

            body {
                max-width: 250px;
                _width: 250px;
                padding: 20px;
                border: 1px solid #b3b3b3;
                border-radius: 4px;
                margin: 0 auto;
                box-shadow: 0 1px 10px #a7a7a7, inset 0 1px 0 #fff;
                background: #fcfcfc;
            }

            h1 {
                margin: 0px;
				margin-bottom: 20px;
                font-size: 26px;
                text-align: center;
            }

            h1 span {
                color: #bbb;
            }

            h3 {
                margin: 1.5em 0 0.5em;
            }

            p {
                margin: 1em 0;
				margin-top: -10px;
				font-size: 16px;
            }

            ul {
                padding: 0 0 0 40px;
                margin: 1em 0;
            }

            .container {
                max-width: 380px;
                _width: 380px;
                margin: 0 auto;
            }

            form {
                margin: 0;
            }

            .form-wm-qt,
            .form-wm-sb {
                border: 1px solid #bbb;
                font-size: 16px;
                line-height: normal;
                vertical-align: top;
                color: #444;
                border-radius: 2px;
            }

            .form-wm-qt {
				display: block;
				width: 238px;
                height: 20px;
                padding: 5px;
                margin-bottom: 20px;
                box-shadow: inset 0 1px 1px #ccc;
            }

            .form-wm-sb {
                display: inline-block;
                height: 32px;
                padding: 0 10px;
                margin: 0;
                white-space: nowrap;
                cursor: pointer;
                background-color: #f5f5f5;
                background-image: -webkit-linear-gradient(rgba(255,255,255,0), #f1f1f1);
                background-image: -moz-linear-gradient(rgba(255,255,255,0), #f1f1f1);
                background-image: -ms-linear-gradient(rgba(255,255,255,0), #f1f1f1);
                background-image: -o-linear-gradient(rgba(255,255,255,0), #f1f1f1);
                -webkit-appearance: none;
                -moz-appearance: none;
                appearance: none;
                *overflow: visible;
                *display: inline;
                *zoom: 1;
            }

            .form-wm-sb:hover,
            .form-wm-sb:focus {
                border-color: #aaa;
                box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
                background-color: #f8f8f8;
            }

            .form-wm-qt:hover,
            .form-wm-qt:focus {
                border-color: #105cb6;
                outline: 0;
                color: #222;
            }

            input::-moz-focus-inner {
                padding: 0;
                border: 0;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h1>ExceptionBase.NET</h1>
            <?php
				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					$username = mysql_real_escape_string($_POST['username']);
					$password = mysql_real_escape_string($_POST['password']);
					
					include("incs/database.php");
					
					$result = mysql_query("SELECT * FROM users WHERE `Username`='$username'");
					
					$row = mysql_fetch_object($result);
					
					if($row->PasswordHash == crypt($password, $crypto)){
						$_SESSION['login'] = true;
						$_SESSION['username'] = $username;
						header('Location: /index.php');
						exit;
					}else{
						echo "<p>Der Benutzername oder das Passwort sind inkorrekt.</p>";
					}
				}
				
				if ($_SESSION["login"]){header('Location: http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . "/index.php");}
			?>
			<form method="post" action="login.php">
				<input type="text" placeholder="Benutzername" name="username" class="form-wm-qt">
				<input type="password" placeholder="Passwort" name="password" class="form-wm-qt">
				<input type="submit" value="Anmelden" class="form-wm-sb" />
			</form>
        </div>
    </body>
</html>