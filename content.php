<?php
if (isset($_GET['page'])) {
	$page = $_GET['page'];

	if ($page == 'mata_pelajaran'){
		require_once 'modul/mata_pelajaran/mataPelajaran.php';

	} elseif ($page=='kelas') {
		require_once 'modul/kelas/Kelas.php';	

	} elseif ($page=='guru') {
		require_once 'modul/Guru/guru.php';

	} elseif ($page=='siswa') {
		require_once 'modul/siswa/siswa.php';

	} elseif ($page=='new_mp') {
		require_once 'modul/mata_pelajaran/tambahData.php';

	}elseif ($page == 'new_gr') {
		require_once 'modul/Guru/tambahDatagr.php';

	}elseif ($page == 'new_kls') {
		require_once 'modul/kelas/tambahDatakls.php';

	} elseif ($page == 'new_sw') {
		require_once 'modul/siswa/tambahDatasw.php';

	} else {
		require_once 'modul/home/home.php';

	}
}else {
	require_once 'modul/home/home.php';  
}