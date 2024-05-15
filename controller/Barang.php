<?php
  session_start();
	// check if user logged in
	if(!isset($_SESSION["statuslogin"])){
		header("location:../login.php");
	}
	require_once '../class/Database.php';
	require_once '../class/Barang.php';

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
					if (isset($_POST['nama_barang'], $_POST['keterangan'], $_POST['satuan'], $_POST['id_pengguna'], $_POST['id_supplier'])) {
						$barang = new Barang($database);
						$barang->setNamaBarang(trim(strip_tags($_POST['nama_barang'])));
						$barang->setKeterangan(trim(strip_tags($_POST['keterangan'])));
						$barang->setSatuan(trim(strip_tags($_POST['satuan'])));
						$barang->setIdPengguna(trim(strip_tags($_POST['id_pengguna'])));
						$barang->setIdSupplier(trim(strip_tags($_POST['id_supplier'])));
						$isSuccess = $barang->simpanBarang();
						if ($isSuccess) {
							$_SESSION['message'] = 'Data Barang berhasil disimpan';
							header('location:../barang/index.php');
						} else {
							$_SESSION['message'] = 'Data Barang gagal disimpan';
							header('location:../barang/tambah.php');
						}
					} else {
							echo json_encode(['error' => 'Missing required parameters']);
					}
					break;

				case 'update':
					// Check if all required parameters are provided
					if (isset($_POST['id_barang'], $_POST['nama_barang'], $_POST['keterangan'], $_POST['satuan'], $_POST['id_pengguna'], $_POST['id_supplier'])) {
						$barang = new Barang($database);
						$barang->setIdBarang(trim(strip_tags($_POST['id_barang'])));
						$barang->setNamaBarang(trim(strip_tags($_POST['nama_barang'])));
						$barang->setKeterangan(trim(strip_tags($_POST['keterangan'])));
						$barang->setSatuan(trim(strip_tags($_POST['satuan'])));
						$barang->setIdPengguna(trim(strip_tags($_POST['id_pengguna'])));
						$barang->setIdSupplier(trim(strip_tags($_POST['id_supplier'])));
						$isSuccess = $barang->rubahBarang();
						if ($isSuccess) {
							$_SESSION['message'] = 'Data Barang berhasil dirubah';
							header('location:../barang/index.php');
						} else {
							$_SESSION['message'] = 'Data Barang gagal dirubah';
							header('location:../barang/tambah.php');
						}
						exit();
					} else {
							echo json_encode(['error' => 'Missing required parameters']);
					}
					break;

				case 'delete':
					// Check if the required parameter is provided
					if (isset($_POST['id_barang'])) {
						$barang = new Barang($database);
						$barang->setIdBarang(trim(strip_tags($_POST['id_barang'])));
						$isSuccess = $barang->hapusBarang();
						if ($isSuccess) {
							$_SESSION['message'] = 'Data Barang berhasil dihapus';
							header('location:../barang/index.php');
						} else {
							$_SESSION['message'] = 'Data Barang gagal dihapus';
							header('location:../barang/tambah.php');
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
