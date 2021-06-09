<?php
if (isset($_GET['page'])) {
	$page = $_GET['page'];
	switch ($page) {
		default:
			require_once '../index.php';
			break;
	}
}else {
	require_once '../index.php';
}

