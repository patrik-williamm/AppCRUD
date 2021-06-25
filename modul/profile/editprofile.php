<?php 	
$email = null;
if (isset($_SESSION['email'])) {
  $email = $_SESSION['email'];
}

$myUser = view("SELECT * FROM users WHERE email='$email'")[0];

function updateProfile($data) {
  global $conn;
  $id = htmlspecialchars($data['id']);
  $nama = htmlspecialchars($data['nama']);
  $email = htmlspecialchars($data['email']);
  $password = htmlspecialchars($data['password']);
  $status = htmlspecialchars($data['status']);
  $img = upload();

  if (!$img) {
    return false;
  }

  $result = mysqli_query($conn, "UPDATE users SET id='$id', img='$img', nama='$nama', email='$email', password='$password', status='$status' WHERE id='$id'");

    return mysqli_affected_rows($conn);
}

if (isset($_GET['id'])) {
  $idUpdate = $_GET['id'];

  if (isset($_POST['submit'])) {
    $myUser = updateProfile($_POST);
    header('location:admin.php?page=profile');
    exit;
  }
}else{
  header('location: admin.php?page=profile');
  exit();
}

if (isset($_POST['batal'])) {
    echo("<script>
        confirm('Anda yakin meninggalkan Halaman ini?');
        location.href = 'admin.php?page=profile';
      </script>");
    return false;
}

?>

<main>
  <div class="container py-4">
    <div class="p-5 mb-4 bg-light rounded-3">
      <div class="container-fluid py-5">
        <div class="row">
          <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $myUser['id'] ?>">
            <div class="form-floating mb-3 col-md-8 offset-md-2">
              <input type="text" class="form-control" id="nama" name="nama" value="<?= $myUser['nama'] ?>">
              <label for="nama">Nama User</label>
            </div>
            <div class="form-floating mb-3 col-md-8 offset-md-2">
              <input type="text" class="form-control" id="email" name="email" value="<?= $myUser['email'] ?>">
              <label for="email">Email User</label>
            </div>
            <div class="form-floating mb-3 col-md-8 offset-md-2">
              <input type="hidden" class="form-control" id="password" name="password" value="<?= $myUser['password'] ?>">
            </div>
            <div class="form-floating mb-3 col-md-8 offset-md-2">
             <input type="text" class="form-control" id="status" name="status" value="<?= $myUser['status'] ?>">
              <label for="status">Status User</label>
            </div>
            <div class="mb-3 col-md-8 offset-md-2">
              <label for="img" class="mb-2">Img Profile</label>
              <input type="file" class="form-control" id="img" name="img" value="<?= $myUser['img'] ?>">
            </div>
            <div class="mb-3 col-md-8 offset-md-2">
             <button type="submit" name="submit" class="btn btn-outline-primary">Update</button> |
             <button type="cancel" name="batal" class="btn btn-outline-danger">Batal</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</main>