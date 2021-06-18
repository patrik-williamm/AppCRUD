<?php
if (!$_SESSION['email'] && !$_SESSION['nama']) {
	header('location:index.php');
}
$id_gr = end($_GET);
$hapus = hapusdatagr($id_gr);