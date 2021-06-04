<?php 
if (isset($_POST['submit'])) {
	$kelas = tambahDatakls($_POST);

	if ($kelas) {
		header('location: admin.php?page=kelas&data=succes');
	}
}

$v_kls = view("SELECT nama_guru FROM guru ORDER BY nama_guru ASC");
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
	        		<input class="form-control" type="hidden" aria-label="Disabled input example" disabled name="id_kelas">
	        	</div>
	        	<div class="col-md-8 offset-md-2 mb-3">
	        		<label class="form-label fw-bold" for="wl_kls">Wali Kelas</label>
	        		<select class="form-select form-select-sm" aria-label=".form-select-sm example" id="wl_kls" name="nama_walikls">
					  <option selected>Wali Kelas</option>
					  <?php foreach($v_kls as $v): ?>
					  	<option value="<?= $v['nama_guru']; ?>"><?= $v['nama_guru']; ?></option>
					  <?php endforeach; ?>
					</select>
	        	</div>
	        	<div class="col-md-8 offset-md-2 mb-3">
	        		<label for="jlh" class="form-label fw-bold">Jumlah Siswa</label>
	        		<input class="form-control" type="text" placeholder="Input jlh_siswa..." name="jlh_siswa" required id="jlh">
	        	</div>
	        	<div class="col-md-8 offset-md-2 mb-3">
	        		<label for="kls" class="form-label fw-bold">Kelas</label>
	        		<input class="form-control" type="text" placeholder="Input kelas..." id="kls" name="nama_kls">
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