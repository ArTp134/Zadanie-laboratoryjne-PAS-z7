<?php
session_start();

$nazwa = $_SESSION['local']."/".$_POST['nazwa'];
mkdir($nazwa);
echo '<meta http-equiv="refresh" content="1; URL=cloud.php">';
?>