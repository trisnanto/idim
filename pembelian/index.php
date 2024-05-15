<?php
  session_start();
  if(!isset($_SESSION["statuslogin"])){
    header("location:../index.php");
  }
  include "../class/Database.php";
  include "../class/Pembelian.php";
  $pembelian = new Pembelian($database);
  $daftarPembelian = $pembelian->daftarPembelian();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembelian</title>
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
              <h3>Daftar Pembelian</h3>
            </div>
            <div class="col-6 text-end">
              <a href="tambah.php"><button type="button" class="btn btn-success">Tambah Pembelian</button></a>
            </div>
          </div>
          <div class="row">
            <table class="table">
              <thead>
                <th class="text-center" scope="col">Id</th>
                <th class="text-center" scope="col">Id Barang</th>
                <th class="text-center" scope="col">Jumlah Pembelian</th>
                <th class="text-center" scope="col">Harga Beli</th>
                <th class="text-center" scope="col">Total Modal</th>
                <th class="text-center" scope="col">Id Pengguna</th>
                <th class="text-center" scope="col">Kelola</th>
              </thead>
              <tbody>
                <?php
                  // Check if the array is not empty
                  if (!empty($daftarPembelian)) {
                    foreach ($daftarPembelian as $key => $value) {
                      echo "<tr>";
                      echo "<td>".$value['idPembelian']."</td>";
                      echo "<td>".$value['NamaBarang']."</td>";
                      echo '<td class="text-center">'.$value['JumlahPembelian'].'</td>';
                      echo '<td class="text-end">'.$value['HargaBeli'].'</td>';
                      echo '<td class="text-end">'.$value['Modal'].'</td>';
                      echo "<td>".$value['NamaPengguna']."</td>";
                      echo ('<td><form action="../controller/Pembelian.php" method="post"><input type="text" name="action" class="form-control d-none" id="action" aria-describedby="action" value="delete"><input type="text" name="id_pembelian" class="form-control d-none" id="id-pembelian" aria-describedby="id-pembelian" value="'.$value['idPembelian'].'"><a href="edit.php?idPembelian='.$value['idPembelian'].'"><button type="button" class="btn btn-primary">Edit</button></a><span> </span><button type="submit" class="btn btn-danger">Hapus</button></form>');
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