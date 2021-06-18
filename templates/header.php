<?php 
if (!$_SESSION['email'] && !$_SESSION['nama']) {
  header('location:index.php');
}
$img = view("SELECT img FROM users WHERE email='$_SESSION[email]'")[0]; 
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="<?= BASEURL ?>/assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- My css -->
    <link rel="stylesheet" href="<?= BASEURL ?>/assets/css/style.css">
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">

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
    <link rel="manifest" href="<?= BASEURL ?>/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <?php $title = empty($_GET['page']) ? 'Dashboard': $_GET['page'] ?>
    <title>Yo! Patrik william | <?= $title ?> </title>
  </head>
  <body>
      <!-- navbar -->
      <nav class="navbar navbar-expand-lg navbar-dark bg-primary text-white shadow-sm fixed-top">
        <div class="container">
           <a class="navbar-brand mx-2" href="admin.php">Patrik_Williamm</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
             <ul class="navbar-nav ms-auto">
              <hr class="bg-dark mb-0 p-0">
              <li class="nav-item ms-3">
                <a class="nav-link active" href="?page=siswa">Siswa</a>
              </li>
              <hr class="bg-dark mb-0 p-0">
              <li class="nav-item ms-3">
                <a class="nav-link active" href="?page=kelas">kelas</a>
              </li>
              <hr class="bg-dark mb-0 p-0">
              <li class="nav-item ms-3">
                <a class="nav-link active" href="?page=guru">Guru</a>
              </li>
              <hr class="bg-dark mb-0 p-0">
              <li class="nav-item ms-3">
                <a class="nav-link active" href="?page=mp">Mata Pelajaran</a>
              </li>
              <hr class="bg-dark mb-0">
              <li class="nav-item ms-3">
                <a class="nav-link active" href="?page=profile">
                  <img src="<?= BASEURL ?>/file/img-profile/<?= $img['img'] ?>" alt="images.jpg" width="34" height="34" class="rounded-circle" >
                </a>
              </li>
              <hr class="bg-primary mb-0">
            </ul>
          </div>
        </div>
      </nav>
    <!-- akhir navbar -->
    
  