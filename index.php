<?php
session_start();

if(empty($_SESSION["zalogowany"]))$_SESSION["zalogowany"]=0;
if($_GET["wyloguj"]=="tak"){$_SESSION["zalogowany"]=0;echo "Zostałeś wylogowany z serwisu <br>";}
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<BODY>
Formularz logowania
<form method="post" action="weryfikuj.php">
Login:<input type="text" name="user" maxlength="20" size="20"><br>
Hasło:<input type="password" name="pass" maxlength="20" size="20"><br>
<br><a href="rejestracja.php">Rejestracja</a></p>
<input type="submit" value="Zaloguj"/>
</form>
</BODY>
</HTML>