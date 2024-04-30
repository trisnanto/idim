<?php
  session_start();
  include "../class/config.php";
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
      if ($value['idAkses'] == '1') {
        // redirect berdasarkan level user
        $_SESSION['route'] = 'admin';
        header("location:../admin/index.php");
      } elseif ($value['idAkses'] == '2') {
        // redirect berdasarkan level user
        $_SESSION['route'] = 'manajer'; 
        header("location:../manajer/index.php");
      } elseif ($value['idAkses'] == '3') {
        // redirect berdasarkan level user
        $_SESSION['route'] = 'penjualan'; 
        header("location:../penjualan/index.php");
      } elseif ($value['idAkses'] == '4') {
        // redirect berdasarkan level user
        $_SESSION['route'] = 'pembelian'; 
        header("location:../pembelian/index.php");
      } else {
        unset($_SESSION["statuslogin"]);
        $sError="ID HakAkses tidak ditemukan";
        header("location:index.php?sError=".urlencode($sError));
      }
      exit();
    }
  } else {
    $sError="Nama Pengguna atau Password salah!";
    header("location:../index.php?sError=".urlencode($sError));
  }
?>