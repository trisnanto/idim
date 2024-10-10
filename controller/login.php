<?php
	session_start();
	include "../class/Database.php";
	include "../class/Pengguna.php";
	$pengguna = new Pengguna($database);
	$pengguna->setNamaPengguna (trim(strip_tags($_POST["username"])));
	$pengguna->setPassword (trim(strip_tags($_POST["password"])));
	$dataPengguna = $pengguna->Authentication();
	
	if(!empty($dataPengguna)){
		foreach ($dataPengguna as $key => $value) {
			$_SESSION["statuslogin"] = true;
			$_SESSION['idPengguna'] = $value['idPengguna'];
			$_SESSION['idAkses'] = $value['idAkses'];
			$_SESSION['NamaPengguna'] = $value['NamaPengguna'];
			$_SESSION['NamaDepan'] = $value['NamaDepan'];
			$_SESSION['NamaBelakang'] = $value['NamaBelakang'];
			$_SESSION['idAkses'] = $value['idAkses'];
		}
		if ($_SESSION['idAkses'] == '1') {
			$_SESSION['route'] = 'admin';
			header("location:../admin/index.php");
		} elseif ($_SESSION['idAkses'] == '2') {
			$_SESSION['route'] = 'manajer'; 
			header("location:../manajer/index.php");
		} elseif ($_SESSION['idAkses'] == '3') {
			$_SESSION['route'] = 'penjualan'; 
			header("location:../penjualan/index.php");
		} elseif ($_SESSION['idAkses'] == '4') {
			$_SESSION['route'] = 'pembelian'; 
			header("location:../pembelian/index.php");
		} else {
			unset($_SESSION["statuslogin"]);
			$sError="ID HakAkses tidak ditemukan";
			header("location:../index.php?sError=".urlencode($sError));
		}
		exit();
	} else {
		$sError="Nama Pengguna atau Password salah!";
		header("location:../index.php?sError=".urlencode($sError));
	}
?>