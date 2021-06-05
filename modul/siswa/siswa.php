<?php 
  $siswa = view("SELECT * FROM siswa order by nis asc");
?>
<main>
  <div class="container py-4">
    <div class="p-5 mb-4 bg-light rounded-3">
      <button type="button" class="btn btn-primary mb-2 mt-2" data-bs-toggle="modal" data-bs-target="#modalsiswa">
        New File
      </button>
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
      		<th class="table-light"><?= $id ?></th>
      		<th class="table-light"><?= $ss['nama_siswa'] ?></th>
      		<th class="table-light"><?= $ss['nis'] ?></th>
      		<th class="table-light"><?= $ss['kelas_siswa'] ?></th>
      		<th class="table-light">
      			<a href="?edit=<?= $ss['id_siswa'] ?>">Edit</a> |
      			<a href="?delete=<?= $ss['id_siswa'] ?>">Hapus</a>
      		</th>
      	</tr>
        <?php $id++; ?>
      <?php endforeach; ?>
      </table>
    </div>
  </div>
</main>

<!-- Modal -->
<div class="modal fade" id="modalsiswa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<? BASEURL ?>/siswa/siswa.php" method="post">
          <input type="hidden" name="id_siswa">
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="nama_siswa" placeholder="Nama siswa..." name="nama_siswa">
            <label for="nama_siswa">Nama Siswa</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="nis" placeholder="Nomor induk siswa..." name="nis">
            <label for="nis">NIS</label>
          </div>
          <select class="form-select" aria-label="Default select example">
            <option selected>Kelas</option>
            <option value="1">One</option>
          </select>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
       </form>
    </div>
  </div>
</div>