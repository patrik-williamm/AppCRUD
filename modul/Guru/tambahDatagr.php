<?php 
if (isset($_POST['submit'])) {
	$gurus = tambahDatagr($_POST);
	if ($gurus) {
		header('location:admin.php?page=guru&data=succes');
	}
}
$guru_mp = view("SELECT nama_mp FROM mata_pelajaran ORDER BY nama_mp ASC");
?>
<main>
  <div class="container py-4">
    <div class="p-5 mb-4 bg-light rounded-3">
      <div class="container-fluid py-5">
      	<div class="row">
      		<div class="col-md-8 offset-md-2">
      			<h3>Tambah Data Guru</h3>
      			<hr style="height: 0.5em" width="240px" class="bg-primary">
      		</div>	
	        <form action="" method="post">
	        	<div class="col-md-8 offset-md-2 mb-3">
	        		<input class="form-control" type="hidden" aria-label="Disabled input example" name="id_guru">
	        	</div>
	        	<div class="col-md-8 offset-md-2 mb-3">
	        		<label class="form-label fw-bold" for="nama">Nama Guru</label>
	        		<input class="form-control" type="text" placeholder="Input Nama..." name="nama_guru" id="nama" required>
	        	</div>
	        	<div class="col-md-8 offset-md-2 mb-3">
	        		<label for="NIP" class="form-label fw-bold">NIP</label>
	        		<input class="form-control" type="text" placeholder="Input NIP..." name="nip" required id="NIP">
	        	</div>
	        	<div class="col-md-8 offset-md-2 mb-3">
	        		<label for="Alamat" class="form-label fw-bold">Alamat</label>
	        		<input class="form-control" type="text" placeholder="Input Alamat..." id="Alamat" name="alamat">
	        	</div>
	        	<div class="col-md-8 offset-md-2 mb-3">
	        		<label for="E-mail" class="form-label fw-bold">E-mail</label>
	        		<input class="form-control" type="email" placeholder="Input email" id="E-mail" name="email" required="">
	        	</div>
	        	<div class="col-md-4 offset-md-2 mb-3">
	        		<label for="gr_study" class="form-label fw-bold">Guru Bidang Study</label>
	        		<select class="form-select form-select-sm" aria-label=".form-select-sm example" name="guru_study" id="gr_study">
					  <option selected>Guru Bidang Study</option>
					  <!-- php code -->
					  <?php foreach($guru_mp as $mp): ?>
						<option value="<?= $mp['nama_mp'] ?>"><?= $mp['nama_mp'] ?></option>
					  <?php endforeach; ?>
					</select>
	        	</div>
	        	<div class="col-md-4 offset-md-2 mb-3">
	        		<label class="form-label fw-bold" for="Status">Status Guru</label>
	        		<select class="form-select form-select-sm" aria-label=".form-select-sm example" id="Status" name="status_guru">
					  <option selected>Status Guru</option>
					  <option value="PNS">PNS</option>
					  <option value="Honor">Honor</option>
					  <option value="Magang">Magang</option>
					</select>
	        	</div>
	        	<div class="col-md-8 offset-md-2 mb-3">
	        		<button type="submit" class="btn btn-primary" name="submit">Submit</button> | 
	        		<button type="reset" class="btn btn-danger" name="batal">Batal</button>
	        	</div>
	        </form>	
      	</div>
      </div>
    </div>
  </div>
</main>
