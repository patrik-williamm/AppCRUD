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
      setcookie("key", hash("haval160,4",$dt['nama']), time()+3600);
			header('location: admin.php?page=Dashboard');
		}
	}
  $error=true;
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
    <link href="<?= BASEURL ?>/assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="assets\css\signin.css" rel="stylesheet">
    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="57x57" href="<?= BASEURL ?>/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?= BASEURL ?>/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?= BASEURL ?>/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= BASEURL ?>/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?= BASEURL ?>/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?= BASEURL ?>/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?= BASEURL ?>/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?= BASEURL ?>/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= BASEURL ?>/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="<?= BASEURL ?>/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= BASEURL ?>/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?= BASEURL ?>/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= BASEURL ?>/favicon/favicon-16x16.png">
    <link rel="manifest" href="/<?= BASEURL ?>/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
  </head>
  <body class="text-center">
    <main class="form-signin">
      <!-- alert -->
      <img class="mb-4" src="<?= BASEURL ?>/assets/img/logo.png" alt="" width="72" height="57">
      <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
      <?php if(isset($error)): ?>
        <?php if($error): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
             Username / Password <strong>Wrong</strong>
            </div>
        <?php endif; ?>
      <?php endif; ?>
      <form action="" method="post">
        <div class="form-floating mb-3">
          <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
          <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating mb-3">
          <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" autocomplete="off">
          <label for="floatingPassword">Password</label>
        </div>

        <div class="checkbox mb-2">
          <label class="me-5">
            <input type="checkbox" name="remember" value="remember-me"> Remember me
          </label>
         <!--  <label>
            Daftar?<a href="register.php">klik sini</a>
          </label> -->
        </div>
        <button class="w-100 btn btn-lg btn-primary" name="submit" type="submit">Sign in</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2021-<?= date('Y'); ?> | patrik william</p>
      </form>
    </main>
  </body>
</html>
	</div>
</div>