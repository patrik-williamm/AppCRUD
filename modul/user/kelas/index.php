<?php $listkls = view("SELECT * FROM kelas") ?>
<main>
  <div class="container">
    <div class="p-3 mb-4 bg-light rounded-bottom">
      <div class="container-fluid">
       <h2 class="fw-bold">Daftar Kelas</h2>
       <p><?= date("D M j G:i:s T Y");  ?></p>
      </div>
    </div>
    <div class="row">
    	<?php foreach($listkls as $list): ?>
    	<div class="card ms-4 p-2 mx-3 mb-3 col-md-4" style="width: 15rem;">
  		  <div class="card-body">
  		    <h5 class="card-title"><?= $list['nama_kls'] ?></h5>
  		    <p class="card-text"><?= $list['nama_Walikls'] ?></p>
  		    <a href="?q=mykelas&id=<?= $list['id_kelas'] ?>" class="btn btn-primary">Go somewhere</a>
  		  </div>
  		</div>
    	<?php endforeach; ?>
    </div>
  </div>
</main>

