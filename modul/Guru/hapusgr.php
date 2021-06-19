<?php
function hapusdatagr($id) {
	global $conn;
	$result = mysqli_query($conn, "DELETE FROM guru WHERE id_guru='$id'");
	return mysqli_affected_rows($conn);
}
if (isset($_GET['delete'])) {
	$idGuru = $_GET['delete'];
	$hapus = hapusdatagr($id_gr);
	if ($hapus) {
		echo "<script>
				confirm('Anda Yakin?');
			</script>";
		$info = $hapus ? 'succes' : 'failed';
		header('location: admin.php?pege=kelas&delete='.$info);
		exit();
	}
	
}
