<?php
  session_start();
  if(!isset($_SESSION["statuslogin"])){
    header("location:../index.php");
  }
  include "../class/config.php";
  include "../class/Penjualan.php";
  $penjualan = new Penjualan($database);
  $daftarPenjualan = $penjualan->daftarPenjualan();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penjualan</title>
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
              <h3>Daftar Penjualan</h3>
            </div>
            <div class="col-6 text-end">
              <a href="tambah.php"><button type="button" class="btn btn-success">Tambah Penjualan</button></a>
            </div>
          </div>
          <div class="row">
            <table class="table">
              <thead>
                <th class="text-center" scope="col">Id</th>
                <th class="text-center" scope="col">Nama Barang</th>
                <th class="text-center" scope="col">Jumlah Penjualan</th>
                <th class="text-center" scope="col">Harga Jual</th>
                <th class="text-center" scope="col">Omset Penjualan</th>
                <th class="text-center" scope="col">Nama Pengguna</th>
                <th class="text-center" scope="col">Nama Pelanggan</th>
                <th class="text-center" scope="col">Kelola</th>
              </thead>
              <tbody>
                <?php
                  // Check if the array is not empty
                  if (!empty($daftarPenjualan)) {
                    foreach ($daftarPenjualan as $key => $value) {
                      echo "<tr>";
                      echo "<td>".$value['idPenjualan']."</td>";
                      echo "<td>".$value['NamaBarang']."</td>";
                      echo '<td class="text-center">'.$value['JumlahPenjualan'].'</td>';
                      echo '<td class="text-end">'.$value['HargaJual'].'</td>';
                      echo '<td class="text-end">'.$value['Omset'].'</td>';
                      echo "<td>".$value['NamaPengguna']."</td>";
                      echo "<td>".$value['NamaPelanggan']."</td>";
                      echo ('<td><form action="../controller/Penjualan.php" method="post"><input type="text" name="action" class="form-control d-none" id="action" aria-describedby="action" value="delete"><input type="text" name="id_penjualan" class="form-control d-none" id="id-penjualan" aria-describedby="id-penjualan" value="'.$value['idPenjualan'].'"><a href="edit.php?idPenjualan='.$value['idPenjualan'].'"><button type="button" class="btn btn-primary">Edit</button></a><span> </span><button type="submit" class="btn btn-danger">Hapus</button></form>');
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