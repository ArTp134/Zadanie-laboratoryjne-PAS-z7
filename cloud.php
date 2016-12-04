<?php
session_start();

if($_SESSION["zalogowany"]!=1 /*OR empty($_SESSION["zalogowany"]*/){
	echo '<meta http-equiv="refresh" content="1; URL=index.php">';
}else {
?>
<a href='index.php?wyloguj=tak'>wyloguj się</a><br>
<?php
include 'ostlog.php';
echo "<br>";
$dir = $_SESSION['user'];
chdir($dir);
$_SESSION['local'] = getcwd();
$files = scandir('.');
foreach($files as $file) {
    if($file == '.' || $file == '..') 
	{
		continue;
	}
	
	if(is_dir($file))
	{
		print '<b>' . $file . '</b>'  ?><a href="open.php?opendir=<?php echo "$file"?>">  Wejdz do katalogu</a> <br><?php ;
	}else {
		print $file ?><a href="pobierz.php?download=<?php echo "$file" ?>">  Pobierz</a> <br><?php ;
	}
}
'<br>';
include 'wyslij.html';
include 'katalog.html';
}
?>