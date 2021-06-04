<?php session_start();
require_once 'config/Config.php';

if (isset($_SESSION['email']) && isset($_SESSION['nama'])) {
	header('location: admin.php');
}
if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password =  $_POST['password'];

	//cari email pada database
	$emailUser = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
	mysqli_num_rows($emailUser);
	if ($dt = mysqli_fetch_assoc($emailUser)) {
		if (password_verify($password, $dt['password'])) {
			$_SESSION['email'] = $dt['email'];
      $_SESSION['nama'] = $dt['nama'];
			header('location: admin.php');
		}
	}
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Patrik william - Login</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    <!-- Custom styles for this template -->
    <link href="assets\css\signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    <main class="form-signin">
      <form action="" method="post">
        <img class="mb-4" src="assets/img/bg-1.jpg" alt="" width="72" height="57">
        <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

        <div class="form-floating mb-3">
          <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
          <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating mb-3">
          <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
          <label for="floatingPassword">Password</label>
        </div>

        <div class="checkbox mb-2">
          <label class="me-5">
            <input type="checkbox" name="remember" value="remember-me"> Remember me
          </label>
          <label>
            Daftar?<a href="register.php">klik sini</a>
          </label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" name="submit" type="submit">Sign in</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2021-<?= date('Y'); ?></p>
      </form>
    </main>
  </body>
</html>
	</div>
</div>