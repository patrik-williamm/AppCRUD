<?php
if (!$_SESSION['email'] && !$_SESSION['nama']) {
	header('location:index.php');
}

function hapusdataklssw($id) {
	global $conn;
	$result = mysqli_query($conn, "DELETE FROM siswa WHERE id_siswa='$id'");
	return mysqli_affected_rows($conn);
}

$id_sw = end($_GET);
$hapus = hapusdataklssw($id_sw);

if (!$hapus) {
	header('location : admin.php?page=siswa&delete=failed');
}

header('location: admin.php?page=siswa&delete=succes');
exit();