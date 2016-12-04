<?php
session_start();
?>
<html>
<head>
</head>
<body>
<?php

$nazwa = $_POST['nazwaK'];
if (IsSet($_POST['dir'])) {
	echo "NAzwa: " . $nazwa . " !!";
mkdir($_POST['nazwaK']);
//echo '<meta http-equiv="refresh" content="1; URL=cloud.php">';
header("Location: cloud.php");
}

?>
<form method="katalog" >
Wpisz nazwę katalogu:<input type="text" name="nazwaK" maxlength="20" size="20">
<input type="submit" name="dir" value="Utwórz"/>
</form>
</body>
</html>