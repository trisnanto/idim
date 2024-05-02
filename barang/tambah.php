<?php
  session_start();
  if(!isset($_SESSION["statuslogin"])){
    header("location:../index.php");
  }
  include "../class/config.php";
  include "../class/Supplier.php";
  $supplier = new Supplier($database);
  $daftarSupplier = $supplier->daftarSupplier();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barang</title>
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
              <h3>Tambah Barang</h3>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-8">
              <form action="../controller/Barang.php" method="POST">
                <input type="text" name="action" class="form-control d-none" id="action" aria-describedby="action" value="create">
                <input type="text" name="id_pengguna" class="form-control d-none" id="id-pengguna" aria-describedby="id-pengguna" value="<?php echo $_SESSION['idPengguna'] ?>">

                <div class="row">
                  <div class="col-6">
                    <div class="mb-3">
                      <label for="nama-barang" class="form-label">Nama Barang</label>
                      <input type="text" name="nama_barang" class="form-control" id="nama-barang" required>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="mb-3">
                      <label for="keterangan" class="form-label">Keterangan</label>
                      <input type="text" name="keterangan" class="form-control" id="keterangan" required>
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-6">
                    <div class="mb-3">
                      <label for="satuan" class="form-label">Satuan</label>
                      <input type="text" name="satuan" class="form-control" id="satuan" required>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="mb-3">
                    <label for="id-akses" class="form-label">Nama Supplier</label>
                      <select class="form-select" aria-label="select-id-akses" name="id_supplier">
                        <?php
                          if (!empty($daftarSupplier)) {
                            foreach ($daftarSupplier as $key => $value) {
                              echo ('"<option value="'.$value['idSupplier'].'">'.$value['NamaDepan'].' '.$value['NamaBelakang'].'</option>"');
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