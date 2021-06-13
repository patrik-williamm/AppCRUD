<?php
if (isset($_GET['page'])) {
	$page = $_GET['page'];
	switch ($page) {
		case 'mata_pelajaran':
			require_once 'mata_pelajaran/mataPelajaran.php';
			break;
		case 'kelas':
			require_once 'kelas/Kelas.php';
			break;
		case 'guru':
			require_once 'Guru/guru.php';
			break;
		case 'siswa':
			require_once 'siswa/siswa.php';
			break;
		case 'new_mp':
			require_once 'mata_pelajaran/tambahData.php';
			break;
		case 'new_gr':
			require_once 'Guru/tambahDatagr.php';
			break;
		case 'new_kls':
			require_once 'kelas/tambahDatakls.php';
			break;
		case 'new_sw':
			require_once 'siswa/tambahDatasw.php';
			break;
		case 'edit_mp':
			require_once 'mata_pelajaran/editmp.php';
			break;
		case 'edit_gr':
			require_once 'Guru/editgr.php';
			break;
		case 'edit_kls':
			require_once 'kelas/editkls.php';
			break;
		case 'edit_sw':
			require_once 'siswa/editsw.php';
			break;
		case 'delete_mp':
			require_once 'mata_pelajaran/hapusmp.php';
			break;
		case 'delete_kls':
			require_once 'kelas/hapuskls.php';
			break;
		case 'delete_gr':
			require_once 'Guru/hapusgr.php';
			break;
		case 'delete_sw':
			require_once 'siswa/hapusw.php';
			break;
		default:
			require_once 'home.php';
			break;
	}
}else {
	require_once 'home.php';
}

