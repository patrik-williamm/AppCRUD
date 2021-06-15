<?php
if (isset($_GET['q'])) {
	$q = $_GET['q'];
	switch ($q) {
		case 'kelas':
			require_once 'kelas/index.php';
			break;
		case 'jadwal':
			require_once 'jadwal/index.php';
			break;
		default:
			require_once 'home.php';
			break;
	}
}else {
	require_once 'home.php';
}

