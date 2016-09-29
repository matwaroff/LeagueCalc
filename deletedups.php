<?php
	$hostname = 'localhost';
	$name = 'root';
	$conn = new mysqli($hostname,$name,null,'lol');
	
	$sql = "SELECT * FROM players WHERE Player_ID BETWEEN 0 AND 300;";
	$result = mysqli_query($conn, $sql);
	
	while($row = mysqli_fetch_array($result)){
			$isdupe = false;
		
			$sql2 = "SELECT * FROM players WHERE Player_Name='" . $row['Player_Name'] . "';";
			$result2 = mysqli_query($conn, $sql2);
			$numrows = mysqli_num_rows($result2);	
			if($numrows > 1){
				$isDupe = true;
				echo "DUPE<br>";
			}else{
				$isdupe = false;
				echo "NO DUPE<br>";
			}
			
			if($isdupe){
				echo "Found Duplicate!<br />";
				$delsql = "DELETE * FROM players WHERE Player_ID<>'" . $row['Player_ID'] . "';";
				$delresult = mysqli_query($conn, $delsql);
				echo "DELETED DUPLICATE: " . $row['Player_Name'] . "<br />"; 
			}
	
			
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>