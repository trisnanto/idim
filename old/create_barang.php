<?php
  session_start();
  include "../class/config.php";
  include "../class/Barang.php";

  $barang = new Barang($database);
  $barang->setNamaBarang (trim(strip_tags($_POST["nama_barang"])));
  $barang->setKeterangan (trim(strip_tags($_POST["keterangan"])));
  $barang->setSatuan (trim(strip_tags($_POST["satuan"])));
  $barang->setIdPengguna (trim(strip_tags($_SESSION["idPengguna"])));
  $isSuccess = $barang->simpanBarang();

  if ($isSuccess) {
    $_SESSION["message"] = "Data barang berhasil disimpan";
    header("location:../barang/index.php");
  } else {
    $_SESSION["message"] = "Data barang gagal disimpan";
    header("location:../barang/tambah.php");
  }
  exit();
?>