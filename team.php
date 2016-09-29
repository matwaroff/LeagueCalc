<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Players</title>
</head>

<body>
<div style="float:left;">
	<table border="1">
    	<h2>Players</h2>
    	<tr>
        	<th>ID</th>
            <th>Name</th>
            <th>KDA</th>
            <th>KP</th>
            <th>GoldAvg</th>
            <th>GPM</th>
        </tr>
            <?php
	$server = 'localhost';
	$port = 3306;
	$user = 'root';
	$conn = new mysqli($server, $user, NULL, "lol");
	
	//Add new player
	/*if(isset($_POST['nplayer'])){
		$sql = "INSERT INTO players (Player_Name, KDA, KillParticipation, GoldAvg, GPM) VALUES ('" . $_POST['namein'] . "', " . $_POST['kda'] . ", " . $_POST['kpar'] . ", .5, .5);";
	$result = mysqli_query($conn, $sql);
	}*/
	
	
	$sql = 'SELECT * FROM teams;'; 
	$result = mysqli_query($conn, $sql);
	
	//Find Player
	if(isset($_POST['subfindteam'])){
		/*if(isset($_POST['findpbyname'])){ //Find by Name
			echo"name";
			$addsql = "Player_Name='" . $_POST['findpbyname'] . "';";
		}else if(isset($_POST['findpbyid'])){ //Find by ID
			echo"id";
			$addsql = "Player_ID=" . $_POST['findpbyid'] . ";";
		}*/
		$sql = "SELECT * FROM players WHERE " . $addsql;
		$result = mysqli_query($conn, $sql);
	}
	
	while($row = mysqli_fetch_array($result)){
		$id = $row['Player_ID'];
		$name = $row['Player_Name'];
		$kda = $row['KDA'];
		$killpar = $row['KillParticipation'];
		$csdif10 = $row['GoldAvg'];
		$csdif20 = $row['GPM'];
		
		echo "<tr><td>" . $id . "</td><td>" . $name . "</td><td>" . $kda . "</td><td>" . $killpar . "</td><td>" . $csdif10 . "</td><td>" . $csdif20 . "</td></tr>";
		
	}
	
	
?>
    </table>
    </div>
</body>
</html>