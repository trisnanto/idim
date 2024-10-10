<?php
  include "../class/Database.php";
  include "User.php";
  $newUser = new User($database);
  $newUser->setUsername('anto');
  $newUser->setPassword('123');
  $data = $newUser->authenticateUser();
  
  if(!empty($data)){
    echo $data['Username'] . " " . $data['Password'] . " " . $data['NamaDepan'] . " " . $data['NamaBelakang'];
    // foreach ($data as $key => $value) {
    //   echo $value['Username'];
      // $_SESSION['statusLogin']= true;
      // $_SESSION['IdRole'] = $value['IdRole'];
      // $_SESSION['NamaDepan'] = $value['NamaDepan'];
      // $_SESSION['NamaBelakang'] = $value['NamaBelakang'];
      
      // if ($value['IdRole'] == '1') {
      //   // redirect berdasarkan level user
      //   header("location:admin/index.php");
      // } else if ($value['IdRole'] == '2') {
      //   // redirect berdasarkan level user 
      //   header("location:manager/index.php");
      // } else if ($value['IdRoles'] == '3') {
      //   //redirect berdasarkan level user
      //   header("location:gudang/index.php");
      // } else if ($value['IdRole'] == '4') {
      //   // redirect berdasarkan level user
      //   header("location:pesanan/index.php");
      // } else if($value['IdRole'] == '5') {
      //   // redirect berdasarkan level user
      //   header("location:produksi/index.php");
      // } elseif ($value['IdRole'] == '6') {
      //   // redirect berdasarkan level user
      //   header("location:penjualan/index.php");
      // } else {
      //   unset($_SESSION["statusLogin"]);
      //   $sError="Invalid Role";
      //   header("location:index.php?sError=".urlencode($sError));
      // }
    // }
  } else {
    $sError="Invalid Username and/or Password";
    header("Location:index.php?sError=".urlencode($sError));
  }
?>