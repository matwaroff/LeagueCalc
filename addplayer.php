<?php
	$server = 'localhost';
	$port = 3306;
	$user = 'root';
	if($conn = new mysqli($server, $user, NULL, "lol")){
	
	if(isset($_POST['player'])){
	$sql = "INSERT INTO players (Player_Name, KDA, KillParticipation, CSDif10, CSDif20) VALUES ('" . $_POST['namein'] . "', " . $_POST['KDA'] . ", " . $_POST['KillParticipation'] . ", .5, .5);";
	$result = mysqli_query($conn, $sql);
	echo($result);
	}
	}
?>