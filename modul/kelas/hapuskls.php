<?php
ob_get_contents();
function hapusdatakls($id) {
	global $conn;
	$result = mysqli_query($conn, "DELETE FROM kelas WHERE id_kelas='$id'");
	return mysqli_affected_rows($conn);
}

if (isset($_GET['delete'])) {
	$dlt = $_GET['delete'];
	$hapus = hapusdatakls($dlt);
	if ($hapus) {
		echo "<script>
				confirm('Anda Yakin?');
			</script>";
		$info = $hapus ? 'succes' : 'failed';
		header('location: admin.php?pege=kelas&delete='.$info);
		exit();
	}
}

