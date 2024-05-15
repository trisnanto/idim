<?php
  session_start();
	// check if user logged in
	if(!isset($_SESSION["statuslogin"])){
		header("location:../login.php");
	}
	require_once '../class/Database.php';
	require_once '../class/Penjualan.php';

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
					if (isset($_POST['id_barang'], $_POST['id_pelanggan'], $_POST['jumlah_penjualan'], $_POST['harga_jual'], $_POST['id_pengguna'])) {
						$penjualan = new Penjualan($database);
						$penjualan->setIdBarang(trim(strip_tags($_POST['id_barang'])));
						$penjualan->setIdPelanggan(trim(strip_tags($_POST['id_pelanggan'])));
						$penjualan->setJumlahPenjualan(trim(strip_tags($_POST['jumlah_penjualan'])));
						$penjualan->setHargaJual(trim(strip_tags($_POST['harga_jual'])));
						$penjualan->setIdPengguna(trim(strip_tags($_POST['id_pengguna'])));
						$isSuccess = $penjualan->simpanPenjualan();
						if ($isSuccess) {
							$_SESSION['message'] = 'Data Penjualan berhasil disimpan';
							header('location:../penjualan/index.php');
						} else {
							$_SESSION['message'] = 'Data Penjualan gagal disimpan';
							header('location:../penjualan/tambah.php');
						}
					} else {
							echo json_encode(['error' => 'Missing required parameters']);
					}
					break;

				case 'update':
					// Check if all required parameters are provided
					if (isset($_POST['id_penjualan'], $_POST['id_pelanggan'], $_POST['id_barang'], $_POST['jumlah_penjualan'], $_POST['harga_jual'], $_POST['id_pengguna'])) {
						$penjualan = new Penjualan($database);
						$penjualan->setIdPenjualan(trim(strip_tags($_POST['id_penjualan'])));
						$penjualan->setIdPelanggan(trim(strip_tags($_POST['id_pelanggan'])));
						$penjualan->setIdBarang(trim(strip_tags($_POST['id_barang'])));
						$penjualan->setJumlahPenjualan(trim(strip_tags($_POST['jumlah_penjualan'])));
						$penjualan->setHargaJual(trim(strip_tags($_POST['harga_jual'])));
						$penjualan->setIdPengguna(trim(strip_tags($_POST['id_pengguna'])));
						$isSuccess = $penjualan->rubahPenjualan();
						if ($isSuccess) {
							$_SESSION['message'] = 'Data Penjualan berhasil dirubah';
							header('location:../penjualan/index.php');
						} else {
							$_SESSION['message'] = 'Data Penjualan gagal dirubah';
							header('location:../penjualan/tambah.php');
						}
						exit();
					} else {
							echo json_encode(['error' => 'Missing required parameters']);
					}
					break;

				case 'delete':
					// Check if the required parameter is provided
					if (isset($_POST['id_penjualan'])) {
						$penjualan = new Penjualan($database);
						$penjualan->setIdPenjualan(trim(strip_tags($_POST['id_penjualan'])));
						$isSuccess = $penjualan->hapusPenjualan();
						if ($isSuccess) {
							$_SESSION['message'] = 'Data Penjualan berhasil dihapus';
							header('location:../penjualan/index.php');
						} else {
							$_SESSION['message'] = 'Data Penjualan gagal dihapus';
							header('location:../penjualan/tambah.php');
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
