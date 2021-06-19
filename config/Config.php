<?php
$conn = mysqli_connect('localhost', 'root', '', 'mydb');
if (!$conn) {
	die('connetion failed');
}

//constant
define('BASEURL', 'http://localhost/AppCRUD');

/***************
function untuk menampilkan query dari database
****************/
function view($sql) {
	global $conn;
	$result = mysqli_query($conn, $sql);
	$data = [];
	while ($dt = mysqli_fetch_assoc($result)) {
		$data[] = $dt;
	}
	return $data;
}

/***************
function untuk upload img
****************/
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