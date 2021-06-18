<?php 
if (!$_SESSION['email'] && !$_SESSION['nama']) {
	header('location:index.php');
}
 
$id_fromUrl = end($_GET);
$data_gr = view("SELECT * FROM guru WHERE id_guru='$id_fromUrl' ")[0];

if (isset($_POST['ubah'])) {
	$editgr = editgr($_POST);
?>
<main>
  <div class="container py-4">
    <div class="p-5 mb-4 bg-light rounded-3">
      <div class="container-fluid py-5">
      	<div class="row">
      		<h2 class="col-md-8 offset-md-2 mb-3 p-3 fw-bold">Edit data Guru</h2>
	       <form action="" method="post">
				<input type="hidden" name="id_guru" value="<?= $data_gr['id_guru'] ?>">
	       		<div class="form-floating mb-3 col-md-8 offset-md-2">
				  <input type="text" class="form-control" id="nama_guru" value="<?= $data_gr['nama_guru'] ?>" name="nama_guru">
				  <label for="nama_guru">Nama Guru</label>
				</div>
				<div class="form-floating mb-3 col-md-8 offset-md-2">
				  <input type="text" class="form-control" id="nip" value="<?= $data_gr['nip'] ?>" name="nip">
				  <label for="nip">NIP</label>
				</div>
				<div class="form-floating mb-3 col-md-8 offset-md-2">
				  <input type="alamat" class="form-control" id="alamat" name="alamat" value="<?= $data_gr['alamat'] ?>">
				  <label for="alamat">Alamat</label>
				</div>
				<div class="form-floating mb-3 col-md-8 offset-md-2">
				  <input type="email" class="form-control" id="email" value="<?= $data_gr['email'] ?>" name="email">
				  <label for="email">Email address</label>
				</div>
				<div class="form-floating mb-3 col-md-8 offset-md-2">
				  <input type="text" class="form-control" id="guru_mp" value="<?= $data_gr['guru_mp'] ?>" name="guru_mp">
				  <label for="guru_mp">Guru Bidang Study</label>
				</div>
				<div class="form-floating mb-3 col-md-8 offset-md-2">
				  <input type="text" class="form-control" id="status" value="<?= $data_gr['status'] ?>" name="status">
				  <label for="status">Status</label>
				</div>
				<div class="form-btn mb-3 col-md-8 offset-md-2">
					<button type="submit" class="btn btn-primary" name="ubah">Ubah</button> |
					<button type="reset" class="btn btn-danger">Batal</button>
				</div>
	       </form>
      	</div>
    </div>
  </div>
</main>
