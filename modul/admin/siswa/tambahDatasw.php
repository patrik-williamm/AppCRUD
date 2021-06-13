<?php

if (isset($_POST['submit'])) {
	$siswa = tambahDatass($_POST);

	if ($siswa) {
		header('location:index.php?page=siswa&data=succes');
	}
}

$nama_kls = view("SELECT nama_kls FROM kelas");
?>
<main>
  <div class="container py-4">
    <div class="p-5 mb-4 bg-light rounded-3">
    <div class="row">
		<div class="judul col-md-8 offset-md-2">
			<h3>Tambah Data Siswa</h3>
			<hr style="height: 0.4em" width="270px" class="bg-primary">
		</div>
       <form action="" method="post">
          <input type="hidden" name="id_siswa">
          <div class="form-floating mb-3 col-md-8 offset-md-2">
            <input type="text" class="form-control" id="nama_siswa" placeholder="Nama siswa..." name="nama_siswa" required>
            <label for="nama_siswa">Nama Siswa</label>
          </div>
          <div class="form-floating mb-3 col-md-8 offset-md-2">
            <input type="text" class="form-control" id="nis" placeholder="Nomor induk siswa..." name="nis" required>
            <label for="nis">NIS</label>
          </div>
          <div class="col-md-8 offset-md-2">
	          <select class="form-select" aria-label="Default select example" name="kelas">
	            <option selected>Kelas</option>
	            <?php foreach($nama_kls as $kls): ?>
	                <option value="<?= $kls['nama_kls'] ?>"><?= $kls['nama_kls'] ?></option>
	            <?php endforeach; ?>
	          </select>
          </div>
          <div class="modal-footer col-md-8 offset-md-2">
            <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
          </div>
       </form>
    </div>
    </div>
  </div>
</main>

