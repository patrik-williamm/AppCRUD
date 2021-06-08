<?php
if (isset($_GET['page'])) {
	$page = $_GET['page'];
	switch ($page) {
		case 'mata_pelajaran':
			require_once 'modul/mata_pelajaran/mataPelajaran.php';
			break;
		case 'kelas':
			require_once 'modul/kelas/Kelas.php';
			break;
		case 'guru':
			require_once 'modul/Guru/guru.php';
			break;
		case 'siswa':
			require_once 'modul/siswa/siswa.php';
			break;
		case 'new_mp':
			require_once 'modul/mata_pelajaran/tambahData.php';
			break;
		case 'new_gr':
			require_once 'modul/Guru/tambahDatagr.php';
			break;
		case 'new_kls':
			require_once 'modul/kelas/tambahDatakls.php';
			break;
		case 'new_sw':
			require_once 'modul/siswa/tambahDatasw.php';
			break;
		case 'edit_mp':
			require_once 'modul/mata_pelajaran/editmp.php';
			break;
		case 'delete_mp':
			require_once 'modul/mata_pelajaran/hapusmp.php';
			break;
		case 'delete_kls':
			require_once 'modul/kelas/hapuskls.php';
			break;
		case 'delete_gr':
			require_once 'modul/Guru/hapusgr.php';
			break;
		case 'delete_sw':
			require_once 'modul/siswa/hapusw.php';
			break;
		default:
			require_once 'modul/index.php';
			break;
	}
}else {
	require_once 'modul/index.php';
	die();
}

