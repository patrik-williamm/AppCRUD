<?php
$conn = mysqli_connect('localhost', 'root', '', 'mydb');
if (!$conn) {
	die('connetion failed');
}

function view($sql) {
	global $conn;

	$result = mysqli_query($conn, $sql);
	$data = [];
	while ($dt = mysqli_fetch_assoc($result)) {
		$data[] = $dt;
	}

	return $data;
}
function register($data) {
	global $conn;

	$id = htmlspecialchars($_POST['id_users']);
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


