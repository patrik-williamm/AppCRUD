<?php
require_once 'config/Config.php';

/**************
function untuk pendaftran user baru
**************/
function register($data) {
	global $conn;

	$id = htmlspecialchars($data['id']);
	$nama = htmlspecialchars($data['nama']);
	$email = stripcslashes($data['email']);
	$password = mysqli_real_escape_string($conn, $data['password']);
	$konfirmasiPassword = mysqli_real_escape_string($conn, $data['konfirmasiPassword']);
	$status = htmlspecialchars($data['status']);

	$emailUser = mysqli_query($conn, "SELECT email FROM users WHERE email='$email'");
	
	if ($user = mysqli_fetch_assoc($emailUser) > 1) {
		return false;
	}

	if ($password != $konfirmasiPassword) {
		return false;
	}

	if (empty($password) && empty($email)) {
		return false;
	}

	//generate password
	$password = password_hash($password, PASSWORD_DEFAULT);
	$result = mysqli_query($conn, "INSERT INTO users VALUES( '', 'images.jpg','$nama', '$email', '$password', 'user' )");

	return mysqli_affected_rows($conn);
}

 if (isset($_POST['submit'])) {
	 $users = register($_POST);
  } 
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Register</title>
  </head>
  <body>
	<form action="" method="post" enctype="multipart/form-data">
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
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
  </body>
</html>