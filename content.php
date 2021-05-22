<?php
$page =isset($_GET['page']);

if ($page=='mata_pelajaran') {
  include 'modul/mata_pelajaran/mataPelajaran.php';
}
elseif ($page=='kelas') {
	include 'modul/kelas/Kelas.php';
} 
elseif ($page=='guru') {
	include 'modul/Guru/guru.php';
}
else{   
	include 'modul/home/home.php';  
}
