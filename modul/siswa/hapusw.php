<?php
$id_sw = end($_GET);
$hapus = hapusdataklssw($id_sw);
var_dump($hapus);
if (!$hapus) {
	header('location:admin.php?page=siswa&delete=failed');
	exit();
}
header('location:admin.php?page=siswa&delete=succes');