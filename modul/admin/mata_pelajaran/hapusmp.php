<?php

$id_mp = end($_GET);
//var_dump($id_mp); die();

$hapus = hapusdata($id_mp);
if (!$hapus) {
	header('location: admin.php?page=mata_pelajaran&delete=failed');
}
header('location: admin.php?page=mata_pelajaran&delete=succes');

exit();