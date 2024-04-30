<?php
  session_start();
  include "class/config.php";
  include "class/user.php";
  $u = new User($database);
  $u->setUsername (trim(strip_tags($_POST["username"])));
  $u->setPassword (trim(strip_tags($_POST["password"])));
  $data = $u->Authentication();
  
  if(!empty($data)){
    foreach ($data as $key => $value) {
      // SESSION_START() NYA SILAHKAN DI INCLUDE KE SEMUA PAGE PAK, BIAR SESSION USER LOGINNYA KEBACA.
      $_SESSION["statuslogin"]= true;
      //$_SESSION['level'] = $value['id_level'];
      $_SESSION['Roles'] = $value['IdRoles'];
      $_SESSION['nama'] = $value['FirstName'];
      if ($value['IdRoles'] == '7') // SILAHKAN MENYESUAIKAN PAK
        {
          // redirect berdasarkan level user
          header("location:admin/index.php");
        }
      elseif ($value['IdRoles'] == '8')
        {
          // redirect berdasarkan level user 
          header("location:manager/index.php");
        }
      elseif ($value['IdRoles'] == '9')
        {
          //redirect berdasarkan level user
          header("location:gudang/index.php");
        }
      elseif ($value['IdRoles'] == '10')
        {
          // redirect berdasarkan level user
          header("location:pesanan/index.php");
        }
      elseif($value['IdRoles'] == '11')
        {
          // redirect berdasarkan level user
          header("location:produksi/index.php");
        }
      elseif ($value['IdRoles'] == '6')
        {
          // redirect berdasarkan level user
          header("location:kepalabagian/index.php");
        }
      else
        {
          unset($_SESSION["statuslogin"]);
          $sError="Invalid Bagian";
          header("location:index.php?sError=".urlencode($sError));
        }
    }
  } else {
    $sError="Invalid Username and/or Password";
    header("Location:index.php?sError=".urlencode($sError));
  }
?>