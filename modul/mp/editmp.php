<?php
	$id_mp = end($_GET); 
	if ($id_mp == null) {
		header('location: index.php?page=mata_pelajaran');
		return false;
	}
	$mp = view("SELECT * FROM mata_pelajaran WHERE id_mp='$id_mp'")[0];

	if (isset($_POST['submit'])) {
		$editmp = editmp($_POST);
	}
?>
<main>
  <div class="container py-4">
    <div class="p-5 mb-4 bg-light rounded-3">
      <div class="container-fluid py-5">
        <div class="row">
        	<form action="" method="post">
        		<input type="hidden" name="id_mp" value="<?= $mp['id_mp'] ?>">
        		<div class="form-floating mb-3 ">
				  <input type="text" class="form-control" id="nama_mp" placeholder="Mata Pelajaran" value="<?= $mp['nama_mp'] ?>" name="nama_mp">
				  <label for="nama_mp">Mata Pelajaran</label>
				</div>
				<div class="form-floating mb-3">
				  <input 	type="text" class="form-control" id="jurusan_mp" placeholder="Jurusan" value="<?= $mp['jurusan_mp'] ?>" name="jurusan_mp">
				  <label for="jurusan_mp">Jurusan</label>
				</div>
				<div class="form-btn">
					<button type="submit" class="btn btn-success" name="submit">Ubah</button> |
					<button type="reset" class="btn btn-danger" name="batal">Batal</button>
				</div>
        	</form>
        </div>
    </div>
  </div>
</main>

