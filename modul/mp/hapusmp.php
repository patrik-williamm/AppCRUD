<?php
if (!$_SESSION['email'] && !$_SESSION['nama']) {
	header('location:index.php');
}

$id_mp = end($_GET);
//var_dump($id_mp); die();

$hapus = hapusdata($id_mp);