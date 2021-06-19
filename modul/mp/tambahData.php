<?php 
//function tambah data mata pelajaran
function tambahDataMP($data) {
	global $conn;

	$id_mp = htmlspecialchars($data['id_mp']);
	$nama_mp = htmlspecialchars(rtrim(ucwords($data['nama_mp'])));
	$jurusan_mp = htmlspecialchars(strtoupper($data['jurusan_mp']));


	$cekMp = mysqli_query($conn, "SELECT nama_mp FROM mata_pelajaran WHERE nama_mp='$nama_mp'");
	mysqli_fetch_row($cekMp);
	if (mysqli_fetch_assoc($cekMp) > 1) 
	{
		header('location: admin.php?page=mata_pelajaran&data=failed');
		return false;
	}
	//cek apakah semua data telah diisi
	if (empty($nama_mp) && empty($jurusan_mp)) {
		header('location: admin.php?page=mata_pelajaran&data=failed');
		return false;
	}
	$result = mysqli_query($conn, "INSERT INTO mata_pelajaran VALUES ('$id_mp', '$nama_mp', '$jurusan_mp')");	
	return mysqli_affected_rows($conn);
}
//menanambah data baru
if (isset($_POST['simpan'])) {
	$dataMP = tambahDataMP($_POST);
	if ($dataMP) {
    echo "<script>
            alert('Berhasil Ditambahkan');
      </script>";
  }
} 
?>
<main>
  <div class="container py-4">
    <div class="p-5 mb-4 bg-light rounded-3">
    <div class="container">
      <form action="" method="post">
		<div class="row">
			<div class="col-md-8 offset-md-2 mb-2 p-2">
				<h3 class="display-5 fw-bold">Data Baru</h3>
			</div>
			<input type="hidden" name="id_mp">
			<div class="col-md-8 offset-md-2 mb-2 p-2">
				<label for="nama">Nama Mata Pelajaran</label>
				<input class="form-control" type="text" placeholder="input nama..." name="nama_mp" id="nama" autocomplete="off"  autofocus="on">
			</div>
			<div class="col-md-8 offset-md-2 mb-2 p-2">
				<label for="jurusan_mp">Jurusan</label>
				<select class="form-select" aria-label="Default select example" id="jurusan_mp" name="jurusan_mp">
				  <option selected>Option Jurusan</option>
				  <option value="IPA">Ipa</option>
				  <option value="IPS">Ips</option>
				  <option value="BAHASA">Bahasa</option>
				  <option value="UMUM">Umum</option>
				</select>
			</div>
			<div class="col-md-8 offset-md-2 mb-2 p-3">
				<button type="submit" class="btn btn-primary" name="simpan">simpan</button> |
				<button type="reset" class="btn btn-danger" name="batal">Batal</button>
			</div>
		</div>
	</form>
    </div>
    </div>
  </div>
</main>
