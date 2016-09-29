<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Update Teams</title>
</head>

<body>
<a href="players.php" style="position: fixed; top:50px; left: 50px;"><input type="button" value="Go Back" style="padding: 20px 10px;" /></a>

<?php  
	include '../dom/simple_html_dom.php';
	
	$hostname = 'localhost';
	$name = 'root';
	$conn = new mysqli($hostname,$name,null,'lol');
	$conn2 = new mysqli($hostname,$name,null,'lol');
	$sql = "SELECT * FROM teams;";
	$result = mysqli_query($conn, $sql);
	
	$html = file_get_html("http://lol.esportspedia.com/wiki/Portal:Teams/America");
	
	while($row = mysqli_fetch_array($result)){
			$id = $row['Team_ID'];
			$name = $row['TeamName'];
			
			echo "<h2>" . $name . " -</h2><br />";
			foreach($html->find('table') as $table){
				$i = 0;
				foreach($table->find('tr') as $row){
					$teamdata = $row->children();
					echo $teamdata[]->plaintext . "<br />";
				}
			}
	}
				/*
				$statdata = $tr->children();
					$numrows++;
					/*foreach($statdata as $sd){	
							echo $sd->plaintext . " ";
					}echo "<br />";
					
					echo $statdata[0];
					$kda = $statdata[8]->innertext;
					$kpar = $statdata[13]->innertext;
					$gold = $statdata[11]->innertext;
					$gpm = $statdata[12]->innertext;
					$ks = $statdata[14]->innertext;
					
					
					
					echo $numrows . " KDA: " . $kda . " - Kill Par.: " . $kpar . " - Gold: " . $gold . " - GPM: " . $gpm . " <br />"; 
					$avgKDA += $kda;
					$avgKPar += $kpar;
					$avgGold += $gold;
					$avgGPM += $gpm;
					$avgKS += $ks;
				
				}
			}
			if($numrows != 0){
				$avgKDA = round($avgKDA / $numrows, 2);
				$avgKPar = round($avgKPar / $numrows, 2);
				$avgGold = round($avgGold / $numrows, 2);
				$avgGPM = round($avgGPM / $numrows, 2);
				$avgKS = round($avgKS / $numrows, 2);
			}
			$updatesql = "UPDATE players SET KDA=" . $avgKDA . ", KillParticipation=" . $avgKPar . ", GoldAvg=" . $avgGold . ", GPM=" . $avgGPM . ", KillShare=" . $avgKS . " WHERE Player_Name='" . $name . "';";
			echo "<b>AVG KDA:</b> " . $avgKDA . " <b>AVG KPAR:</b> " . $avgKPar . "% <b>AVG Gold:</b> " . $avgGold . "k <b>AVG GPM:</b> " . $avgGPM . " <b>AVG KS:</b>" . $avgKS;
			$updateresult = mysqli_query($conn2, $updatesql);
			if($updateresult){
				echo '<strong style="color:green;">Updated Successfully</strong>';
			}else{
				echo '<style style="color:red;">FAILED</style>';
			}

		}*/
		
	
?>
</body>
</html>