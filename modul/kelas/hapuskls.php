<?php
$id_kls = end($_GET);
var_dump($id_kls);
$hapus = hapusdatakls($id_kls);
var_dump($hapus);
if ($hapus) {
	header('location:admin.php?page=kelas&delete=succes');
}
header('location:admin.php?page=kelas&delete=failed');
exit();