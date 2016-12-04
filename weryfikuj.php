<?php
session_start();
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</HEAD>
<BODY>
<?php
 $user=$_POST['user'];
 $pass=$_POST['pass'];
 $servername = "localhost";
 $username = "21756671_15";
 $password = "zaq1@WSX";
 $dbname = "21756671_15";
 $conn = mysql_connect($servername, $username, $password, $dbname);
 mysql_select_db($dbname);
 if(!conn) { echo "Błąd"; } 
 $sql = "SELECT * FROM users WHERE name='$user'";
 $result = mysql_query($sql);
 $rekord = mysql_fetch_array($result);
 if(!$rekord)
{
 mysql_close($conn);
 echo "Brak użytkownika o takim loginie !";
 }
else
 { 
 if($rekord['pass']==$pass)
 {
	//echo "Logowanie Ok";
	$insert = "INSERT INTO logi (user,status) VALUES ('$user', 'zalogowany');";
	$sql1 = mysql_query($insert);
	$_SESSION['user'] = $user;
	$_SESSION['dir'] = $user;
	echo '<meta http-equiv="refresh" content="1; URL=cloud.php">';
 }
 else
 {
	$insert1 = "INSERT INTO logi (user,status) VALUES ('$user', 'blad logowania');";
	$sql2 = mysql_query($insert1);
	mysql_close($conn);
	echo '<p style="padding-top:10px;color:red" ;="">Błąd podczas logowania do systemu<br>';
	echo '<a href="index.php" style="">Wróć do formularza</a></p>';	
 }
}
?>
</BODY>
</HTML>