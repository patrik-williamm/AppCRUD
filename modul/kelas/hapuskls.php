<?php
ob_start();
if (isset($_GET['delete'])) {
	$dlt = $_GET['delete'];
}else{
	$dlt ='';
}

$hapus = hapusdatakls($dlt);
