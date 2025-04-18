<?php
  session_start();
  if(!isset($_SESSION["statuslogin"])){
    header("location:../index.php");
  }
  include "../class/Database.php";
  include "../class/HakAkses.php";
  include "../class/Pengguna.php";
  $hakAkses = new HakAkses($database);
  $daftarHakAkses = $hakAkses->daftarHakAkses();
  $pengguna = new Pengguna($database);
  $pengguna->setIdPengguna(trim(strip_tags($_GET["idPengguna"])));
  $penggunaTerpilih = $pengguna->cariPengguna();

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengguna</title>
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
              <h3>Rubah Pengguna</h3>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-8">
              <form action="../controller/Pengguna.php" method="POST">
                <input type="text" name="action" class="form-control d-none" id="action" aria-describedby="action" value="update">
                <input type="text" name="id_pengguna" class="form-control d-none" id="id-pengguna" aria-describedby="id-pengguna" value="<?php echo $penggunaTerpilih['idPengguna'] ?>">
                <div class="row">
                  <div class="col-6">
                    <div class="mb-3">
                      <label for="nama-pengguna" class="form-label">Nama Pengguna</label>
                      <input type="text" name="nama_pengguna" class="form-control" id="nama-pengguna" aria-describedby="nama-pengguna" value="<?php echo $penggunaTerpilih['NamaPengguna'] ?>" required>
                    </div>
                    
                  </div>
                  <div class="col-6">
                    <div class="mb-3">
                      <label for="password" class="form-label">Password</label>
                      <input type="text" name="password" class="form-control" id="password" value="<?php echo $penggunaTerpilih['Password'] ?>" required>
                    </div>
                  </div>
                </div>

                 
                <div class="row">
                  <div class="col-6">
                    <div class="mb-3">
                      <label for="nama-depan" class="form-label">Nama Depan</label>
                      <input type="text" name="nama_depan" class="form-control" id="nama-depan" value="<?php echo $penggunaTerpilih['NamaDepan'] ?>" required>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="mb-3">
                      <label for="nama-belakang" class="form-label">Nama Belakang</label>
                      <input type="text" name="nama_belakang" class="form-control" id="nama-belakang" value="<?php echo $penggunaTerpilih['NamaPengguna'] ?>" required>
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-6">
                    <div class="mb-3">
                      <label for="no-hp" class="form-label">No HP</label>
                      <input type="text" name="no_hp" class="form-control" id="no-hp" value="<?php echo $penggunaTerpilih['NoHp'] ?>" required>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="mb-3">
                      <label for="alamat" class="form-label">Alamat</label>
                      <input type="text" name="alamat" class="form-control" id="alamat" value="<?php echo $penggunaTerpilih['Alamat'] ?>" required>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-6">
                    <div class="mb-3">
                      <label for="id-akses" class="form-label">Nama Akses</label>
                      <select class="form-select" aria-label="select-id-akses" name="id_akses">
                        <?php
                          if (!empty($daftarHakAkses)) {
                            foreach ($daftarHakAkses as $key => $value) {
                              if ($value['idAkses'] == $penggunaTerpilih['idAkses']) {
                                echo ('"<option value="'.$value['idAkses'].'" selected>'.$value['NamaAkses'].'</option>"');
                              } else {
                                echo ('"<option value="'.$value['idAkses'].'">'.$value['NamaAkses'].'</option>"');
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
                  <div class="col-6">
                    
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