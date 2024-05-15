<?php
  session_start();
  if(!isset($_SESSION["statuslogin"])){
    header("location:../index.php");
  }
  include "../class/Database.php";
  include "../class/HakAkses.php";
  $hakAkses = new HakAkses($database);
  $daftarHakAkses = $hakAkses->daftarHakAkses();
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
    
    
    <div class="container-fluid">
      <div class="row flex-nowrap">
        <div class="col-auto col-md-2 col-xl-2 px-sm-2 px-0 bg-dark">
          <?php
            include "../view/sidebar.php";
          ?>
        </div>
        <div class="col p-3">
          <div class="row">
            <div class="col-6">
              <h3>Daftar Hak Akses</h3>
            </div>
            <div class="col-6 text-end">
              <a href="tambah.php"><button type="button" class="btn btn-success">Tambah Hak Akses</button></a>
            </div>
          </div>
          <div class="row">
            <table class="table">
              <thead>
                <th scope="col">Id</th>
                <th scope="col">Nama Akses</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Kelola</th>
              </thead>
              <tbody>
                <?php
                  // Check if the array is not empty
                  if (!empty($daftarHakAkses)) {
                    foreach ($daftarHakAkses as $key => $value) {
                      echo "<tr>";
                      echo "<td>".$value['idAkses']."</td>";
                      echo "<td>".$value['NamaAkses']."</td>";
                      echo "<td>".$value['Keterangan']."</td>";
                      echo ('<td><form action="../controller/HakAkses.php" method="post"><input type="text" name="action" class="form-control d-none" id="action" aria-describedby="action" value="delete"><input type="text" name="id_akses" class="form-control d-none" id="id-akses" aria-describedby="id-akses" value="'.$value['idAkses'].'"><a href="edit.php?idAkses='.$value['idAkses'].'"><button type="button" class="btn btn-primary">Edit</button></a><span> </span><button type="submit" class="btn btn-danger">Hapus</button></form>');
                      echo "</tr>";
                    }
                  } else {
                    // If the array is empty, display a message
                    echo "<tr>";
                    echo "<td>No items to display.</td>";
                    echo "</tr>";
                  }
                ?>
              </tbody>
            </table>
          </div>
          <div class="row">
            <?php 
              if(isset($_SESSION["message"])) {
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">';
                echo $_SESSION["message"];
                echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                unset($_SESSION["message"]);
              }
            ?>
          </div>
        </div>
      </div>
    </div>
    <script src="/bootstrap/js/bootstrap.bundle.min.js"></script>
  </body>
</html>