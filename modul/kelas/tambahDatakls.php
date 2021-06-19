<?php
function tambahDatakls($data) {
	global $conn;

	$id_kelas = htmlspecialchars($data['id_kelas']);
	$nama_walikls = htmlspecialchars($data['nama_walikls']);
	$jlh_siswa = htmlspecialchars($data['jlh_siswa']);
	$nama_kls = htmlspecialchars($data['nama_kls']);

	$cek = mysqli_query($conn, "SELECT nama_kls FROM kelas WHERE nama_kls='$nama_kls' ");
	mysqli_fetch_row($cek);
	if (mysqli_fetch_assoc($cek) > 1) {
		header('location: admin.php?page=kelas&data=failed');
		return false;
	}

	$result = mysqli_query($conn, "INSERT INTO kelas VALUES ( '$id_kelas', '$nama_walikls', '$jlh_siswa', '$nama_kls' )");

	return mysqli_affected_rows($conn);
}
 
if (isset($_POST['submit'])) {
	$kelas = tambahDatakls($_POST);
	if ($kelas) {
	    echo "<script>
	            alert('Berhasil Ditambahkan');
	      </script>";
  }
}
if (isset($_POST['batal'])) {
	echo("<script>
			confirm('Anda yakin meninggalkan Halaman ini?');
			location.href = 'admin.php?page=siswa';
		</script>");
	return false;
}

$v_kls = view("SELECT nama_guru FROM guru");
$df_kls = view("SELECT kls FROM df_kls");
?>
<main>
  <div class="container py-4">
    <div class="p-5 mb-4 bg-light rounded-3">
      <div class="container-fluid py-5">
        <div class="row">
      		<div class="col-md-8 offset-md-2">
      			<h3>Tambah Data Kelas</h3>
      			<hr style="height: 0.5em" width="240px" class="bg-primary">
      		</div>	
	        <form action="" method="post">
	        	<div class="col-md-8 offset-md-2 mb-3">
	        		<input class="form-control" type="hidden" name="id_kelas">
	        	</div>
	        	<div class="col-md-8 offset-md-2 mb-3">
	        		<label class="form-label fw-bold" for="kls">Wali Kelas</label>
	        		<select class="form-select form-select-sm" aria-label=".form-select-sm example" id="kls" name="nama_walikls">
					  <option selected>Wali Kelas</option>
					  <?php foreach($v_kls as $v): ?>
					  	<option value="<?= $v['nama_guru']; ?>"><?= $v['nama_guru']; ?></option>
					  <?php endforeach; ?>
					</select>
	        	</div>
	        	<div class="col-md-8 offset-md-2 mb-3">
	        		<label class="form-label fw-bold" for="wl_kls">Kelas</label>
	        		<select class="form-select form-select-sm" aria-label=".form-select-sm example" id="wl_kls" name="nama_kls">
					  <option selected>Option Kelas</option>
					  <?php foreach($df_kls as $df): ?>
					  	<option value="<?= $df['kls']; ?>"><?= $df['kls']; ?></option>
					  <?php endforeach; ?>
					</select>
	        	</div>
	        	<div class="col-md-8 offset-md-2 mb-3">
	        		<label for="jlh" class="form-label fw-bold">Jumlah Siswa</label>
	        		<input class="form-control" type="text" placeholder="Input jlh_siswa..." name="jlh_siswa" required id="jlh">
	        	</div>
	        	<!-- <div class="col-md-8 offset-md-2 mb-3">
	        		<label for="kls" class="form-label fw-bold">Kelas</label>
	        		<input class="form-control" type="text" placeholder="Input kelas..." id="kls" name="nama_kls">
	        	</div> -->
	        	<div class="col-md-8 offset-md-2 mb-3">
	        		<button type="submit" class="btn btn-primary" name="submit">Submit</button> | 
	        		<button type="cancel" name="batal" class="btn btn-danger" name="batal">Batal</button>
	        	</div>
	        </form>	
      	</div>
      </div>
    </div>
  </div>
</main>