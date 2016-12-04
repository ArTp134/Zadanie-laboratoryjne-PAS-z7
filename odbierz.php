<?php
session_start();
$dir = $_SESSION['dir'];
	if (is_uploaded_file($_FILES['plik']['tmp_name'])) 
	{
		echo 'Odebrano plik: '.$_FILES['plik']['name'].'<br/>';
		move_uploaded_file($_FILES['plik']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'Sebastian/z7/'.$dir.'/'.$_FILES['plik']['name']);
	} 
	else 
	{
		echo 'Błąd przy przesyłaniu danych!';
	} 
echo '<meta http-equiv="refresh" content="1; URL=cloud.php">';
?>