<?php
	session_start();
	$link = mysqli_connect("localhost", "scott", "tiger", "instytut");
	if (!$link) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}
	$sql = "SELECT * FROM pracownicy";
	$result = $link->query($sql);
	foreach ($result as $v) {
		echo $v["ID_PRAC"]." ".$v["NAZWISKO"]."<br/>";
	}
	$result->free();
	$link->close();
	echo "<a href=\"form06_post.php\">Dodaj</a>";
	
	if(isSet($_SESSION['success']) && $_SESSION['success'] == 1){
		printf("<br>Query succeeded\n");
		$_SESSION['success'] = 0;
	}
?>