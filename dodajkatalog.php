<?php
session_start();

$nazwa = $_SESSION['user']."/".$_POST['nazwa'];
echo "U :". $nazwa;
mkdir($nazwa);
//echo '<meta http-equiv="refresh" content="1; URL=cloud.php">';
?>