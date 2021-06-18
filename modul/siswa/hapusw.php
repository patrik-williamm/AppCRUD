<?php
if (!$_SESSION['email'] && !$_SESSION['nama']) {
	header('location:index.php');
}

$id_sw = end($_GET);
$hapus = hapusdataklssw($id_sw);

if (!$hapus) {
	header('location : admin.php?page=siswa&delete=failed');
}

header('location: admin.php?page=siswa&delete=succes');
exit();