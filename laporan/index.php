<?php
  session_start();
  if(!isset($_SESSION["statuslogin"])){
    header("location:../index.php");
  }
  include "../class/config.php";
  include "../class/Laporan.php";
  $laporan = new Laporan($database);
  $laporanLabaRugi = $laporan->getLaporanLabaRugi();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan</title>
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
              <h3>Laporan Laba Rugi</h3>
            </div>
            <div class="col-6 text-end">
            </div>
          </div>
          <div class="row">
            <table class="table">
              <thead>
                <th class="text-center" scope="col">Nama Barang</th>
                <th class="text-center" scope="col">Jumlah Pembelian</th>
                <th class="text-center" scope="col">Harga Beli</th>
                <th class="text-center" scope="col">Total Modal</th>
                <th class="text-center" scope="col">Jumlah Penjualan</th>
                <th class="text-center" scope="col">Harga Jual</th>
                <th class="text-center" scope="col">Omset Penjualan</th>
                <th class="text-center" scope="col">Laba / Rugi</th>
              </thead>
              <tbody>
                <?php
                  // Check if the array is not empty
                  $grandTotalModal = 0;
                  $grandTotalOmset = 0;
                  if (!empty($laporanLabaRugi)) {
                    foreach ($laporanLabaRugi as $key => $value) {
                      echo "<tr>";
                      echo "<td>".$value['NamaBarang']."</td>";
                      echo '<td class="text-center">'.$value['TotalPembelian'].'</td>';
                      echo '<td class="text-end">'.$value['AvgHargaBeli'].'</td>';
                      echo '<td class="text-end">'.$value['TotalModal'].'</td>';
                      echo '<td class="text-center">'.$value['TotalPenjualan'].'</td>';
                      echo '<td class="text-end">'.$value['AvgHargaJual'].'</td>';
                      echo '<td class="text-end">'.$value['TotalOmset'].'</td>';
                      echo '<td class="text-end">'.$value['LabaRugi'].'</td>';
                      echo "</tr>";
                      $grandTotalModal += $value['TotalModal'];
                      $grandTotalOmset += $value['TotalOmset'];
                    }
                  } else {
                    // If the array is empty, display a message
                    echo "<tr>";
                    echo "<td>No items to display.</td>";
                    echo "</tr>";
                  }
                ?>
              </tbody>
              <tfoot>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td class="text-end fw-bold"><?php echo $grandTotalModal ?></td>
                  <td></td>
                  <td></td>
                  <td class="text-end fw-bold"><?php echo $grandTotalOmset ?></td>
                  <td class="text-end fw-bold"><?php echo ($grandTotalOmset-$grandTotalModal) ?></td>
                </tr>
              </tfoot>
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