<?php
$id_gr = end($_GET);
$hapus = hapusdatagr($id_gr);
if ($hapus) {
	header('location:admin.php?page=guru&delete=failed');
	exit();
}
header('location:admin.php?page=guru&delete=succes');