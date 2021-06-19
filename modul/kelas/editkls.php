<?php
ob_get_contents();
function editkls($data) {
	global $conn;

	$id_kelas = htmlspecialchars($data['id_kelas']);
	$nama_Walikls = htmlspecialchars($data['nama_Walikls']);
	$jlh_siswa = htmlspecialchars($data['jlh_siswa']);
	$nama_kls = htmlspecialchars($data['nama_kls']);

	$result = mysqli_query($conn, "UPDATE kelas SET id_kelas='', nama_Walikls='$nama_Walikls', jlh_siswa='$jlh_siswa', nama_kls='$nama_kls' WHERE id_kelas='$id_kelas'");

	return mysqli_affected_rows($conn);
}

$id_fromURL = $_GET['edit'];
$v_kelas = view("SELECT * FROM kelas WHERE id_kelas='$id_fromURL'")[0];

if (isset($_POST['ubah'])) {
	$editkls = editkls($_POST);
	$info = $editkls ? 'succes' : 'failed';
	header('location : admin.php?page='.$info);
	exit();
}

if (isset($_POST['batal'])) {
	echo("<script>
			confirm('Anda yakin meninggalkan Halaman ini?');
			location.href = 'admin.php?page=siswa';
		</script>");
}
?>
<main>
  <div class="container py-4">
    <div class="p-5 mb-4 bg-light rounded-3">
      <div class="container-fluid py-5">
       <main>
  <div class="container py-4">
    <div class="p-5 mb-4 bg-light rounded-3">
      <div class="container-fluid py-5">
      	<div class="row">
      		<div class="form-title mb-3 col-md-8 offset-md-2">
      			<h2 class="fw-bold">Edit Data Kelas</h2>
      		</div>
	        <form action="" method="post">
	        	<input type="hidden" name="id_kelas" value="<?= $v_kelas['id_kelas'] ?>">
	        	<div class="form-floating mb-3 col-md-8 offset-md-2">
				  <input type="text" class="form-control" id="nama_Walikls" name="nama_Walikls" value="<?= $v_kelas['nama_Walikls'] ?>">
				  <label for="nama_Walikls">Nama Wali Kelas</label>
				</div>
				<div class="form-floating mb-3 col-md-8 offset-md-2">
				  <input type="text" class="form-control" id="jlh_siswa" name="jlh_siswa" value="<?= $v_kelas['jlh_siswa'] ?>">
				  <label for="jlh_siswa">Jumlah Siswa</label>
				</div>
				<div class="form-floating mb-3 col-md-8 offset-md-2">
				  <input type="text" class="form-control" id="nama_kls" name="nama_kls" value="<?= $v_kelas['nama_kls'] ?>">
				  <label for="nama_kls">Kelas</label>
				</div>
				<div class="form-btn mb-3 col-md-8 offset-md-2">
					<button type="submit" class="btn btn-primary" name="ubah">Submit</button> |
					<button type="cancel" name="batal" class="btn btn-danger">Batal</button>
				</div>
	        </form>
      </div>
    </div>
  </div>
</main>

    </div>
  </div>
</main>
