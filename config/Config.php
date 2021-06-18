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