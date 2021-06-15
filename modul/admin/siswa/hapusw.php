<?php
$id_sw = end($_GET);
$hapus = hapusdataklssw($id_sw);
if (!$hapus) {
	header('location:index.php?page=siswa&delete=failed');
}
header('location:index.php?page=siswa&delete=succes');