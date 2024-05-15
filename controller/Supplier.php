<?php
  session_start();
	// check if user logged in
	if(!isset($_SESSION["statuslogin"])){
		header("location:../login.php");
	}
	require_once '../class/Database.php';
	require_once '../class/Supplier.php';

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
						$supplier = new Supplier($database);
						$supplier->setNamaDepan(trim(strip_tags($_POST['nama_depan'])));
						$supplier->setNamaBelakang(trim(strip_tags($_POST['nama_belakang'])));
						$supplier->setNoHp(trim(strip_tags($_POST['no_hp'])));
						$supplier->setAlamat(trim(strip_tags($_POST['alamat'])));
						$isSuccess = $supplier->simpanSupplier();
						if ($isSuccess) {
							$_SESSION['message'] = 'Data Supplier berhasil disimpan';
							header('location:../supplier/index.php');
						} else {
							$_SESSION['message'] = 'Data Supplier gagal disimpan';
							header('location:../supplier/tambah.php');
						}
					} else {
							echo json_encode(['error' => 'Missing required parameters']);
					}
					break;

				case 'update':
					// Check if all required parameters are provided
					if (isset($_POST['id_supplier'], $_POST['nama_depan'], $_POST['nama_belakang'], $_POST['no_hp'], $_POST['alamat'])) {
						$supplier = new Supplier($database);
						$supplier->setIdSupplier(trim(strip_tags($_POST['id_supplier'])));
						$supplier->setNamaDepan(trim(strip_tags($_POST['nama_depan'])));
						$supplier->setNamaBelakang(trim(strip_tags($_POST['nama_belakang'])));
						$supplier->setNoHp(trim(strip_tags($_POST['no_hp'])));
						$supplier->setAlamat(trim(strip_tags($_POST['alamat'])));
						$isSuccess = $supplier->rubahSupplier();
						if ($isSuccess) {
							$_SESSION['message'] = 'Data Supplier berhasil dirubah';
							header('location:../supplier/index.php');
						} else {
							$_SESSION['message'] = 'Data Supplier gagal dirubah';
							header('location:../supplier/tambah.php');
						}
						exit();
					} else {
							echo json_encode(['error' => 'Missing required parameters']);
					}
					break;

				case 'delete':
					// Check if the required parameter is provided
					if (isset($_POST['id_supplier'])) {
						$supplier = new Supplier($database);
						$supplier->setIdSupplier(trim(strip_tags($_POST['id_supplier'])));
						$isSuccess = $supplier->hapusSupplier();
						if ($isSuccess) {
							$_SESSION['message'] = 'Data Supplier berhasil dihapus';
							header('location:../supplier/index.php');
						} else {
							$_SESSION['message'] = 'Data Supplier gagal dihapus';
							header('location:../supplier/tambah.php');
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
