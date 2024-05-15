<?php
  session_start();
  if(!isset($_SESSION["statuslogin"])){
    header("location:../index.php");
  }
  include "../class/Database.php";
  include "../class/Barang.php";
  include "../class/Pelanggan.php";
  $barang = new Barang($database);
  $daftarBarang = $barang->daftarBarangSiapJual();
  $pelanggan = new Pelanggan($database);
  $daftarPelanggan = $pelanggan->daftarPelanggan();

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

        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
          <?php
            include "../view/sidebar.php";
          ?>
        </div>
        
        <div class="col py-3">
          <div class="row text-center">
            <div class="col-12">
              <h3>Tambah Penjualan</h3>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-10">
              <form action="../controller/Penjualan.php" method="POST">
                <input type="text" name="action" class="form-control d-none" id="action" aria-describedby="action" value="create">
                <input type="text" name="id_pengguna" class="form-control d-none" id="id-pengguna" aria-describedby="id-pengguna" value="<?php echo $_SESSION['idPengguna'] ?>">
                
                <div class="row">
                  <div class="col-7">
                    <div class="mb-3">
                      <label for="id-barang" class="form-label">Nama Barang</label>
                      <select class="form-select" aria-label="select-id-barang" name="id_barang">
                        <?php
                          if (!empty($daftarBarang)) {
                            foreach ($daftarBarang as $key => $value) {
                              echo ('"<option value="'.$value['idBarang'].'">'.$value['NamaBarang'].' - Stock : '.$value['Stok'].' - Harga Jual Terakhir : '.$value['HargaJualTerakhir'].'</option>"');
                            }
                          } else {
                            // If the array is empty, display a message
                            echo ('<option value="">Tidak ada pilihan</option>');
                          }
                        ?>
                      </select>
                    </div>
                    
                  </div>
                  <div class="col-2">
                    <div class="mb-3">
                      <label for="jumlah-penjualan" class="form-label">Jumlah Penjualan</label>
                      <input type="number" name="jumlah_penjualan" class="form-control" id="jumlah-penjualan" required>
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="mb-3">
                      <label for="harga-jual" class="form-label">Harga Jual</label>
                      <input type="number" name="harga_jual" class="form-control" id="harga-jual" required>
                    </div>
                  </div>
                </div>

                <div class="row">
                  
                  <div class="col-6">
                    <div class="mb-3">
                      <label for="id-pelanggan" class="form-label">Nama Pelanggan</label>
                      <select class="form-select" aria-label="select-id-pelanggan" name="id_pelanggan">
                        <?php
                          if (!empty($daftarPelanggan)) {
                            foreach ($daftarPelanggan as $key => $value) {
                              echo ('"<option value="'.$value['idPelanggan'].'">'.$value['NamaDepan'].' '.$value['NamaBelakang'].'</option>"');
                            }
                          } else {
                            // If the array is empty, display a message
                            echo ('<option value="">Tidak ada pilihan</option>');
                          }
                        ?>
                      </select>
                    </div>
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