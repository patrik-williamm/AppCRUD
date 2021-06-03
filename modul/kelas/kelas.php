<?php $data = view("SELECT * FROM kelas ORDER BY nama_siswa DESC") ?>
<main>
  <div class="container py-4">
    <div class="p-5 mb-4 bg-light rounded-3">
		 <table class="table-light table text-center">
			<tr class="table-light">
				<th class="table-dark">No</th>
				<th class="table-dark">Nama siswa</th>
				<th class="table-dark">Jumlah siswa</th>
				<th class="table-dark">Kelas</th>
				<th class="table-dark">Aksi</th>
			</tr>
			<?php $id = 1; ?>
			<?php foreach($data as $dt): ?>
			<tr class="table-light">
				<td class="table-light"><?= $id ?></td>
				<td class="table-light"><?= $dt['nama_siswa'] ?></td>
				<td class="table-light"><?= $dt['jlh_siswa'] ?></td>
				<td class="table-light"><?= $dt['nama_kls'] ?></td>
				<td class="table-light">
					<a href="?id=<?= $dt['id_kelas'] ?>">Edit</a> | 
					<a href="?id=<?= $dt['id_kelas'] ?>">Hapus</a>
				</td>
			</tr>
			<?php $id++; ?>	
			<?php endforeach; ?>
		 </table>
    </div>
  </div>
</main>

