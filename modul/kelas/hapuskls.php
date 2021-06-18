<?php
ob_start();
if (!$_SESSION['email'] && !$_SESSION['nama']) {
	header('location:index.php');
}
function hapusdatakls($id) {
	global $conn;
	$result = mysqli_query($conn, "DELETE FROM kelas WHERE id_kelas='$id'");
	return mysqli_affected_rows($conn);
}

if (isset($_GET['delete'])) {
	$dlt = $_GET['delete'];
}else{
	$dlt ='';
}

$hapus = hapusdatakls($dlt);
