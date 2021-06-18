<?php  
if (!$_SESSION['email'] && !$_SESSION['nama']) {
	header('location:index.php');
}
function editsw($data) {
	global $conn;

	$id_siswa = htmlspecialchars($data['id_siswa']);
	$nama_siswa = htmlspecialchars($data['nama_siswa']);
	$nis = htmlspecialchars($data['nis']);
	$kelas_siswa = htmlspecialchars($data['kelas_siswa']);	

	$result = mysqli_query($conn, "UPDATE siswa SET id_siswa='$id_siswa', nama_siswa='$nama_siswa', nis='$nis', kelas_siswa='$kelas_siswa' WHERE id_siswa='$id_siswa'");
	return mysqli_affected_rows($conn);	
}

$id_fromUrl = end($_GET);
$v_siswa = view("SELECT * FROM siswa WHERE id_siswa='$id_fromUrl'")[0];

if (isset($_POST['ubah'])) {
	$editsw = editsw($_POST);
	
	if (!$editsw) {
		header('location: admin.php?page=siswa&edit=failed');
	}
	header('location: admin.php?page=siswa&edit=succes');
	exit();
}
?>
<main>
  <div class="container py-4">
    <div class="p-5 mb-4 bg-light rounded-3">
      <div class="container-fluid py-5">
      	<div class="row">
      		<div class="form-title mb-3 col-md-8 offset-md-2">
      			<h2 class="fw-bold">Edit Data Siswa</h2>
      		</div>
	        <form action="" method="post">
	        	<input type="hidden" name="id_siswa" value="<?= $v_siswa['id_siswa'] ?>">
	        	<div class="form-floating mb-3 col-md-8 offset-md-2">
				  <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" value="<?= $v_siswa['nama_siswa'] ?>">
				  <label for="nama_siswa">Nama Siswa</label>
				</div>
				<div class="form-floating mb-3 col-md-8 offset-md-2">
				  <input type="text" class="form-control" id="nis" name="nis" value="<?= $v_siswa['nis'] ?>">
				  <label for="nis">Nomor Induk Siswa</label>
				</div>
				<div class="form-floating mb-3 col-md-8 offset-md-2">
				  <input type="text" class="form-control" id="kelas" name="kelas_siswa" value="<?= $v_siswa['kelas_siswa'] ?>">
				  <label for="kelas">Kelas</label>
				</div>
				<div class="form-btn mb-3 col-md-8 offset-md-2">
					<button type="submit" class="btn btn-primary" name="ubah">Submit</button> |
					<button type="reset" class="btn btn-danger">Batal</button>
				</div>
	        </form>
      </div>
    </div>
  </div>
</main>
