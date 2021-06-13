<?php
$id_fromURL = $_GET['edit'];
	$v_kelas = view("SELECT * FROM kelas WHERE id_kelas='$id_fromURL'")[0];

	if (isset($_POST['ubah'])) {
		$editkls = editkls($_POST);

		if (!$editkls) {
			header('location: index.php?page=kelas&edit=failed');
			exit;
		}
		header('location: index.php?page=kelas&edit=succes');
		exit;
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
					<button type="reset" class="btn btn-danger">Batal</button>
				</div>
	        </form>
      </div>
    </div>
  </div>
</main>

    </div>
  </div>
</main>
