<?php
  session_start();
  if(!isset($_SESSION["statuslogin"])){
    header("location:../index.php");
  }
  include "../class/config.php";
  include "../class/Pembelian.php";
  include "../class/Barang.php";
  $pembelian = new Pembelian($database);
  $pembelian->setIdPembelian(trim(strip_tags($_GET["idPembelian"])));
  $pembelianTerpilih = $pembelian->cariPembelian();
  $barang = new Barang($database);
  $daftarBarang = $barang->daftarBarang();

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
          <div class="row text-center">
            <div class="col-12">
              <h3>Rubah Pembelian</h3>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-8">
              <form action="../controller/Pembelian.php" method="POST">
                <input type="text" name="action" class="form-control d-none" id="action" aria-describedby="action" value="update">
                <input type="text" name="id_pembelian" class="form-control d-none" id="id-pembelian" aria-describedby="id-pembelian" value="<?php echo $pembelianTerpilih['idPembelian'] ?>">
                <input type="text" name="id_pengguna" class="form-control d-none" id="id-pengguna" aria-describedby="id-pengguna" value="<?php echo $_SESSION['idPengguna'] ?>">
                
                <div class="row">
                  <div class="col-5">
                    <div class="mb-3">
                    <label for="id-barang" class="form-label">Nama Barang</label>
                      <select class="form-select" aria-label="select-id-barang" name="id_barang">
                        <?php
                          if (!empty($daftarBarang)) {
                            foreach ($daftarBarang as $key => $value) {
                              if ($value['idBarang'] == $pembelianTerpilih['idBarang']) {
                                echo ('"<option value="'.$value['idBarang'].'" selected>'.$value['NamaBarang'].'</option>"');
                              } else {
                                echo ('"<option value="'.$value['idBarang'].'">'.$value['NamaBarang'].'</option>"');
                              }
                            }
                          } else {
                            // If the array is empty, display a message
                            echo ('<option value="">Tidak ada pilihan</option>');
                          }
                        ?>
                      </select>
                    </div>
                    
                  </div>
                  <div class="col-3">
                    <div class="mb-3">
                      <label for="jumlah-pembelian" class="form-label">Jumlah Pembelian</label>
                      <input type="number" name="jumlah_pembelian" class="form-control" id="jumlah-pembelian" value="<?php echo $pembelianTerpilih['JumlahPembelian'] ?>" required>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="mb-3">
                      <label for="harga-beli" class="form-label">Harga Beli</label>
                      <input type="number" name="harga_beli" class="form-control" id="harga-beli" value="<?php echo $pembelianTerpilih['HargaBeli'] ?>" required>
                    </div>
                </div>

                <div class="row">
                  <div class="col-6">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
                  <div class="col-6">
                    
                  </div>
                </div>
              </form>
            </div>
          </div>
          
        </div>
      
      </div>
    </div>
    <script src="/bootstrap/js/bootstrap.bundle.min.js"></script>
  </body>
</html>