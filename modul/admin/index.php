<?php session_start();

	if (!$_SESSION['email'] && !$_SESSION['nama']) 
	{
		header('location: ../../index.php');
	}
	if ($_SESSION['email'] && $_SESSION['nama']) 
	{
		require_once '../../config/Config.php';
		require_once '../../templates/header.php';
		require_once 'content.php';
		require_once '../../templates/footer.php';
	}
