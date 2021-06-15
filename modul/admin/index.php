<?php session_start();

if (!$_SESSION['email'] && !$_SESSION['nama']) {
	header('location: ../../index.php');
}
if ($_SESSION['status']=='user') {
	die('akses dilarang!!!');
	exit;
	header_remove();
}
require_once '../../config/Config.php';
require_once '../../templates/header.php';
require_once 'content.php';
require_once '../../templates/footer.php';
