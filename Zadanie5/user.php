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

		if(!isset($_SESSION["zalogowany"]) || $_SESSION["zalogowany"] != 1){
			header("Location: index.php");
		}

		if(isset($_POST["upload"])){
			$currentDir = getcwd();
			$uploadDirectory = "/zdjeciaUzytkownikow/";
			$fileName = $_FILES['myfile']['name'];
			$fileSize = $_FILES['myfile']['size'];
			$fileTmpName = $_FILES['myfile']['tmp_name'];
			$fileType = $_FILES['myfile']['type'];

			if($fileName != "" and
				($fileType == 'image/png' or $fileType == 'image/jpeg'
				or $fileType == 'image/JPEG' or $fileType == 'image/PNG'
			))
			{
				$uploadPath = $currentDir . $uploadDirectory . $fileName;
				if(move_uploaded_file($fileTmpName, $uploadPath))
					echo "<img src='zdjeciaUzytkownikow\s16.JPG' alt='Miejsce na obrazek'>";
			}
		}

		echo "Zalogowano: ", $_SESSION["zalogowanyImie"], "<br>";
	?>
	<a href="index.php">Wstecz</a>
	<br>
	<fieldset>
		<legend>UPLOAD</legend>
		<form action='user.php' method='POST' enctype='multipart/form-data'>
			<input name="myfile" type="file">
			<input type="submit" value="Upload File" name="upload">
		</form>
	</fieldset>
	<fieldset>
		<form action="index.php" method="post">
			<tr>
				<td colspan="2">
					<input type="submit" value="Wyloguj" name="wyloguj">
				</td>
			</tr>
		</form>
	</fieldset>
</body>

</html>