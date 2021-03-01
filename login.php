<!DOCTYPE html>
<html>
<head>
	<title>Roller sk8</title>
	<?php
	 //include "Classes\LoginClass.php";
	 include_once "Classes\Osztalyok.php";
	 //include "Classes\RegisterClass.php";
	?>
	<link rel="icon" href="hatterVidi/favicon.ico">
</head>
<body>
	<?php
		$login = new Bejelentkezes();
		$login -> Szessonok();
		//$login -> proba();
		if(isset($_POST["action"]) and $_POST["action"]=="cmd_regisztralas")
		{
			$user_insert = new Regisztracio();
			echo $user_insert->Insert($_POST["input_REG_username"],
							 			$_POST["input_REG_password"],
							  			$_POST["input_REG_Cpassword"],
							  			$_POST["input_REG_email"],
							  			$_POST["input_REG_date"]
							  			);
		}
	?>
</body>
<footer>
	
</footer>
</html>