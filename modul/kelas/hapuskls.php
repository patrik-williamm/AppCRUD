<?php
if (!$_SESSION['email'] && !$_SESSION['nama']) {
	header('location:index.php');
}
ob_start();

if (isset($_GET['delete'])) {
	$dlt = $_GET['delete'];
}else{
	$dlt ='';
}

$hapus = hapusdatakls($dlt);
