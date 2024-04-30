<?php
  session_start();
  if(!isset($_SESSION["statuslogin"])){
    header("location:../index.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
  </head>
  <body>
    <h1>Dashboard Admin</h1>
    <h4>Hallo <?php echo $_SESSION["NamaPengguna"];?></h4>
  </body>
</html>