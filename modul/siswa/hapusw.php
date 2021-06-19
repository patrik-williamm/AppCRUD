<?php

function hapusdataklssw($id) {
	global $conn;
	$result = mysqli_query($conn, "DELETE FROM siswa WHERE id_siswa='$id'");
	return mysqli_affected_rows($conn);
}

if (isset($_GET['delete'])) {
	$id_sw = $_GET['delete'];
	$hapus = hapusdataklssw($id_sw);
	if ($hapus) {
		echo "<script>
					confirm('Anda Yakin?');
				</script>";
			$info = $hapus ? 'succes' : 'failed';
			header('location: admin.php?page=siswa&delete='.$info);
			exit();
	}
}
