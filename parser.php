<?php
	include '../dom/simple_html_dom.php';
	
	$hostname = 'localhost';
	$name = 'root';
	$conn = new mysqli($hostname,$name,null,'lol');
	$playerstats = array(array());
	

	$data = file_get_html('http://lol.esportspedia.com/wiki/Players_%28NA%29');
	$domain = 'http://lol.esportspedia.com';
	$sql = "SELECT * FROM players";
	
	$result = mysqli_query($conn, $sql);
	
	
	while($row = mysqli_fetch_array($result)){
		$name = $row['Player_Name'];
		$url = 'http://lol.esportspedia.com/wiki/' . $name . '/Statistics/2015';
		$file_headers = @get_headers($url);
		echo $file_headers[0] . $file_headers[1] . "<br / >"; 
		if($file_headers[0] == 'HTTP/1.1 404 Not Found' || $file_headers[0] == 'HTTP/1.0 404 Not Found' || $file_headers[0] == 'HTTP/1.0 301 Moved Permanently') {
    		$exists = false;
			continue;
		}
		else {
    		$exists = true;
		}
		
		if($exists){
			$data = file_get_html($url);
			
			echo $name . " - ";
			foreach($data->find('tfoot') as $tournament){
				foreach($data->find('tr')->children() as $stats){
						echo $stats->plaintext;
						//echo "KDA: " . $kda . "; Gold: " . $gold ."<br/>";
				}
			}
		}else{
			$sql = "DELETE FROM players WHERE Player_Name='" . $name . "';";
			$result = mysqli_query($conn, $sql);
			echo "(" . $row['Player_ID'] . ") " . $name . " DELETED <br / >";	
		}
	}
	
	foreach($data->find('tbody') as $telement){
	
		foreach($data->find('td') as $celement){
			if($celement->style == "text-align:center"){
				
				/*$sql = "INSERT INTO players (Player_Name) values ('" . $element->first_child()->plaintext . "');";
				$result = mysqli_query($conn, $sql);*/
				echo '' . $celement->first_child()->plaintext . '<br />';
			}
		}
	}
// Find all links
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Parser</title>
</head>

<body>
</body>
</html>