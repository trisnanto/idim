<?php
  session_start();
  include "../class/config.php";
  include "../class/Barang.php";

  $barang = new Barang($database);
  $barang->setIdBarang (trim(strip_tags($_POST["id_barang"])));
  $barang->setNamaBarang (trim(strip_tags($_POST["nama_barang"])));
  $barang->setKeterangan (trim(strip_tags($_POST["keterangan"])));
  $barang->setSatuan (trim(strip_tags($_POST["satuan"])));
  $isSuccess = $barang->rubahBarang();

  if ($isSuccess) {
    $_SESSION["message"] = "Data barang berhasil dirubah";
    header("location:../barang/index.php");
  } else {
    $_SESSION["message"] = "Data barang gagal dirubah";
    header("location:../barang/tambah.php");
  }
  exit();
?>