<?php
$conn = mysqli_connect('localhost', 'root', '', 'mydb');
if (!$conn) {
	die('connetion failed');
}
//function untuk menampilkan data
function view($sql) {
	global $conn;

	$result = mysqli_query($conn, $sql);
	$data = [];
	while ($dt = mysqli_fetch_assoc($result)) {
		$data[] = $dt;
	}

	return $data;
}
//function tambah data mata pelajaran
function tambahDataMP($data) {
	global $conn;

	$id_mp = htmlspecialchars($data['id_mp']);
	$nama_mp = htmlspecialchars(rtrim($data['nama_mp']));
	$jurusan_mp = htmlspecialchars($data['jurusan_mp']);

	$cekMp = mysqli_query($conn, "SELECT nama_mp FROM mata_pelajaran WHERE nama_mp='$nama_mp'");
	mysqli_fetch_row($cekMp);
	if (mysqli_fetch_assoc($cekMp) > 1) 
	{
		header('location: admin.php?page=mata_pelajaran&data=failed');
		return false;
	}
	else
	{
		$result = mysqli_query($conn, "INSERT INTO mata_pelajaran VALUES ('$id_mp', '$nama_mp', '$jurusan_mp')");	
	}
	return mysqli_affected_rows($conn);
}

//function registerasi user
function register($data) {
	global $conn;

	$id = htmlspecialchars($_POST['id']);
	$nama = htmlspecialchars($_POST['nama']);
	$email = stripcslashes($_POST['email']);
	$tmp_lahir = htmlspecialchars($_POST['tmp_lahir']);
	$tgl_lahir = htmlspecialchars($_POST['tgl_lahir']);
	$gender = htmlspecialchars($_POST['gender']);
	$alamat = htmlspecialchars($_POST['alamat']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	$konfirmasiPassword = mysqli_real_escape_string($conn, $_POST['konfirmasiPassword']);

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
	$result = mysqli_query($conn, "INSERT INTO users VALUES( '', '$nama', '$email', '$tmp_lahir', '$tgl_lahir', '$gender', '$alamat', '$password' )");

	return mysqli_affected_rows($conn);
}


