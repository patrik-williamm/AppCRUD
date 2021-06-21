<?php
ob_start();
if (isset($_GET['page'])) {
	$page = filter_var($_GET['page'], FILTER_SANITIZE_URL);
	switch ($page) {
		case 'mp':
			require_once 'modul/mp/mataPelajaran.php';
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
			require_once 'modul/mp/tambahData.php';
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
			require_once 'modul/mp/editmp.php';
			break;
		case 'edit_gr':
			require_once 'modul/Guru/editgr.php';
			break;
		case 'edit_kls':
			require_once 'modul/kelas/editkls.php';
			break;
		case 'edit_sw':
			require_once 'modul/siswa/editsw.php';
			break;
		case 'delete_mp':
			require_once 'modul/mp/hapusmp.php';
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
		case 'profile':
			require_once 'modul/profile/index.php';
			break;
		case 'upProfile':
			require_once 'modul/profile/editprofile.php';
			break;
		default:
			require_once 'modul/home/home.php';
			break;
	}
}else {
	require_once 'modul/home/home.php';
}

