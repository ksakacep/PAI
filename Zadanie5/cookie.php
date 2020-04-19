<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
	<title>PHP</title>
	<meta charset='UTF-8' />
</head>

<body>
	<?php
		require("funkcje.php");

		if(isSet($_GET["utworzCookie"])){
			setcookie("name", "some_val", time() + $_GET["czas"], "/");
			echo "Dodano cookie<br>";
		}
	?>
	<a href="index.php">Wstecz</a>
	<br>
</body>

</html>