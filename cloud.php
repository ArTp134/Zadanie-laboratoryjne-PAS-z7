<?php
session_start();
include 'ostlog.php';
echo "\n";
$dir = $_SESSION['user'];
chdir($dir);
$_SESSION['local'] = getcwd();
$output = shell_exec('ls');
echo "<pre>$output</pre>";
include 'wyslij.html';
include 'katalog.html';
include 'pobierz.php';
?>