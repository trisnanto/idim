<?php
  session_start();
  include "../class/config.php";
  include "../class/Barang.php";

  $barang = new Barang($database);
  // $barang->setIdBarang (trim(strip_tags($_POST["id_barang"])));
  $isSuccess = $barang->hapusBarang(trim(strip_tags($_POST["id_barang"])));

  if ($isSuccess) {
    $_SESSION["message"] = "Data barang berhasil dihapus";
    header("location:../barang/index.php");
  } else {
    $_SESSION["message"] = "Data barang gagal dihapus";
    header("location:../barang/tambah.php");
  }
  exit();
?>