<?php
$conn = mysqli_connect('localhost', 'root', '', 'mydb');
if (!$conn) {
	die('connetion failed');
}

//constant url
define('BASEURL', 'http://localhost/AppCRUD');

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
//tambah data siswa
function tambahDatass($data) {
	global $conn;

	$id_siswa = htmlspecialchars($data['id_siswa']);
	$nama_siswa = htmlspecialchars($data['nama_siswa']);
	$nis = htmlspecialchars($data['nis']);
	$kelas = htmlspecialchars($data['kelas']);

	$cek = mysqli_query($conn, "SELECT nama_siswa, nis FROM siswa WHERE nama_siswa='$nama_siswa' and nis='$nis' ");
	mysqli_fetch_row($cek);
	if (mysqli_fetch_assoc($cek) > 1) {
		header('location: admin.php?page=siswa&data=failed');
		return false;
	}

	$result = mysqli_query($conn, "INSERT INTO siswa VALUES ( '', '$nama_siswa', '$nis', '$kelas' )");

	return mysqli_affected_rows($conn);
}
//edit matapelajaran
function editmp($data) {
	global $conn;

	$id_mp = htmlspecialchars($data['id_mp']);
	$nama_mp = htmlspecialchars($data['nama_mp']);
	$jurusan_mp = htmlspecialchars($data['jurusan_mp']);

	$result = mysqli_query($conn, "UPDATE mata_pelajaran SET id_mp='$id_mp', nama_mp='$nama_mp', jurusan_mp='$jurusan_mp' WHERE id_mp='$id_mp' ");
	return mysqli_affected_rows($conn);
}

function editgr($data) {
	global $conn;

	$id_guru = htmlspecialchars($data['id_guru']);
	$nama_guru = htmlspecialchars($data['nama_guru']);
	$nip = htmlspecialchars($data['nip']);
	$alamat = htmlspecialchars($data['alamat']);
	$email = stripslashes($data['email']);
	$guru_mp = htmlspecialchars($data['guru_mp']);
	$status = htmlspecialchars($data['status']);

	$result = mysqli_query($conn, "UPDATE guru SET id_guru='$id_guru', nama_guru='$nama_guru', nip='$nip', alamat='$alamat', email='$email',guru_mp='$guru_mp', status='$status' WHERE id_guru='$id_guru' ");
	return mysqli_affected_rows($conn);
}

function editsw($data) {
	global $conn;

	$id_siswa = htmlspecialchars($data['id_siswa']);
	$nama_siswa = htmlspecialchars($data['nama_siswa']);
	$nis = htmlspecialchars($data['nis']);
	$kelas_siswa = htmlspecialchars($data['kelas_siswa']);	

	$result = mysqli_query($conn, "UPDATE siswa SET id_siswa='$id_siswa', nama_siswa='$nama_siswa', nis='$nis', kelas_siswa='$kelas_siswa' WHERE id_siswa='$id_siswa'");
	return mysqli_affected_rows($conn);	
}

function editkls($data) {
	global $conn;

	$id_kelas = htmlspecialchars($data['id_kelas']);
	$nama_Walikls = htmlspecialchars($data['nama_Walikls']);
	$jlh_siswa = htmlspecialchars($data['jlh_siswa']);
	$nama_kls = htmlspecialchars($data['nama_kls']);

	$result = mysqli_query($conn, "UPDATE kelas SET id_kelas='', nama_Walikls='$nama_Walikls', jlh_siswa='$jlh_siswa', nama_kls='$nama_kls' WHERE id_kelas='$id_kelas'");

	return mysqli_affected_rows($conn);
}

//hapus data dari query
function hapusdata($id) {
	global $conn;
	$result = mysqli_query($conn, "DELETE FROM mata_pelajaran WHERE id_mp='$id'");
	return mysqli_affected_rows($conn);
}

function hapusdatakls($id) {
	global $conn;
	$result = mysqli_query($conn, "DELETE FROM kelas WHERE id_kelas='$id'");
	return mysqli_affected_rows($conn);
}

function hapusdatagr($id) {
	global $conn;
	$result = mysqli_query($conn, "DELETE FROM guru WHERE id_guru='$id'");
	return mysqli_affected_rows($conn);
}
function hapusdataklssw($id) {
	global $conn;
	$result = mysqli_query($conn, "DELETE FROM siswa WHERE id_siswa='$id'");
	return mysqli_affected_rows($conn);
}

//registerasi user
function register($data) {
	global $conn;

	$id = htmlspecialchars($_POST['id']);
	$nama = htmlspecialchars($_POST['nama']);
	$email = stripcslashes($_POST['email']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	$konfirmasiPassword = mysqli_real_escape_string($conn, $_POST['konfirmasiPassword']);
	$status = htmlspecialchars($_POST['status']);

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
	$result = mysqli_query($conn, "INSERT INTO users VALUES( '', 'images.jpg','$nama', '$email', '$password', 'user' )");

	return mysqli_affected_rows($conn);
}


