<?php
  session_start();
  include "../class/config.php";
  include "../class/Barang.php";

  $barang = new Barang($database);
  $daftarBarang = $barang->daftarBarang();

  if ($daftarBarang) {
    $_SESSION["message"] = "Data barang berhasil ditemukan";
    header("location:../barang/index.php");
  } else {
    $_SESSION["message"] = "Data barang masih kosong";
    header("location:../barang/index.php");
  }
  exit();

  
  
?>