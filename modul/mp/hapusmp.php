<?php
//hapus data dari query
function hapusdata($id) {
	global $conn;
	$result = mysqli_query($conn, "DELETE FROM mata_pelajaran WHERE id_mp='$id'");
	return mysqli_affected_rows($conn);
}

if (isset($_GET['delete'])) {
	$idDelete = $_GET['delete'];
	$hapus = hapusdata($idDelete);
	$info = $hapus ? 'succes' : 'failed';
	header('location: admin.php?page=mata_pelajaran&edit='.$info);
	exit();	
}

