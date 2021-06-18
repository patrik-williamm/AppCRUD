<?php 	
if (!$_SESSION['email'] && !$_SESSION['nama']) {
		exit();
}

$myUser = view("SELECT * FROM users WHERE email='$_SESSION[email]'")[0];

function updateProfile($data) {
  global $conn;
  $id = htmlspecialchars($data['id']);
  $nama = htmlspecialchars($data['nama']);
  $email = htmlspecialchars($data['email']);
  $password = htmlspecialchars($data['password']);
  $status = htmlspecialchars($data['status']);
  $img = upload();

  if (empty($img)) {
    return false;
  }

  $result = mysqli_query($conn, "UPDATE users SET 
    id='$id', 
    img='$img', 
    nama='$nama', 
    email='$email', 
    password ='$password', 
    status='$status' 
    WHERE id='$id'");

    return mysqli_affected_rows($conn);
}

function upload() {
  
  $nameImg = $_FILES['img']['name'];
  $sizeImg = $_FILES['img']['size'];
  $err = $_FILES['img']['error'];
  $tmp_name = $_FILES['img']['tmp_name'];

  if ($err == 4) {
    echo "<script>
            alert('error img!!!');
          </script>";
    return false;
  }

  if ($sizeImg > 1000000) {
    echo "<script>
            alert('Ukuran img terlalu besar!!!');
          </script>";
    return false;
  }
  $typeValid = ['jpg', 'jpeg', 'png'];
  $type = explode('.', $nameImg);
  $type = strtolower(end($type));

  if (!in_array($type, $typeValid)) {
    echo "<script>
            alert('type img tidak ditemukan!!');
          </script>";
    return false;
  }

  //generate nama baru
  $namaBaruImg = uniqid();
  $namaBaruImg .= '.';
  $namaBaruImg .= $type;
  
  //location file
  $path = "file/$namaBaruImg";
  move_uploaded_file($tmp_name, $path);
  return $namaBaruImg;
}
if (isset($_GET['id'])) {
  $idUpdate = $_GET['id'];

  if (isset($_POST['submit'])) {
    $myUser = updateProfile($_POST);
    if (!$myUser) {
      header('location:admin.php?page=profile');
    }
    header('location : admin.php?page=profile');

  }
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
             <button type="reset" name="reset" class="btn btn-outline-danger">Batal</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</main>