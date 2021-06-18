<?php
if (!$_SESSION['email'] && !$_SESSION['nama']) {
	header('location:index.php');
}
function hapusdatagr($id) {
	global $conn;
	$result = mysqli_query($conn, "DELETE FROM guru WHERE id_guru='$id'");
	return mysqli_affected_rows($conn);
}

$id_gr = end($_GET);
$hapus = hapusdatagr($id_gr);