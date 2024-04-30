<?php
  session_start();
  include "../class/config.php";
  include "../class/Pembelian.php";

  $pembelian = new Pembelian($database);
  $pembelian->setIdPengguna (trim(strip_tags($_SESSION["idPengguna"])));
  $pembelian->setIdBarang (trim(strip_tags($_POST["id_barang"])));
  $pembelian->setJumlahPembelian (trim(strip_tags($_POST["jumlah_pembelian"])));
  $pembelian->setHargaBeli (trim(strip_tags($_POST["harga_beli"])));
  $isSuccess = $pembelian->simpanPembelian();

  if ($isSuccess) {
    $_SESSION["message"] = "Data pembelian berhasil disimpan";
    header("location:../pembelian/index.php");
  } else {
    $_SESSION["message"] = "Data pembelian gagal disimpan";
    header("location:../pembelian/tambah.php");
  }
  exit();
?>