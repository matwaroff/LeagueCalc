<?

	

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>LoL Management</title>
<style type="text/css">
	@font-face{
		font-family: Assassin;
		src: url(fonts/Assassin.ttf);
	}
	body{
		font-family: sans-serif;
		color: black
		}
	form{
		
		padding: 15px;
	}
	#playerbox{
		width: 625px;
		margin-left: 10px;
		margin-bottom: 20px;
		margin-right: 15px;
		-webkit-column-count:2;
		-moz-column-count:2;
		column-count:2;
		padding: 10px;
		border-radius: 10px;
		border: 5px inset gold;

	}
	#playerbox form{
		text-align:center;
		
		border: 10px groove gold;
		border-radius: 20px;	
	}
	h1{
		font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;	
		color: gold;
	}
	#topnav{
		width: 200px;
		border: 1px solid black;
		height: 50px;
		vertical-align:middle;
		text-align:center;	
	}
	#nav{
		position:fixed;
		top:10px;
		left: 650px;
		background: white;	
	}
	#updateteams{
		width: 650px;
		float: left;
		border-radius: 15px;
		padding: 10px;
		border-radius: 10px;
		border: 5px inset gold;
	}
	input[type='number']{
		width: 70px;		
	}
	#getteam, #teamupdate{
			
	}
	h3{
	}
	
</style>
</head>

<body style="padding-bottom:5px;">

	<a href="http://localhost/lol" id="nav">
    	<div id="topnav">
    		Go Home
    	</div>
    </a>

	<iframe src="players.php" style=" height:1230px; width:600px; float: right;"  name="players"></iframe>
    
    <div id="playerbox" >
        <h1>Manage Players</h1>
        <h3>New Player</h3>
        <form name="player" method="post" action="players.php" target="players">
            <label>Name:</label>
            <input type="text" name="namein" /><br />
            <input type="submit" name="nplayer" value="Create Player" /><br />
            
        </form><br />
        
        <h3>Find Player</h3>
        <form name="findplayerform" method="post" action="players.php" target="players" >
            
            <input type="radio" name="filterby" value="name" />By Name
            <input type="radio" name="filterby" value="id" />By ID<br /> 	
            <label>By Name:</label>
            <input type="text" name="findpbyname" /><br />
            <label>By ID:</label>
            <input type="number" step="1" name="findpbyid" /><br />
            
            <input type="submit" name="findplayer" value="Find Player" />
        </form><br />
    
        <h3>Delete Player w/ No Statistics:</h3>
            <form name="playerwstats" method="post" action="playerswithstats.php" target="new">
            
                <strong style="color:red; size:20px;">Only 100 at a time</strong><br />
                <p style="size:10px;">This will go through a range of players and check if they have new statistics. If not, it will delete the player.</p>
                <label>low bound:</label>
                <input type="text" name="lowbounds" /><br />
                <label>high bound:</label>
                <input type="text" name="highbounds" /><br />
                <input type="submit" value="Find Players W/ Statistics" name="findbounds" />
            </form>
        <br />
        <h3>Update Player Stats</h3>
        <form name="updatestats" method="post" action="updatestats.php" target="players">
            <label>Lower Bound:</label>
            <input type="number" value="0" name="lowupdate" /> <br /> 
            <label>Higher Bound:</label>
            <input type="number" value="5000" name="highupdate" /><br />
            <input type="submit" value="Update Player Stats" /> 
        </form><br />
        
    </div>
    <br />
    
    <div id="updateteams">
    	<h3>Update Teams</h3>
        <form name="getteam" method="post" action='<?php echo $_SERVER['PHP_SELF']; ?>'>
            
		<?php 
			$server = 'localhost';
			$port = 3306;
			$user = 'root';
			$conn = new mysqli($server, $user, NULL, "lol");
			
			$teamid = 1;
			if(isset($_POST['teamid'])){
				$teamid = $_POST['teamid'];
			}
            echo '<label>Team:</label>
        <input type="number" name="teamid" step="1" size="2" value="' . $teamid . '" /><br />
        <input type="submit" name="teamidsub" value="Get Players" width="75" height="100" /><br />
		</form>';
            
            
            if(isset($_POST['teamid'])){
                $sql = "SELECT * FROM teams WHERE Team_ID=" . $_POST['teamid'] . ";";
        		$result = mysqli_query($conn, $sql);
        
				while($row = mysqli_fetch_array($result)){
					$teamid = $row['Team_ID'];
					$teamname = $row['TeamName'];
					$Top = $row['TopID'];
					$Jungler = $row['JunglerID'];
					$Mid = $row['MidID'];
					$ADC = $row['ADCID'];
					$Support = $row['SupportID'];            
        		}
			
                echo'<form name="teamupdate" method="post" action="teams.php" target="teams">
				<label>Top:</label><input type="number" name="topid" value="' . $Top . '" />
                <label>Jungler:</label><input type="number" name="junglerid" value="' . $Jungler . '" />
                <label>Mid:</label><input type="number" name="midid" value="' . $Mid . '" />
                <label>ADC:</label><input type="number" name="adcid" value="' . $ADC . '" />
                <label>Support:</label><input type="number" name="supportid" value="' . $Support . '" /><br />
				<input type="hidden" value="' . $teamid . '" name="teamid" />
                <input type="submit" name="updateplayers" value="Update Players" />
				</form>';
				
                
                
            }
			if(isset($_POST['updateplayers'])){
				$sql = "UPDATE players (TopID, JunglerID, MidID, ADCID, SupportID) values (" . $_POST['topid'] . ", " . $_POST['junglerid'] . ", " . $_POST['midid'] . ", " . $_POST['adcid'] . ", " . $_POST['supportid'] . ") WHERE Team_ID=" . $_POST['teamid'] . ";";
				mysqli_query($conn, $sql);	
			}
        ?>
         </form>
    </div>
    <iframe src="teams.php" style="height:600px; width: 650px; float: left;" name="teams"></iframe>
    
</body>
</html>