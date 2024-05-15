<?php
  session_start();
  if(!isset($_SESSION["statuslogin"])){
    header("location:../index.php");
  }
  include "../class/Database.php";
  include "../class/Barang.php";
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
              <h3>Tambah Pembelian</h3>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-10">
              <form action="../controller/Pembelian.php" method="POST">
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
                              echo ('"<option value="'.$value['idBarang'].'">'.$value['NamaBarang'].' - Stock : '.$value['Stok'].' - Harga Beli Terakhir : '.$value['HargaBeliTerakhir'].'</option>"');
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
                      <label for="jumlah-pembelian" class="form-label">Jumlah Pembelian</label>
                      <input type="number" name="jumlah_pembelian" class="form-control" id="jumlah-pembelian" required>
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="mb-3">
                      <label for="harga-beli" class="form-label">Harga Beli</label>
                      <input type="number" name="harga_beli" class="form-control" id="harga-beli" required>
                    </div>
                  </div>
                </div>

                <div class="row">
                  
                  <div class="col-6">
                    <div class="mb-3">
                      
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