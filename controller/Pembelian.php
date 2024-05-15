<?php
  session_start();
	// check if user logged in
	if(!isset($_SESSION["statuslogin"])){
		header("location:../login.php");
	}
	require_once '../class/Database.php';
	require_once '../class/Pembelian.php';

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
					if (isset($_POST['id_barang'], $_POST['jumlah_pembelian'], $_POST['harga_beli'], $_POST['id_pengguna'])) {
						$pembelian = new Pembelian($database);
						$pembelian->setIdBarang(trim(strip_tags($_POST['id_barang'])));
						$pembelian->setJumlahPembelian(trim(strip_tags($_POST['jumlah_pembelian'])));
						$pembelian->setHargaBeli(trim(strip_tags($_POST['harga_beli'])));
						$pembelian->setIdPengguna(trim(strip_tags($_POST['id_pengguna'])));
						$isSuccess = $pembelian->simpanPembelian();
						if ($isSuccess) {
							$_SESSION['message'] = 'Data Pembelian berhasil disimpan';
							header('location:../pembelian/index.php');
						} else {
							$_SESSION['message'] = 'Data Pembelian gagal disimpan';
							header('location:../pembelian/tambah.php');
						}
					} else {
							echo json_encode(['error' => 'Missing required parameters']);
					}
					break;

				case 'update':
					// Check if all required parameters are provided
					if (isset($_POST['id_pembelian'], $_POST['id_barang'], $_POST['jumlah_pembelian'], $_POST['harga_beli'], $_POST['id_pengguna'])) {
						$pembelian = new Pembelian($database);
						$pembelian->setIdPembelian(trim(strip_tags($_POST['id_pembelian'])));
						$pembelian->setIdBarang(trim(strip_tags($_POST['id_barang'])));
						$pembelian->setJumlahPembelian(trim(strip_tags($_POST['jumlah_pembelian'])));
						$pembelian->setHargaBeli(trim(strip_tags($_POST['harga_beli'])));
						$pembelian->setIdPengguna(trim(strip_tags($_POST['id_pengguna'])));
						$isSuccess = $pembelian->rubahPembelian();
						if ($isSuccess) {
							$_SESSION['message'] = 'Data Pembelian berhasil dirubah';
							header('location:../pembelian/index.php');
						} else {
							$_SESSION['message'] = 'Data Pembelian gagal dirubah';
							header('location:../pembelian/tambah.php');
						}
						exit();
					} else {
							echo json_encode(['error' => 'Missing required parameters']);
					}
					break;

				case 'delete':
					// Check if the required parameter is provided
					if (isset($_POST['id_pembelian'])) {
						$pembelian = new Pembelian($database);
						$pembelian->setIdPembelian(trim(strip_tags($_POST['id_pembelian'])));
						$isSuccess = $pembelian->hapusPembelian();
						if ($isSuccess) {
							$_SESSION['message'] = 'Data Pembelian berhasil dihapus';
							header('location:../pembelian/index.php');
						} else {
							$_SESSION['message'] = 'Data Pembelian gagal dihapus';
							header('location:../pembelian/tambah.php');
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
