<?php $gurus = view("SELECT * FROM guru ORDER BY nip ASC") ?>
<main>
  <div class="container py-4">
    <div class="p-5 mb-4 bg-light rounded-3">
      <table class="table table-striped container ">
        <tr class="table-primary">
          <th class="table-primary">ID</th>
          <th class="table-primary">Nama</th>
          <th class="table-primary">NIP</th>
          <th class="table-primary">Alamat</th>
          <th class="table-primary">Email</th>
          <th class="table-primary">Guru Mata Pelajaran</th>
          <th class="table-primary">status</th>
          <th class="table-primary">Aksi</th>
        </tr>
        <?php $id = 1; ?>
        <?php foreach($gurus as $guru): ?>
        <tr class="table-light">
          <td class="table-light"><?= $id; ?></td>
          <td class="table-light"><?= $guru['nama_guru'] ?></td>
          <td class="table-light"><?= $guru['nip'] ?></td>
          <td class="table-light"><?= $guru['alamat'] ?></td>
          <td class="table-light"><?= $guru['email'] ?></td>
          <td class="table-light"><?= $guru['guru_mp'] ?></td>
          <td class="table-light"><?= $guru['status'] ?></td>
          <td class="table-light">
            <a href="?edit=<?= $guru['id_guru'] ?>">Edit</a> |
            <a href="?hapus=<?= $guru['id_guru'] ?>">Hapus</a>
          </td>
        </tr>
        <?php $id++; ?>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</main>
