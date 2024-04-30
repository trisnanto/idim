<?php
  session_start();
  include "../class/config.php";
  include "../class/Supplier.php";

  $supplier = new Supplier($database);
  $supplier->setNamaDepan (trim(strip_tags($_POST["nama_depan"])));
  $supplier->setNamaBelakang (trim(strip_tags($_POST["nama_belakang"])));
  $supplier->setNoHp (trim(strip_tags($_POST["no_hp"])));
  $supplier->setAlamat (trim(strip_tags($_POST["alamat"])));
  $isSuccess = $supplier->simpanSupplier();

  if ($isSuccess) {
    $_SESSION["message"] = "Data supplier berhasil disimpan";
    header("location:../supplier/index.php");
  } else {
    $_SESSION["message"] = "Data supplier gagal disimpan";
    header("location:../supplier/tambah.php");
  }
  exit();
?>