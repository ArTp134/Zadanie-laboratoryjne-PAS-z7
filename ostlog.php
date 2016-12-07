<?php
session_start();
		
	$user=$_SESSION['user'];
	$servername = "localhost";
	$username = "********";
	$password = "********";
	$dbname = "********";
	$conn = mysql_connect($servername, $username, $password, $dbname);
	mysql_select_db($dbname);
	$query = "SELECT * FROM logi WHERE user = '$user' AND status = 'blad logowania' ORDER BY IDL DESC LIMIT 1";
	$sql = mysql_query($query);
	$rows = mysql_fetch_array($sql);
	if( $rows )
	{
		echo "Ostatnie błedne logowanie: " . $rows['data'];
	}
?>