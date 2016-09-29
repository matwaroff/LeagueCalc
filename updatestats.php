<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Update Stats</title>
</head>

<body>
	<a href="players.php" style="position: fixed; top:50px; left: 50px;"><input type="button" value="Go Back" style="padding: 20px 10px;" /></a>

<?php  
	include '../dom/simple_html_dom.php';
	
	$hostname = 'localhost';
	$name = 'root';
	$conn = new mysqli($hostname,$name,null,'lol');
	$conn2 = new mysqli($hostname,$name,null,'lol');
	$sql = "SELECT * FROM players WHERE Player_ID BETWEEN " . $_POST['lowupdate'] . " AND " . $_POST['highupdate'] . ";";
	$result = mysqli_query($conn, $sql);
	
	while($row = mysqli_fetch_array($result)){
			$name = $row['Player_Name'];
			$avgKDA = 0;
			$avgKPar = 0;
			$avgGold = 0;
			$avgGPM = 0;
			$avgKS = 0;
			$numrows = 0;
			$url = 'http://lol.esportspedia.com/wiki/' . $name . '/Statistics/2015';
			$data = file_get_html($url);
			
			echo "<h2>" . $name . " -</h2><br />";
			foreach($data->find('tr') as $tr){
				$i = 0;
				
				$statdata = $tr->children(); // Find each stat in row
				if(!strcmp(" Total: ", $statdata[0]->plaintext)){
					$numrows++;
					/*foreach($statdata as $sd){	
							echo $sd->plaintext . " ";
					}echo "<br />";*/
					
					echo $statdata[0];
					$kda = $statdata[8]->innertext;
					$kpar = $statdata[13]->innertext;
					$gold = $statdata[11]->innertext;
					$gpm = $statdata[12]->innertext;
					$ks = $statdata[14]->innertext;
					
					
					
					echo $numrows . " KDA: " . $kda . " - Kill Par.: " . $kpar . " - Gold: " . $gold . " - GPM: " . $gpm . " - KS: " . $ks . " <br />"; 
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

		}
		
	
?>
</body>
</html>