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
		echo "<h1>Nasz system</h1>";
		if(isSet($_POST["wyloguj"])){
				$_SESSION["zalogowany"] = 0;
		}

		if(isSet($_COOKIE["name"])){
			echo "Istnieje ciasteczko o wartości: ", $_COOKIE["name"];
		}
	?>
	<fieldset>
		<legend>LOGOWANIE</legend>
		<form action="logowanie.php" method="post">
			<tr>
				<td>Login:</td>
				<td>
					<input type="text" name="login">
				</td>
			</tr>
			<br>
			<tr>
				<td>Hasło:</td>
				<td>
					<input type="password" name="haslo">
				</td>
			</tr>
			<br>
			<tr>
				<td colspan="2">
					<input type="submit" value="Zaloguj" name="zaloguj">
				</td>
			</tr>
		</form>
	</fieldset>
	<fieldset>
		<legend>COOKIES</legend>
		<form action="cookie.php" method="get">
			<tr>
				<td>Czas:</td>
				<td>
					<input type="number" name="czas">
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="submit" value="Utwórz Cookie" name="utworzCookie">
				</td>
			</tr>
		</form>
	</fieldset>
	<a href="user.php">Użytkownik</a>
</body>

</html>