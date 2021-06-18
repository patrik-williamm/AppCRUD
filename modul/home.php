<?php 	
if (!$_SESSION['email'] && !$_SESSION['nama']) {
		exit();
	} 
?>
<main>
  <div class="container py-4">
    <div class="p-5 mb-4 bg-light rounded-3">
      <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold">Selamat Datang</h1>
        <p class="col-md-8 fs-4">"Kamu tidak perlu menjadi luar biasa untuk memulai, tapi kamu harus memulai untuk menjadi luar biasa."</p>
        <a class="btn btn-danger btn-lg" type="submit" href="logout.php">Logout</a>
      </div>
    </div>
  </div>
</main>
