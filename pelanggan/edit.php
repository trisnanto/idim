<?php
  session_start();
  if(!isset($_SESSION["statuslogin"])){
    header("location:../index.php");
  }
  include "../class/config.php";
  include "../class/Pelanggan.php";
  $pelanggan = new Pelanggan($database);
  $pelanggan->setIdPelanggan(trim(strip_tags($_GET["idPelanggan"])));
  $pelangganTerpilih = $pelanggan->cariPelanggan();

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pelanggan</title>
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
              <h3>Rubah Pelanggan</h3>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-8">
              <form action="../controller/Pelanggan.php" method="POST">
                <input type="text" name="action" class="form-control d-none" id="action" aria-describedby="action" value="update">
                <input type="text" name="id_pelanggan" class="form-control d-none" id="id-pelanggan" aria-describedby="id-pelanggan" value="<?php echo $pelangganTerpilih['idPelanggan'] ?>">
                
                <div class="row">
                  <div class="col-6">
                    <div class="mb-3">
                      <label for="nama-depan" class="form-label">Nama Depan</label>
                      <input type="text" name="nama_depan" class="form-control" id="nama-depan" value="<?php echo $pelangganTerpilih['NamaDepan'] ?>" required>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="mb-3">
                      <label for="nama-belakang" class="form-label">Nama Belakang</label>
                      <input type="text" name="nama_belakang" class="form-control" id="nama-belakang" value="<?php echo $pelangganTerpilih['NamaBelakang'] ?>" required>
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-6">
                    <div class="mb-3">
                      <label for="no-hp" class="form-label">No HP</label>
                      <input type="text" name="no_hp" class="form-control" id="no-hp" value="<?php echo $pelangganTerpilih['NoHp'] ?>" required>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="mb-3">
                      <label for="alamat" class="form-label">Alamat</label>
                      <input type="text" name="alamat" class="form-control" id="alamat" value="<?php echo $pelangganTerpilih['Alamat'] ?>" required>
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