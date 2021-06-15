<?php session_start();
require_once 'config/Config.php'; 

if (isset($_POST['submit'])) {
	$user = register($_POST);
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <!-- My css -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">

    <title>Yo! Patrik william</title>
  </head>
  <body>
	<div class="container" style="margin-top: 2em">
		<div class="row">
			<div class="col-md-8 offset-md-2">
				<h3 class="text-center mb-3">Registrasi Account</h3>
				<hr class="bg-primary mb-5" style="width: 300px; margin: auto; display: block; height: 0.3em">
			</div>
			<form action="" method="post">
				<input type="hidden" name="id">
					<div class="col-md-8 offset-md-2">
						<div class="mb-3">
						  <label for="nama" class="form-label fw-bold">Nama Lengkap</label>
						  <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Lengkap">
						</div>
					</div>
					<div class="col-md-8 offset-md-2">
						<div class="mb-3">
						  <label for="email" class="form-label fw-bold">Email</label>
						  <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com">
						</div>
					</div>
					<input type="hidden" name="status">
					<div class="col-md-8 offset-md-2">
						<div class="mb-3">
						  <label for="password" class="form-label fw-bold">Password</label>
						  <input type="password" name="password" class="form-control" id="password" placeholder="Password">
						</div>
					</div>
					<div class="col-md-8 offset-md-2">
						<div class="mb-3">
						  <label for="konfirmasiPassword" class="form-label fw-bold">Konfirmasi Password</label>
						  <input type="password" name="konfirmasiPassword" class="form-control" id="konfirmasiPassword" placeholder="konfirmasi Password">
						</div>
					</div>
					<div class="col-md-8 offset-md-2">
						<button type="submit" name="submit" class="btn btn-primary my-3">Submit</button> |
						<button type="reset" name="batal" class="btn btn-danger my-3">Batal!</button>
					</div>
				</form>
			</div>
		</div> 
		<!-- footer -->
	    <div class="container py-4">
		    <footer class="pt-3 mt-4 text-muted border-top">
		      &copy; 2021-<?= date('Y')?> | Patrik William
		    </footer>
		  </div>
	    <!-- akhir footer -->

    <!-- javascript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
  </body>
</html>