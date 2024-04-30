<?php
  session_start();
	// check if user logged in
	if(!isset($_SESSION["statuslogin"])){
		header("location:../login.php");
	}
	require_once '../class/config.php';
	require_once '../class/Pengguna.php';

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
					if (isset($_POST['nama_pengguna'], $_POST['password'], $_POST['nama_depan'], $_POST['nama_belakang'], $_POST['no_hp'], $_POST['alamat'], $_POST['id_akses'])) {
						$pengguna = new Pengguna($database);
						$pengguna->setNamaPengguna(trim(strip_tags($_POST['nama_pengguna'])));
						$pengguna->setPassword(trim(strip_tags($_POST['password'])));
						$pengguna->setNamaDepan(trim(strip_tags($_POST['nama_depan'])));
						$pengguna->setNamaBelakang(trim(strip_tags($_POST['nama_belakang'])));
						$pengguna->setNoHp(trim(strip_tags($_POST['no_hp'])));
						$pengguna->setAlamat(trim(strip_tags($_POST['alamat'])));
						$pengguna->setIdAkses(trim(strip_tags($_POST['id_akses'])));
						$isSuccess = $pengguna->simpanPengguna();
						if ($isSuccess) {
							$_SESSION['message'] = 'Data Pengguna berhasil disimpan';
							header('location:../pengguna/index.php');
						} else {
							$_SESSION['message'] = 'Data Pengguna gagal disimpan';
							header('location:../pengguna/tambah.php');
						}
					} else {
							echo json_encode(['error' => 'Missing required parameters']);
					}
					break;

				case 'update':
					// Check if all required parameters are provided
					if (isset($_POST['id_pengguna'], $_POST['nama_pengguna'], $_POST['password'], $_POST['nama_depan'], $_POST['nama_belakang'], $_POST['no_hp'], $_POST['alamat'], $_POST['id_akses'])) {
						$pengguna = new Pengguna($database);
						$pengguna->setIdPengguna(trim(strip_tags($_POST['id_pengguna'])));
						$pengguna->setNamaPengguna(trim(strip_tags($_POST['nama_pengguna'])));
						$pengguna->setPassword(trim(strip_tags($_POST['password'])));
						$pengguna->setNamaDepan(trim(strip_tags($_POST['nama_depan'])));
						$pengguna->setNamaBelakang(trim(strip_tags($_POST['nama_belakang'])));
						$pengguna->setNoHp(trim(strip_tags($_POST['no_hp'])));
						$pengguna->setAlamat(trim(strip_tags($_POST['alamat'])));
						$pengguna->setIdAkses(trim(strip_tags($_POST['id_akses'])));
						$isSuccess = $pengguna->rubahPengguna();
						if ($isSuccess) {
							$_SESSION['message'] = 'Data Pengguna berhasil dirubah';
							header('location:../pengguna/index.php');
						} else {
							$_SESSION['message'] = 'Data Pengguna gagal dirubah';
							header('location:../pengguna/tambah.php');
						}
						exit();
					} else {
							echo json_encode(['error' => 'Missing required parameters']);
					}
					break;

				case 'delete':
					// Check if the required parameter is provided
					if (isset($_POST['id_pengguna'])) {
						$pengguna = new Pengguna($database);
						$pengguna->setIdPengguna(trim(strip_tags($_POST['id_pengguna'])));
						$isSuccess = $pengguna->hapusPengguna();
						if ($isSuccess) {
							$_SESSION['message'] = 'Data Pengguna berhasil dihapus';
							header('location:../pengguna/index.php');
						} else {
							$_SESSION['message'] = 'Data Pengguna gagal dihapus';
							header('location:../pengguna/tambah.php');
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
	} else {
    // Handle other HTTP methods if needed
    http_response_code(405); // Method Not Allowed
	}
	exit();
?>
