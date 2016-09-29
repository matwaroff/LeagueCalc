<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Calculator</title>
<style type="text/css">
	#top{
		text-align:center;
	}
	#teams{
		column-count:2;
		height: 50px;	
	}
	#games{
		border: 1px solid black;
		width: 500px;
		padding: 10px;
	}
	#weights{
		margin-top: 10px;
	}
</style>
<script type="application/javascript">

</script>
</head>

<body>

<div id="top">
	<h1>Calculator</h1>
	<form name="teams" id="teams" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<h3>Choose Teams Playing:</h3>
    	<?php
		$server = 'localhost';
		$port = 3306;
		$user = 'root';
		$conn = new mysqli($server, $user, NULL, "lol");
		
		$sql = "SELECT * FROM teams;";
		$result = mysqli_query($conn, $sql);
		while($row = mysqli_fetch_array($result)){
			echo "<input type='checkbox' name='teams[]' value='" . $row['TeamName'] . "'> " . $row['Team_ID'] . " " . $row['TeamName'] . "</input><br />";
		}
		?>
	
        <input type='submit' value='Set Up Games' />
	</form>
    
</div>
<?php
	if(isset($_POST['teams'])){
		$N = count($_POST['teams']);
		$teams = $_POST['teams'];
		$numteam = 0;
		echo "<form name='games' method='post' action='calculate.php' id='games'>";
		echo "<h3>Choose Matchups</h3>";
		for($game = 0; $game < $N/2; $game++){
			echo "Game " . $game . ": ";
			for($opponent = 0; $opponent < 2; $opponent++){
				echo "<select name='team" . $numteam . "'>";
				for($k = 0; $k < $N; $k++){
					echo "<option value='" . $teams[$k] . "'>" . $teams[$k] . "</option>";
				}
				if($opponent == 1){
					echo "</select><br />";
				}else{
					echo "</select> vs. ";
				}
				$numteam++;
			}
		}
		echo "<div id='weights'><label>KDA:</label>
    	<input name='kdaweight' type='number' step = '1' value='50' />&#37<br />
        <label>Kill Participation:</label>
        <input name='killparweight' type='number' step = '1' value='30' />&#37<br /> 	
        <label>KillShare</label>
		<input type='hidden' value='" . $numteam . "' name='numteam' />
    	<input name='killshareweight' type='number' step = '1' value='20' />&#37<br /></div>
		";
		echo "<input type='submit' value='Calculate' onclick=''></form>";
	}
?>
        
</body>
</html>