<?php
$id_gr = end($_GET);
$hapus = hapusdatagr($id_gr);
if (!$hapus) {
	header('location:index.php?page=guru&delete=failed');
}
header('location:index.php?page=guru&delete=succes');