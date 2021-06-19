<?php 
$siswa = view("SELECT * FROM siswa order by kelas_siswa DESC LIMIT 20");
$kelas = view("SELECT kls FROM df_kls");
?>
<?php 
  $counts = function($className) {
    $result = view("SELECT kelas_siswa FROM siswa WHERE kelas_siswa='$className'");
    return count($result);
  }
?>
<main>
  <div class="container py-4">
    <div class="p-5 mb-4 bg-light rounded-3">
      <a href="?page=new_sw" class="btn btn-primary mb-2 mt-2" >Tambah Data</a>
      <a href="" class="mb-2 mt-2 float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">View Jumlah Siswa</a>
       <!-- alert -->
      <?php if(isset($_GET)): ?>
        <?php $data = end($_GET) ?>
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Jumlah Siswa Perkelas</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <ol class="list-group list-group-numbered">
          <?php foreach($kelas as $kls): ?>
          <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
              <div class="fw-bold"><?= $kls['kls'] ?></div>
            </div>
            <span class="badge bg-primary rounded-pill"><?= $counts($kls['kls'])?> SISWA</span>
          </li>
          <?php endforeach; ?>
        </ol>
      </div>
    </div>
  </div>
</div>