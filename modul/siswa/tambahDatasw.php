<?php
//tambah data siswa
function tambahDatass($data) {
  global $conn;

  $id_siswa = htmlspecialchars($data['id_siswa']);
  $nama_siswa = htmlspecialchars($data['nama_siswa']);
  $nis = htmlspecialchars($data['nis']);
  $kelas = htmlspecialchars($data['kelas']);

  $cek = mysqli_query($conn, "SELECT nis FROM siswa WHERE nis='$nis' ");
  mysqli_fetch_row($cek);
  if ($dt = mysqli_fetch_assoc($cek) > 1) {
    echo "<script>
            alert('Siswa Dengan NIS Telah terdaftar');
      </script>";
    return false;
  }

  $result = mysqli_query($conn, "INSERT INTO siswa VALUES ( '', '$nama_siswa', '$nis', '$kelas' )");

  return mysqli_affected_rows($conn);
}

$nama_kls = view("SELECT nama_kls FROM kelas");
if (isset($_POST['submit'])) {
	$siswa = tambahDatass($_POST);
  if ($siswa) {
    echo "<script>
            alert('Berhasil Ditambahkan');
      </script>";
  }
}
?>
<main>
  <div class="container py-4">
    <div class="p-5 mb-4 bg-light rounded-3">
    <div class="row">
  		<div class="judul col-md-8 offset-md-2">
  			<h3>Tambah Data Siswa</h3>
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

