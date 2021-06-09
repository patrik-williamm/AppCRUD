<?php
$id_kls = end($_GET);
$hapus = hapusdatakls($id_kls);

if ($hapus==false) {
	header('location:admin.php?page=kelas&delete=succes');
}else{
	header('location:admin.php?page=kelas&delete=failed');
}