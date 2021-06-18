<?php
if (!$_SESSION['email'] && !$_SESSION['nama']) {
	header('location:index.php');
}

//hapus data dari query
function hapusdata($id) {
	global $conn;
	$result = mysqli_query($conn, "DELETE FROM mata_pelajaran WHERE id_mp='$id'");
	return mysqli_affected_rows($conn);
}

$id_mp = end($_GET);
//var_dump($id_mp); die();

$hapus = hapusdata($id_mp);