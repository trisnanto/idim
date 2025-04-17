<?php
  session_start();
  include "../class/config.php";
  include "../class/Pelanggan.php";

  $pelanggan = new Pelanggan($database);
  $pelanggan->setNamaDepan (trim(strip_tags($_POST["nama_depan"])));
  $pelanggan->setNamaBelakang (trim(strip_tags($_POST["nama_belakang"])));
  $pelanggan->setNoHp (trim(strip_tags($_POST["no_hp"])));
  $pelanggan->setAlamat (trim(strip_tags($_POST["alamat"])));
  $isSuccess = $pelanggan->simpanPelanggan();

  if ($isSuccess) {
    $_SESSION["message"] = "Data pelanggan berhasil disimpan";
    header("location:../pelanggan/index.php");
  } else {
    $_SESSION["message"] = "Data pelanggan gagal disimpan";
    header("location:../pelanggan/tambah.php");
  }
  exit();
?>