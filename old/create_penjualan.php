<?php
  session_start();
  include "../class/config.php";
  include "../class/Penjualan.php";

  $penjualan = new Penjualan($database);
  $penjualan->setIdPengguna (trim(strip_tags($_SESSION["idPengguna"])));
  $penjualan->setIdBarang (trim(strip_tags($_POST["id_barang"])));
  $penjualan->setIdPelanggan (trim(strip_tags($_POST["id_pelanggan"])));
  $penjualan->setJumlahPenjualan (trim(strip_tags($_POST["jumlah_penjualan"])));
  $penjualan->setHargaJual (trim(strip_tags($_POST["harga_jual"])));
  $isSuccess = $penjualan->simpanPenjualan();

  if ($isSuccess) {
    $_SESSION["message"] = "Data penjualan berhasil disimpan";
    header("location:../penjualan/index.php");
  } else {
    $_SESSION["message"] = "Data penjualan gagal disimpan";
    header("location:../penjualan/tambah.php");
  }
  exit();
?>