
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
	#teamstable,th{

		font-family:sans-serif;
		
	}
	h2{
		font-family: HunDin;
	}
	@font-face{
		font-family: Optimus;
		src: url(fonts/OptimusPrinceps.ttf);
	}
	@font-face{
		font-family: HunDin;
		src: url(fonts/HunDin.ttf);
	}
	td{
		border-left: 1px solid grey;
		border-right: 1px solid grey;
		border-bottom: 1px solid grey;
		font-family: sans-serif;
	}
	.even{
	}
	.odd{

	}
	.head{

	}
</style>
</head>

<body>
	<h2>Teams</h2>
	<table id="teamstable">
		<tr class="head">
        	<th>ID</th>
        	<th>Team Name:</th>
            <th>Top</th>
            <th>Jungler</th>
            <th>Mid</th>
            <th>ADC</th>
            <th>Support</th>
         </tr>
<?php
	$server = 'localhost';
	$port = 3306;
	$user = 'root';
	$conn = new mysqli($server, $user, NULL, "lol");
	
	if(isset($_POST['updateplayers'])){
			$topid = $_POST['topid'];
			$junglerid = $_POST['junglerid'];
			$midid = $_POST['midid'];
			$adcid = $_POST['adcid'];
			$supportid = $_POST['supportid']; 
			$teamid = $_POST['teamid'];
			$sql = "UPDATE teams SET TopID=" . $topid . ", JunglerID=" . $junglerid . ", MidID=" . $midid . ", ADCID=" . $adcid . ", SupportID=" . $supportid . " WHERE Team_ID=" . $teamid . ";";
			mysqli_query($conn, $sql);
	}

	
	$sql = "SELECT * FROM teams;";
	$result = mysqli_query($conn, $sql);
	$rowcount = 0;
	while($row = mysqli_fetch_array($result)){
		$teamid = $row['Team_ID'];
		$teamname = $row['TeamName'];
		$Top = $row['TopID'];
		$Jungler = $row['JunglerID'];
		$Mid = $row['MidID'];
		$ADC = $row['ADCID'];
		$Support = $row['SupportID'];
		$rowcount++;
		
		if($rowcount % 2 == 0){
			echo "<tr class='even'>";
		}else{
			echo "<tr class='odd'>";
		}
		echo "<td>" . $teamid . "</td><td><b>" . $teamname . "</b></td><td>" . getName($Top) . "</td><td>" . getName($Jungler) . "</td><td>" . getName($Mid) . "</td><td>" . getName($ADC) . "</td><td>" . getName($Support) . "</td></tr>";
		
	}
	
	function getName($PlayerID){
		$server = 'localhost';
		$port = 3306;
		$user = "root";
		$mysql = new mysqli($server, $user, NULL, "lol");
			
		$sql2 = "SELECT Player_Name FROM players WHERE Player_ID=" . $PlayerID . ";";
		$result2 = mysqli_query($mysql, $sql2);
		$row2 = mysqli_fetch_array($result2);
		$name = $row2['Player_Name'];
		return $name;
	}
?>
</table>
</body>
</html>