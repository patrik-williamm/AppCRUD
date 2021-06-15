<?php $siswa = view("SELECT * FROM siswa order by id_siswa DESC") ?>
<main>
  <div class="container py-4">
    <div class="p-5 mb-4 bg-light rounded-3">
      <a href="?page=new_sw" class="btn btn-primary mb-2 mt-2" >
        New File
      </a>
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
      <table class="table table-primary table-striped">
      	<tr class="table-primary">
      		<th class="table-primary">ID</th>
      		<th class="table-primary">Nama Siswa</th>
      		<th class="table-primary">NIS</th>
      		<th class="table-primary">Kelas</th>
      		<th class="table-primary">Aksi</th>
      	</tr>
        <?php $id = 1; ?>
        <?php foreach($siswa as $ss): ?>
      	<tr class="table-light">
      		<td class="table-light"><?= $id ?></td>
      		<td class="table-light"><?= $ss['nama_siswa'] ?></td>
      		<td class="table-light"><?= $ss['nis'] ?></td>
      		<td class="table-light"><?= $ss['kelas_siswa'] ?></td>
      		<td class="table-light">
      			<a href="?page=edit_sw&edit=<?= $ss['id_siswa'] ?>">Edit</a> |
      			<a href="?page=delete_sw&delete=<?= $ss['id_siswa'] ?>">Hapus</a>
      		</td>
      	</tr>
        <?php $id++; ?>
      <?php endforeach; ?>
      </table>
    </div>
  </div>
</main>