<?php 
if (!$_SESSION['email'] && !$_SESSION['nama']) {
	header('location:index.php');
}

$kelas = view("SELECT * FROM kelas ORDER BY nama_kls ASC"); 
?>
<main>
  <div class="container py-4">
    <div class="p-5 mb-4 bg-light rounded-3">
    	<a class="btn btn-primary mb-2 mt-2" href="?page=new_kls">Data Baru</a> 
    	<!-- alert -->
	      <?php if(isset($_GET['data'])): ?>
	        <?php $data = $_GET['data'] ?>
	        <?php if($data == 'succes'): ?>
	          <div class="alert alert-primary alert-dismissible fade show" role="alert">
	            Data Berhasil Ditambahkan
	            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	          </div>
	          <?php elseif($data == 'failed'): ?>
	            <div class="alert alert-danger alert-dismissible fade show" role="alert">
	              Data Gagal Ditambahkan
	              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	            </div>
	            <?php else: ?>
	              <div class="alert alert-warning alert-dismissible fade show" role="alert">
	              selamat datang
	              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	            </div>
	        <?php endif; ?>
	      <?php endif; ?>
	      <!-- akhir alert -->
		 <table class="table table-striped container">
			<tr class="table-primary text-center">
				<th class="table-primary">No</th>
				<th class="table-primary">Nama Wali Kelas</th>
				<th class="table-primary">Jumlah siswa</th>
				<th class="table-primary">Kelas</th>
				<th class="table-primary">Aksi</th>
			</tr>
			<?php $i = 1; ?>
			<?php foreach($kelas as $kls): ?>
			<tr class="table-light text-center">
				<td class="table-light"><?= $i; ?></td>
				<td class="table-light"><?= $kls['nama_Walikls'] ?></td>
				<td class="table-light"><?= $kls['jlh_siswa'] ?> Siswa</td>
				<td class="table-light"><?= $kls['nama_kls'] ?></td>
				<td class="table-light">
					<a href="?page=edit_kls&edit=<?= $kls['id_kelas'] ?>">Edit</a> | 
					<a href="?page=delete_kls&delete=<?= $kls['id_kelas'] ?>">Hapus</a>
				</td>
			</tr>
			<?php $i++; ?>	
			<?php endforeach; ?>
		 </table>
    </div>
  </div>
</main>
