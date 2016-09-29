<?php
	include '../dom/simple_html_dom.php';
	
	$hostname = 'localhost';
	$name = 'root';
	$conn = new mysqli($hostname,$name,null,'lol');
	$data = file_get_html('http://lol.esportspedia.com/wiki/Players_%28NA%29');
	
	foreach($data->find('td') as $player){
		if($player->class == "ID smwtype_txt"){
			$sql = "INSERT INTO players (Player_Name) VALUES ('" . $player->plaintext . "');";
			$result = mysqli_query($conn, $sql);
			echo $player->plaintext . "<br />";
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script type="text/javascript">
	var a = confirm('Have you emptied the DB?');
	if(a != 0){
		
	}
</script>
</head>

<body>
</body>
</html>