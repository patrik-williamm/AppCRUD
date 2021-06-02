<?php
// $page = $_GET['page'];

// if ($page=='mata_pelajaran') {
//   include 'modul/mata_pelajaran/mataPelajaran.php';
// }
// elseif ($page=='kelas') {
// 	include 'modul/kelas/Kelas.php';
// } 
// elseif ($page=='guru') {
// 	include 'modul/Guru/guru.php';
// }
// else{   
// 	include 'modul/home/home.php';  
// }

if (isset($_GET['page'])) {
	$page = $_GET['page'];

	if ($page == 'mata_pelajaran') {
		require_once 'modul/mata_pelajaran/mataPelajaran.php';
	}elseif ($page=='kelas') {
		require_once 'modul/kelas/Kelas.php';	
	}elseif ($page=='guru') {
		require_once 'modul/Guru/guru.php';
	}else {
		require_once 'modul/home/home.php';  
	}
}else{
	die("...");
}