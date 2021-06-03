<?php //menanambah data baru
if (isset($_POST['simpan'])) {
	$data_mp = tambahDataMP($_POST);
	
	if ($data_mp) {
		header('location: admin.php?page=mata_pelajaran&data=succes');
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
				<input class="form-control" type="text" placeholder="input nama..." name="nama_mp" id="nama">
			</div>
			<div class="col-md-8 offset-md-2 mb-2 p-2">
				<label for="jurusan">Jurusan Mata Pelajaran</label>
				<input class="form-control" type="text" placeholder="input Jurusan" name="jurusan_mp" id="jurusan">
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
