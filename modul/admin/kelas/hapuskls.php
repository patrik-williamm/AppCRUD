<?php
$id_kls = end($_GET);
$hapus = hapusdatakls($id_kls);

if ($hapus==false) {
	header('location:index.php?page=kelas&delete=succes');
}else{
	header('location:index.php?page=kelas&delete=failed');
}