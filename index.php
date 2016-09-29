<?

	

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>LoL Home</title>
<style type="text/css">
	form{
		border:1px solid black;
		padding: 15px;
	}
	#main{
		border: 10px groove gold;
		margin-left: auto;
		margin-right: auto;
		width: 400px;
		text-align: center;	
		margin-bottom: 15px;
		background: maroon;
		padding-bottom: 10px;
		}
	#statistics{
		font-size:36px;
		font-weight: bold;
		color: gold;
		text-shadow: 5px 5px 2px rgba(0,0,0, .6);
	}
</style>
</head>

<body>
	<div id="main">
    	<span id="statistics">Statistic Calculator</span><br />
        <div id="nav">
        	<a href="manage.php"><input type="button" value="Manage Players" style="border-radius: 5px;" /></a>
        </div>
    </div>
    
    <iframe src="Calculator/" width="100%" height="550" id="calc" />
</body>
</html>