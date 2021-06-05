<?php
$conn = mysqli_connect('localhost', 'root', '', 'mydb');
if (!$conn) {
	die('connetion failed');
}

define('BASEURL', 'http://localhost/PwWebApp');

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
//function tambah data kelas
function tambahDatakls($data) {
	global $conn;

	$id_kelas = htmlspecialchars($data['id_kelas']);
	$nama_walikls = htmlspecialchars($data['nama_walikls']);
	$jlh_siswa = htmlspecialchars($data['jlh_siswa']);
	$nama_kls = htmlspecialchars($data['nama_kls']);

	$cek = mysqli_query($conn, "SELECT nama_kls FROM kelas WHERE nama_kls='$nama_kls' ");
	mysqli_fetch_row($cek);
	if (mysqli_fetch_assoc($cek) > 1) {
		header('location: admin.php?page=kelas&data=failed');
		return false;
	}
	// if (empty($kelas)) {
	// 	header('location: admin.php?page=kelas&data=failed');
	// 	return false;
	// }

	$result = mysqli_query($conn, "INSERT INTO kelas VALUES ( '$id_kelas', '$nama_walikls', '$jlh_siswa', '$nama_kls' )");

	return mysqli_affected_rows($conn);
}
//function tambah data mata pelajaran
function tambahDataMP($data) {
	global $conn;

	$id_mp = htmlspecialchars($data['id_mp']);
	$nama_mp = htmlspecialchars(rtrim(ucwords($data['nama_mp'])));
	$jurusan_mp = htmlspecialchars(strtoupper($data['jurusan_mp']));


	$cekMp = mysqli_query($conn, "SELECT nama_mp FROM mata_pelajaran WHERE nama_mp='$nama_mp'");
	mysqli_fetch_row($cekMp);
	if (mysqli_fetch_assoc($cekMp) > 1) 
	{
		header('location: admin.php?page=mata_pelajaran&data=failed');
		return false;
	}
	//cek apakah semua data telah diisi
	if (empty($nama_mp) && empty($jurusan_mp)) {
		header('location: admin.php?page=mata_pelajaran&data=failed');
		return false;
	}
	$result = mysqli_query($conn, "INSERT INTO mata_pelajaran VALUES ('$id_mp', '$nama_mp', '$jurusan_mp')");	
	return mysqli_affected_rows($conn);
}

//function tambah data guru
function tambahDatagr($data) {
	global $conn;

	$id_guru = htmlspecialchars($data['id_guru']);
	$nama_guru = htmlspecialchars($data['nama_guru']);
	$nip = htmlspecialchars(trim($data['nip']));
	$alamat = htmlspecialchars($data['alamat']);
	$email = htmlspecialchars(trim(stripcslashes($data['email'])));
	$guru_study =htmlspecialchars($data['guru_study']);
	$status_guru = htmlspecialchars($data['status_guru']);

	//cek data yang di input
	if (empty($nama_guru) && empty($nip) && empty($email)) {
		header('location: admin.php?page=guru&data=failed');
		return false;
	}

	$cek1 = mysqli_query($conn, "SELECT nip FROM guru WHERE nip='$nip'");
	mysqli_fetch_row($cek1);
	if (mysqli_fetch_assoc($cek1) > 1) {
		header('location : admin.php?page=guru&data=failed');
		return false;
	}else{
		$result = mysqli_query($conn, "INSERT INTO guru VALUES ( '$id_guru', '$nama_guru', '$nip', '$alamat', '$email', '$guru_study', '$status_guru' )");
	}

	return mysqli_affected_rows($conn);
}

function tambahDatass($data) {
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


