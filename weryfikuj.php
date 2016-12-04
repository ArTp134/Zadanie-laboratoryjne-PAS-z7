<?php
session_start();
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</HEAD>
<BODY>
<?php
if($_SESSION["zalogowany"]!=1)
{
	
$user=$_POST['user'];
$pass=$_POST['pass'];
$_SESSION['user'] = $user;
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
	else //jest user
	{ 
		if($rekord['pass']==$pass && $rekord['blokada'] == "nie") //jezeli haslo i brak blokady
		{
			//echo "Logowanie Ok";
			$_SESSION["zalogowany"]=1;
			$insert = "INSERT INTO logi (user,status) VALUES ('$user', 'zalogowany');";
			$sql1 = mysql_query($insert);
			$update = "UPDATE users SET logowanie = '0' WHERE name = '$user';";
			$sql3 = mysql_query($update);
			echo '<meta http-equiv="refresh" content="1; URL=cloud.php">';
		}
		else //zle haslo lub blokada
		{
			if($rekord['logowanie'] < 2){
				$logowanie = $rekord['logowanie'] + 1;
				$update = "UPDATE users SET logowanie = '$logowanie' WHERE name = '$user';";
				$sql3 = mysql_query($update);
			}else 
				{
					$update1 = "UPDATE users SET blokada = 'tak' WHERE name = '$user';";
					$sql4 = mysql_query($update1);
				}
		$insert1 = "INSERT INTO logi (user,status) VALUES ('$user', 'blad logowania');";
		$sql2 = mysql_query($insert1);
		echo '<p style="padding-top:10px;color:red" ;="">Błąd podczas logowania do systemu <br>';
		if($rekord['blokada'] == "tak"){
			$blokada = $rekord['blokada'];
			echo '<p style="padding-top:10px;color:red" ;="">Konto zablokowane: ',$blokada ,'<br>';
		}
		mysql_close($conn);
		echo '<a href="index.php" style="">Wróć do formularza</a></p>';	
		}
	}
}else echo '<meta http-equiv="refresh" content="1; URL=index.php">';;
?>
</BODY>
</HTML>