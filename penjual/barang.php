<?php
  session_start();
  if(!isset($_SESSION["statuslogin"])){
    header("location:../index.php");
  }
  include "../class/config.php";
  include "../class/Barang.php";
  $barang = new Barang($database);
  // $daftarBarang = $barang->daftarBarang();
  $daftarBarang = $barang->findBarangByPenggunaId($_SESSION['idPengguna']);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penjual - Daftar Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  </head>
  <body>
    <?php
      include "../view/navbar.php";
    ?>
    <div class="container">
      <div class="row">
        <div class="col-3">
          <h3>Daftar Barang</h3>
        </div>
        <div class="col-6">

        </div>
        <div class="col-3">
          <button type="button" class="btn btn-success">Tambah Barang</button>

        </div>
      </div>
      <table class="table">
        <thead>
          <th scope="col">Id</th>
          <th scope="col">Nama Barang</th>
          <th scope="col">Keterangan</th>
          <th scope="col">Jumlah</th>
          <th scope="col">Satuan</th>
          <th scope="col">ID Supplier</th>
          <th scope="col">Kelola</th>
        </thead>
        <tbody>
          <?php
            // Check if the array is not empty
            if (!empty($daftarBarang)) {
              foreach ($daftarBarang as $key => $value) {
                echo "<tr>";
                echo "<td>".$value['idBarang']."</td>";
                echo "<td>".$value['NamaBarang']."</td>";
                echo "<td>".$value['Keterangan']."</td>";
                echo "<td></td>";
                echo "<td>".$value['Satuan']."</td>";
                echo "<td></td>";
                echo '<td><button type="button" class="btn btn-primary">Edit</button><button type="button" class="btn btn-danger">Hapus</button></td>';
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
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>