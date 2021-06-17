<?php
  //menampilkan data matapelajaran
  $matapelajaran = view("SELECT * FROM mata_pelajaran ORDER BY jurusan_mp ASC");
?>
<main>
  <div class="container py-4">
    <div class="p-2 mb-3 bg-light rounded-3">
      <a href="?page=new_mp" name="datanew" class="text-start btn btn-primary mt-5 mb-3" type="button">New Data</a>
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
      <!-- table -->
      <table class="table table-striped container ">
        <tr class="table-primary">
          <th class="table-primary">ID</th>
          <th class="table-primary">Mata Pelajaran</th>
          <th class="table-primary">Jurusan</th>
          <th class="table-primary">Aksi</th>
        </tr>
        <?php $id = 1; ?>
        <?php foreach($matapelajaran as $mp): ?>
        <tr class="table-light">
          <td class="table-light"><?= $id; ?></td>
          <td class="table-light"><?= $mp['nama_mp'] ?></td>
          <td class="table-light"><?= $mp['jurusan_mp'] ?></td>
           <td class="table-light">
            <a href="?page=edit_mp&edit=<?=$mp['id_mp']; ?>">Edit</a> | 
            <a href="?page=delete_mp&delete=<?= $mp['id_mp'] ?>">Hapus</a>
          </td>
        </tr>
        <?php $id++; ?>
        <?php endforeach; ?>
      </table>
      <!-- akhir table --> 
    </div>
  </div>
</main>