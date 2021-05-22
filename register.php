<?php session_start();
require_once 'config/Config.php'; 
if (isset($_SESSION['email'])) {
	header('location: admin.php');
}

if (!isset($_SESSION['email'])) {
	header('location:');
}
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'config/src/Exception.php';
require 'config/src/PHPMailer.php';
require 'config/src/SMTP.php';

//Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

if (isset($_POST['submit'])) {
	$user = register($_POST);
	if ($user) {
	    //Server settings
	    $mail->isSMTP();                                            //Send using SMTP
	    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
	    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
	    $mail->Username   = 'patrikwilliam001@gmail.com';                     //SMTP username
	    $mail->Password   = 'dipanegara001';                               //SMTP password
	    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         
	    $mail->Port       = 587;          

	    //Recipients
	    $mail->setFrom('patrikwilliam001@gmail.com', '000');
	    $mail->addAddress('patrikwilliamm@gmail.com', 'pw-chan');     //Add a recipient
	    $mail->addAddress('patrikwilliam001@gmail.com');               //Name is optional

	    //Content
	    $mail->isHTML(true);                                  //Set email format to HTML
	    $mail->Subject = 'Registrasi Akun';
	    $mail->Body    = random_bytes(6);
	    
	    $mail->send();
		header('location: index.php?status=sukses');
	}else {
		header('location: register.php?status=gagal');
	}
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

    <!-- My css -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">

    <title>Yo! Patrik william</title>
  </head>
  <body>
      <!-- navbar -->
      <nav class="navbar navbar-expand-lg navbar-dark bg-primary text-white fixed-top">
        <div class="container">
           <a class="navbar-brand mx-2" href="?page=home">Patrik_Williamm</a>
        </div>
      </nav>
    <!-- akhir navbar -->
<div class="container" style="margin-top: 5em">
	<div class="row">
		<div class="col-md-8 offset-md-2">
			<h3 class="text-center">Registrasi Account</h3>
			<hr class="bg-dark" style="width: 400px; margin: auto; display: block; height: 0.3em">
		</div>
		<form action="" method="post">
			<input type="hidden" name="id">
			<div class="col-md-8 offset-md-2">
				<div class="mb-3">
				  <label for="nama" class="form-label">Nama Lengkap</label>
				  <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Lengkap">
				</div>
			</div>
			<div class="col-md-8 offset-md-2">
				<div class="mb-3">
				  <label for="email" class="form-label">Email</label>
				  <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com">
				</div>
			</div>
			<div class="row g-2 needs-validation mb-3">
				<div class="col-md-4 offset-md-2">
				   <label for="tmpLahir" class="form-label">Tempat lahir</label>
				   <input type="text" name="tmp_lahir" class="form-control" id="tmpLahir">	
				</div>
				<div class="col-md-4">
				   <label for="tgllahir" class="form-label">Tanggal Lahir</label>
				   <input type="date" name="tgl_lahir" class="form-control" id="tgllahir">
				</div>
			</div>
			<div class="row g-2 needs-validation mb-3">
				<div class="col-md-4 offset-md-2">
				   <label for="tmpLahir" class="form-label">Gender</label>
				   <select class="form-select" name="gender" aria-label="Default select example">
				   	  <option>Gender Option</option>
					  <option value="L">Laki-laki</option>
					  <option value="P">Perempuan</option>
					</select>
				</div>
				<div class="col-md-4">
				   <label for="address" class="form-label">Alamat</label>
				   <input type="text" name="alamat" class="form-control" id="address">
				</div>
			</div>
			<div class="col-md-8 offset-md-2">
				<div class="mb-3">
				  <label for="password" class="form-label">Password</label>
				  <input type="password" name="password" class="form-control" id="password" placeholder="Password">
				</div>
			</div>
			<div class="col-md-8 offset-md-2">
				<div class="mb-3">
				  <label for="konfirmasiPassword" class="form-label">Konfirmasi Password</label>
				  <input type="password" name="konfirmasiPassword" class="form-control" id="konfirmasiPassword" placeholder="konfirmasi Password">
				</div>
			</div>
			<div class="col-md-8 offset-md-2">
				<button type="submit" name="submit" class="btn btn-primary my-3">Submit</button>
				<button type="reset" name="batal" class="btn btn-danger my-3">Batal!</button>
			</div>
		</form>
	</div>
</div> <!-- footer -->
    <div class="row bg-dark text-white">
      <div class="container">
       
      </div>
    </div>
    <!-- akhir footer -->

    <!-- javascript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
  </body>
</html>

 <!-- footer -->
    <div class="row bg-dark text-white">
      <div class="container">
       
      </div>
    </div>
    <!-- akhir footer -->

    <!-- javascript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
  </body>
</html>