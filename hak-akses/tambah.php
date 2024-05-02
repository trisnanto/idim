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
    <title>Hak Akses</title>
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    
    <?php 
      if(isset($_SESSION["message"])) {
        echo '<div class="alert alert-danger" role="alert">';
        echo $_SESSION["message"];
        echo "</div>";
        unset($_SESSION["message"]);
      }
    ?>
    <div class="container-fluid">
      <div class="row flex-nowrap">

        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
          <?php
            include "../view/sidebar.php";
          ?>
        </div>
        
        <div class="col py-3">
          <div class="row">

            <div class="col-6">
              <h3>Tambah Hak Akses</h3>
            </div>
            <div class="col-6 text-end">
              
            </div>
          </div>
          <div class="row">
            <form action="../controller/HakAkses.php" method="POST">
              <input type="text" name="action" class="form-control d-none" id="action" aria-describedby="action" value="create">

              <div class="mb-3">
                <label for="nama-akses" class="form-label">Nama Akses</label>
                <input type="text" name="nama_akses" class="form-control" id="nama-akses" aria-describedby="nama-akses" required>
              </div>
              <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <input type="text" name="keterangan" class="form-control" id="keterangan" required>
              </div>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
          </div>
          
        </div>
      
      </div>
    </div>
    <script src="/bootstrap/js/bootstrap.bundle.min.js"></script>
  </body>
</html>