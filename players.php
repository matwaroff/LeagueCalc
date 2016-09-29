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
            <th>KillShare</th>
        </tr>
            <?php
	$server = 'localhost';
	$port = 3306;
	$user = 'root';
	$conn = new mysqli($server, $user, NULL, "lol");
	
	//Add new player
	if(isset($_POST['namein'])){
		$sql = "INSERT INTO players (Player_Name) VALUES ('" . $_POST['namein'] . "');";
	$result = mysqli_query($conn, $sql);
	}
	
	
	
	$sql = 'SELECT * FROM players'; 
	$result = mysqli_query($conn, $sql);
	
	//Find Player
	if(isset($_POST['findplayer'])){
		if(!strcmp($_POST['filterby'], "name")){ //Find by Name
			$addsql = "Player_Name='" . $_POST['findpbyname'] . "';";
		}else if(!strcmp($_POST['filterby'], "id")){ //Find by ID
			$addsql = "Player_ID=" . $_POST['findpbyid'] . ";";
		}
		$sql = "SELECT * FROM players WHERE " . $addsql;
		$result = mysqli_query($conn, $sql);
	}
	while($row = mysqli_fetch_array($result)){
		$id = $row['Player_ID'];
		$name = $row['Player_Name'];
		$kda = $row['KDA'];
		$killpar = $row['KillParticipation'];
		$avggold = $row['GoldAvg'];
		$gpm = $row['GPM'];
		$killshare = $row['KillShare'];
		
		echo "<tr><td>" . $id . "</td><td>" . $name . "</td><td>" . $kda . "</td><td>" . $killpar . "</td><td>" . $avggold . "</td><td>" . $gpm . "</td><td>" . $killshare . "</td></tr>";
		
	}
	
	
?>
    </table>
    </div>
</body>
</html>