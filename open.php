<?php
session_start();

if($_SESSION["zalogowany"]!=1){
	echo '<meta http-equiv="refresh" content="1; URL=index.php">';
}else {
echo '<a href="cloud.php">Powrot</a><br>';
$path = $_SESSION['local'] . "/" . $_GET['opendir'];

chdir($path);
$_SESSION['local'] = getcwd();
$files = scandir('.');
foreach($files as $file) {
    if($file == '.' || $file == '..') 
	{
		continue;
	}
	
	if(is_dir($file))
	{
		print '<b>' . $file . '</b> <br>';
	}else {
		print $file ?><a href="pobierz.php?download=<?php echo "$file" ?>">  Pobierz</a> <br><?php ;
	}
}

include 'wyslij.html';
include 'katalog.html';
}
?>