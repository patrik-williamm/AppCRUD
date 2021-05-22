<?php session_start();
if (!$_SESSION['email'] && !$_SESSION['nama']) {
	header('location: index.php');
}

require_once 'config/Config.php';
require_once 'template/header.php';
require_once 'content.php';
require_once 'template/footer.php';