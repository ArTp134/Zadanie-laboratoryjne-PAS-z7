<?php
session_start();
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<BODY>
<?php
		$servername = "localhost";
		$username = "21756671_15";
		$password = "zaq1@WSX";
		$dbname = "21756671_15";
		$conn = mysql_connect($servername, $username, $password, $dbname);
		mysql_select_db($dbname);
		$user = $_POST['user'];
		$pass = $_POST['pass'];
if (IsSet($_POST['rejestruj'])) {
		$query = "SELECT * FROM users WHERE name = '$user'";
		$sql = mysql_query($query);
		$rows = mysql_num_rows($sql);
		if( $rows == 1)
		{
			echo "<script>
			alert('Istnieje użytkownik o takiej nazwie !');
			</script>";
		}
		elseif ($row == 0)
		{
			$insert = "INSERT INTO users (name, pass, blokada) VALUES ('$user', '$pass', 'nie');";
			$sql1 = mysql_query($insert);
			mkdir("$user");
			echo '<meta http-equiv="refresh" content="1; URL=index.php">';
		}
mysql_close($conn);		
}
?>
Formularz rejestracji
<br>
<a href="index.php" style="">Wróć do formularza logowania</a></p>
<form method="post">
Podaj login:<input type="text" name="user" maxlength="20" size="20"><br>
Podaj hasło:<input type="password" name="pass" maxlength="20" size="20"><br>
<input type="submit" name="rejestruj" value="Rejestruj"/>
</form>
</BODY>
</HTML>