<?php
  session_start();
	// check if user logged in
	if(!isset($_SESSION["statuslogin"])){
		header("location:../login.php");
	}
	require_once '../class/config.php';
	require_once '../class/Pelanggan.php';

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
					if (isset($_POST['nama_depan'], $_POST['nama_belakang'], $_POST['no_hp'], $_POST['alamat'])) {
						$pelanggan = new Pelanggan($database);
						$pelanggan->setNamaDepan(trim(strip_tags($_POST['nama_depan'])));
						$pelanggan->setNamaBelakang(trim(strip_tags($_POST['nama_belakang'])));
						$pelanggan->setNoHp(trim(strip_tags($_POST['no_hp'])));
						$pelanggan->setAlamat(trim(strip_tags($_POST['alamat'])));
						$isSuccess = $pelanggan->simpanPelanggan();
						if ($isSuccess) {
							$_SESSION['message'] = 'Data Pelanggan berhasil disimpan';
							header('location:../pelanggan/index.php');
						} else {
							$_SESSION['message'] = 'Data Pelanggan gagal disimpan';
							header('location:../pelanggan/tambah.php');
						}
					} else {
							echo json_encode(['error' => 'Missing required parameters']);
					}
					break;

				case 'update':
					// Check if all required parameters are provided
					if (isset($_POST['id_pelanggan'], $_POST['nama_depan'], $_POST['nama_belakang'], $_POST['no_hp'], $_POST['alamat'])) {
						$pelanggan = new Pelanggan($database);
						$pelanggan->setIdPelanggan(trim(strip_tags($_POST['id_pelanggan'])));
						$pelanggan->setNamaDepan(trim(strip_tags($_POST['nama_depan'])));
						$pelanggan->setNamaBelakang(trim(strip_tags($_POST['nama_belakang'])));
						$pelanggan->setNoHp(trim(strip_tags($_POST['no_hp'])));
						$pelanggan->setAlamat(trim(strip_tags($_POST['alamat'])));
						$isSuccess = $pelanggan->rubahPelanggan();
						if ($isSuccess) {
							$_SESSION['message'] = 'Data Pelanggan berhasil dirubah';
							header('location:../pelanggan/index.php');
						} else {
							$_SESSION['message'] = 'Data Pelanggan gagal dirubah';
							header('location:../pelanggan/tambah.php');
						}
						exit();
					} else {
							echo json_encode(['error' => 'Missing required parameters']);
					}
					break;

				case 'delete':
					// Check if the required parameter is provided
					if (isset($_POST['id_pelanggan'])) {
						$pelanggan = new Pelanggan($database);
						$pelanggan->setIdPelanggan(trim(strip_tags($_POST['id_pelanggan'])));
						$isSuccess = $pelanggan->hapusPelanggan();
						if ($isSuccess) {
							$_SESSION['message'] = 'Data Pelanggan berhasil dihapus';
							header('location:../pelanggan/index.php');
						} else {
							$_SESSION['message'] = 'Data Pelanggan gagal dihapus';
							header('location:../pelanggan/tambah.php');
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
