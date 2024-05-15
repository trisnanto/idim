<?php
  include "../class/Database.php";
  include "Roles.php";
  include "User.php";
  $roles = new Roles($database);
  $daftarRoles = $roles->rolesList();
  $user = new User($database);
  $userId = trim(strip_tags($_GET["userId"]));
  $userData = $user->findUserById($userId);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,
    initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head;
    any other head content must come *after* these tags -->
    <title>Edit User</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script
    src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></scr
    ipt>
    <script
    src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <?php include "navbar.php"; ?>

    <div class="container-fluid">
      <div class="col-md-7 col-md-offset-2">
        <form class="form-horizontal" method="POST" action="UsersController.php">
          <legend>Form Edit User </legend>
          <div class="form-group d-none">
            <div class="col-md-7">
              <input required type="number" class="form-control" id="IdUser" placeholder="IdUser" name="IdUser" value="<?php echo $userData['IdUser'] ?>">
            </div>
          </div>
          <div class="form-group">
            <label for="Username" class="col-md-2">Username</label>
            <div class="col-md-7">
              <input required type="text" class="form-control" id="Username" placeholder="Username" name="Username" value="<?php echo $userData['Username'] ?>">
            </div>
          </div>
          <div class="form-group">
            <label for="Password" class="col-md-2">Password</label>
            <div class="col-md-7">
              <input required type="text" class="form-control" id="Password" placeholder="Password" name="Password" value="<?php echo $userData['Password'] ?>">
            </div>
          </div>
          <div class="form-group">
            <label for="NamaDepan" class="col-md-2">Nama Depan</label>
            <div class="col-md-7">
              <input required type="text" class="form-control" id="NamaDepan" placeholder="NamaDepan" name="NamaDepan" value="<?php echo $userData['NamaDepan'] ?>">
            </div>
          </div>
          <div class="form-group">
            <label for="NamaBelakang" class="col-md-2">Nama Belakang</label>
            <div class="col-md-7">
              <input required type="text" class="form-control" id="NamaBelakang" placeholder="NamaBelakang" name="NamaBelakang" value="<?php echo $userData['NamaBelakang'] ?>">
            </div>
          </div>
          <div class="form-group">
            <label for="Alamat" class="col-md-2">Alamat</label>
            <div class="col-md-7">
              <input required type="text" class="form-control" id="Alamat" placeholder="Alamat" name="Alamat" value="<?php echo $userData['Alamat'] ?>">
            </div>
          </div>
          <div class="form-group">
            <label for="Hp" class="col-md-2">Hp</label>
            <div class="col-md-7">
              <input required type="text" class="form-control" id="Hp" placeholder="Hp" name="Hp" value="<?php echo $userData['Hp'] ?>">
            </div>
          </div>
          <div class="form-group">
            <label for="IdRole" class="col-md-2">Id Role</label>
            <div class="col-md-7">
              <input required type="number" class="form-control" id="IdRole" placeholder="IdRole" name="IdRole" value="<?php echo $userData['IdRole'] ?>">
            </div>
          </div>
          <br>
          <div class="form-group">
            <div div class="col-md-7 col-md-offset-2">
              <input type="submit" class="btn btn-primary" name="edit" value="Simpan">
              <a class="btn btn-danger" href="index.php" role="button">Batal</a>
            </div>
          </div>
        </form>
      </div>
    </div>
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins)-->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- <script src="../../js/bootstrap.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>