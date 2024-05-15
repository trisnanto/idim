<?php
  session_start();
	// check if user logged in
	if(!isset($_SESSION["statuslogin"])){
		header("location:../login.php");
	}
	require_once '../class/Database.php';
	require_once '../class/HakAkses.php';

	// Assuming you're using POST method to interact with this endpoint
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assuming you have some authentication mechanism here

    // Check if required parameters are provided
    if (isset($_POST['action'])) {
        $action = $_POST['action'];

			// Perform actions based on the provided action parameter
			switch ($action) {
				case 'create':
					// Check if all required parameters are provided
					if (isset($_POST['nama_akses'], $_POST['keterangan'])) {
						$hakAkses = new HakAkses($database);
						$hakAkses->setNamaAkses(trim(strip_tags($_POST['nama_akses'])));
						$hakAkses->setKeterangan(trim(strip_tags($_POST['keterangan'])));
						$isSuccess = $hakAkses->simpanHakAkses();
						if ($isSuccess) {
							$_SESSION['message'] = 'Data Hak Akses berhasil disimpan';
							header('location:../hak-akses/index.php');
						} else {
							$_SESSION['message'] = 'Data Hak Akses gagal disimpan';
							header('location:../hak-akses/tambah.php');
						}
						exit();
					} else {
							echo json_encode(['error' => 'Missing required parameters']);
					}
					break;

				case 'update':
					// Check if all required parameters are provided
					if (isset($_POST['id_akses'], $_POST['nama_akses'], $_POST['keterangan'])) {
						$hakAkses = new HakAkses($database);
						$hakAkses->setIdAkses(trim(strip_tags($_POST['id_akses'])));
						$hakAkses->setNamaAkses(trim(strip_tags($_POST['nama_akses'])));
						$hakAkses->setKeterangan(trim(strip_tags($_POST['keterangan'])));
						$isSuccess = $hakAkses->rubahHakAkses();
						if ($isSuccess) {
							$_SESSION['message'] = 'Data Hak Akses berhasil dirubah';
							header('location:../hak-akses/index.php');
						} else {
							$_SESSION['message'] = 'Data Hak Akses gagal dirubah';
							header('location:../hak-akses/tambah.php');
						}
						exit();
					} else {
							echo json_encode(['error' => 'Missing required parameters']);
					}
					break;

				case 'delete':
					// Check if the required parameter is provided
					if (isset($_POST['id_akses'])) {
						$hakAkses = new HakAkses($database);
						$hakAkses->setIdAkses(trim(strip_tags($_POST['id_akses'])));
						$isSuccess = $hakAkses->hapusHakAkses();
						if ($isSuccess) {
							$_SESSION['message'] = 'Data Hak Akses berhasil dihapus';
							header('location:../hak-akses/index.php');
						} else {
							$_SESSION['message'] = 'Data Hak Akses gagal dihapus';
							header('location:../hak-akses/tambah.php');
						}
					} else {
							echo json_encode(['error' => 'Missing required parameter']);
					}
					break;

				default:
					echo json_encode(['error' => 'Invalid action']);
					break;
			}
    } else {
			echo json_encode(['error' => 'Action parameter is missing']);
    }
	
	// } else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
	// 	$hakAkses = new HakAkses($database);
	// 	$daftarHakAkses = $hakAkses->daftarHakAkses();
	// 	if (empty($daftarHakAkses)) {
	// 		echo json_encode(['error' => 'Data Hak Akses tidak ditemukan']);
	// 		exit();
	// 	}
	// 	// echo json_encode($daftarHakAkses);
	// 	$_SESSION['daftarHakAkses'] = $daftarHakAkses;
	// 	header('location:../hak-akses/index.php');
	// 	exit();
	} else {
    // Handle other HTTP methods if needed
    http_response_code(405); // Method Not Allowed
	}
?>
