<?php
	
	$numteams = 0;
	$server = 'localhost';
	$port = 3306;
	$user = 'root';
	$conn = new mysqli($server, $user, NULL, "lol");
	$N = $_POST['numteam'];
	$matchup = array();
	$team1players = array();
	$team2players = array();
	$p1stats = array();
	$p2stats = array();
	
	$sqladd = "";
	/*
			
		if($i == $N-1){
			$sqladd = $sqladd . "TeamName='" . $teams[$i] . "'";
		}else{
			$sqladd = $sqladd . "TeamName='" . $teams[$i] . "' OR ";	
		}
		echo $numteams . " " . $teams[$i] . "<br />";
		*/
		
	//Initialize team matchups
	for($i = 0; $i < $N; $i++){
		$end = 0;
		if($end == 0){
			$posttext = "team" . $i;
			$matchup[$i] = $_POST[$posttext];
			$sql = "SELECT TopID, JunglerID, MidID, ADCID, SupportID FROM teams WHERE TeamName='" . $matchup[$i] . "';";
			$result = mysqli_query($conn, $sql);
			while($row = mysqli_fetch_array($result)){ //Pulling playerIDs from the team table the teams table
				$Top = $row['TopID'];
				$Jungler = $row['JunglerID'];
				$Mid = $row['MidID'];
				$ADC = $row['ADCID'];
				$Support = $row['SupportID'];
				
				echo "<b>" . $matchup[$i] . "</b><br /><ol>";
				for($j = 0; $j < 5; $j++){
					switch($j){
						case 0:
							$position = "Top:";
							$id = $Top;
							echo "<li><b>" . $position . "</b>&nbsp;" . $id . " " . getName($id) . "</li>";
							break;
						case 1:
							$position = "Jungler:";
							$id = $Jungler;
							echo "<li><b>" . $position . "</b>&nbsp;" . $id . " " . getName($id) . "</li>";
							break;
						case 2:
							$position = "Mid:";
							$id = $Mid;
							echo "<li><b>" . $position . "</b>&nbsp;" . $id . " " . getName($id) . "</li>";
							break;
						case 3:
							$position = "ADC:";
							$id = $ADC;
							echo "<li><b>" . $position . "</b>&nbsp;" . $id . " " . getName($id) . "</li>";
							break;
						case 4:
							$position = "Support:";
							$id = $Support;
							echo "<li><b>" . $position . "</b>&nbsp;" . $id . " " . getName($id) . "</li>";
							break;
					}	//Switch		
				} // inner for loop
				echo "</ol>";
				$end = 1;
				if($end == 1){
					break;
				}
				//End for loop positions
			} // End MYSQL while loop
		}//End Loop Break IF
	} //END Initializing for loop

	/*
	//SQL and Check for Errors
	$sql = "SELECT * FROM teams WHERE " . $sqladd . ";";
	echo $sql;
	$result = mysqli_query($conn, $sql);
	if(mysqli_error($conn)){
		echo mysqli_error($conn);	
	}
	
	while($row = mysqli_fetch_array($result)){
		echo $row['Team_ID'] . $row['TeamName'] . "<br />";
	}
	*/
	for($i = 0; $i < $N; $i+=2){
		matchup($matchup[$i], $matchup[$i+1]);
	}
	
	function matchup($teamA, $teamB){
		$server = 'localhost';
		$port = 3306;
		$user = 'root';
		$mysql = new mysqli($server, $user, NULL, "lol");
		echo "<h2>" . $teamA . " vs " . $teamB . "</h2>";
		
		
		//First team players"
		$sql = "SELECT TopID, JunglerID, MidID, ADCID, SupportID FROM teams WHERE TeamName='" . $teamA . "';";
		$result = mysqli_query($mysql, $sql);
		while($row = mysqli_fetch_array($result)){
			$Top = $row['TopID'];
			$Jungler = $row['JunglerID'];
			$Mid = $row['MidID'];
			$ADC = $row['ADCID'];
			$Support = $row['SupportID'];
			for($i = 0; $i < 5; $i++){
				if($i == 0){
					$team1players[$i] = $Top;
				}else if($i == 1){
					$team1players[$i] = $Jungler;
				}else if($i == 2){
					$team1players[$i] = $Mid;
				}else if($i == 3){
					$team1players[$i] = $ADC;
				}else if($i == 4){
					$team1players[$i] = $Support;
				}
			}
			
		} //END PLAYER 1
		
		//Second team players
		$sql = "SELECT TopID, JunglerID, MidID, ADCID, SupportID FROM teams WHERE TeamName='" . $teamB . "';";
		$result = mysqli_query($mysql, $sql);
		while($row = mysqli_fetch_array($result)){
			$Top = $row['TopID'];
			$Jungler = $row['JunglerID'];
			$Mid = $row['MidID'];
			$ADC = $row['ADCID'];
			$Support = $row['SupportID'];
			for($i = 0; $i < 5; $i++){
				if($i == 0){
					$team2players[$i] = $Top;
				}else if($i == 1){
					$team2players[$i] = $Jungler;
				}else if($i == 2){
					$team2players[$i] = $Mid;
				}else if($i == 3){
					$team2players[$i] = $ADC;
				}else if($i == 4){
					$team2players[$i] = $Support;
				}
			}
			
		} //END PLAYER 2
		
		for($count = 0; $count < 5; $count++){
			if($count == 0)
				echo "<h4>Top:</h4>";
			else if($count == 1)
				echo"<h4>Jungler:</h4>";
			else if($count == 2)
				echo"<h4>Mid:</h4>";
			else if($count == 3)
				echo"<h4>ADC:</h4>";
			else if($count == 4)
				echo"<h4>Support:</h4>";
				
			calculate($team1players[$count], $team2players[$count]);	
		}
		
	}
	
	function calculate($PlayerA, $PlayerB){

		$server = 'localhost';
		$port = 3306;
		$user = 'root';
		$mysql = new mysqli($server, $user, NULL, "lol");
		$wkda = (double)$_POST['kdaweight'] / 100;
		$wkillshare = (double)$_POST['killshareweight'] / 100;
		$wkillpar = (double)$_POST['killparweight'] / 100;
		
		//Player A GET STATS
		echo "<b>" . getName($PlayerA) . "</b> - ";
		$sql = "SELECT KDA, KillParticipation, KillShare FROM players WHERE Player_ID=" . $PlayerA . ";";
		$result = mysqli_query($mysql, $sql);
		while($row = mysqli_fetch_array($result)){
			for($statcount = 0; $statcount < 3; $statcount++){
				if($statcount == 0){
					$p1stats[$statcount] = $row['KDA'];
					echo "<u>KDA:</u> " . $p1stats[$statcount];
				}else if($statcount == 1){
					$p1stats[$statcount] = $row['KillParticipation'];
					echo "<u>Kill Participation:</u> " . $p1stats[$statcount];
				}else if($statcount == 2){
					$p1stats[$statcount] = $row['KillShare'];
					echo "<u>Kill Share:</u> " . $p1stats[$statcount];
				}
				echo " ";	
			}
		}
		echo "<br/>";
		
		//Player B GET STATS
		echo "<b>" . getName($PlayerB) . "</b> - ";
		$sql = "SELECT KDA, KillParticipation, KillShare FROM players WHERE Player_ID=" . $PlayerB . ";";
		$result = mysqli_query($mysql, $sql);
		while($row = mysqli_fetch_array($result)){
			for($statcount = 0; $statcount < 3; $statcount++){
				if($statcount == 0){
					$p2stats[$statcount] = $row['KDA'];
					echo "<u>KDA:</u> " . $p2stats[$statcount];
				}else if($statcount == 1){
					$p2stats[$statcount] = $row['KillParticipation'];
					echo "<u>Kill Participation:</u> " . $p2stats[$statcount];
				}else if($statcount == 2){
					$p2stats[$statcount] = $row['KillShare'];
					echo "<u>Kill Share:</u> " . $p2stats[$statcount];
				}
				echo 	" ";
			}
		}
		echo "<br/>";
		$p1score = (($p1stats[0] / $p2stats[0])*$wkda);
		$p1score += (($p1stats[1] / $p2stats[1])*$wkillpar);
		$p1score += (($p1stats[2] / $p2stats[2])*$wkillshare);
		echo "<b>" . getName($PlayerA) . " Score:</b>" . $p1score . "<br/>";
		$p2score = 1 / $p1score;
		echo "<b>" . getName($PlayerB) . " Score:</b>" . $p2score . "<br/><br/>";
		
		if($p1score > $p2score){
			echo "<span style='color:green;'>Player 1 Wins</span><br />";
		}else{
			echo "<span style='color:green;'>Player 2 Wins</span><br />";
		}
		$sql = "INSERT INTO player_match (Player1, Player2, score1, score2) values (" . $PlayerA . ", " . $PlayerB . ", " .  $p1score . ", " . $p2score . ");";
		$result = mysqli_query($mysql, $sql);

	}
	
	function getName($PlayerID){
		$server = 'localhost';
		$port = 3306;
		$user = "root";
		$mysql = new mysqli($server, $user, NULL, "lol");
			
		$sql = "SELECT Player_Name FROM players WHERE Player_ID=" . $PlayerID . ";";
		$result = mysqli_query($mysql, $sql);
		$row = mysqli_fetch_assoc($result);
		$name = $row['Player_Name'];
		return $name;
	}
	
	function highScore(){
		$server = 'localhost';
		$port = 3306;
		$user = 'root';
		$mysql = new mysqli($server, $user, NULL, "lol");
		
		$sql = "SELECT * FROM player_match;";
		$result = mysqli_query($mysql, $sql);
		$highscore = 0;
		$highid = 0;
		while($row = mysqli_fetch_array($result)){
				if($row['score1'] > $highscore){
					$highscore = $row['score1'];
					$highid = $row['Player1'];	
				}
				if($row['score2'] > $highscore){
					$highscore = $row['score2'];
					$highid = $row['Player2'];	
				}
		}
		
		echo "<h1>HIGHEST RATED PLAYER: " . $highid . " " . getName($highid) . "</h1>";
		
	}
	highScore();
	
	$truncsql = "TRUNCATE player_match;";
	mysqli_query($conn, $truncsql);
	mysqli_close($conn);
?>
