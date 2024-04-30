<div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
  <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
    <span class="fs-5 d-none d-sm-inline">Kelompok 7</span>
  </a>
  <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
    <li class="nav-item">
      <a href="<?php echo ("../".$_SESSION['route']."/index.php");?>" class="nav-link align-middle px-0">
        <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">Dashboard</span>
      </a>
    </li>
    
    <?php
      if($_SESSION["idAkses"] == "1"){
        echo '<li>
        <a href="../hak-akses/index.php" class="nav-link px-0 align-middle">
          <i class="fs-4 bi-key-fill"></i> <span class="ms-1 d-none d-sm-inline">Hak Akses</span>
        </a>
      </li>
        <li>
        <a href="../pengguna/index.php" class="nav-link px-0 align-middle">
          <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Pengguna</span>
        </a>
      </li>
        ';
      }
    ?>
    
    <?php
      if($_SESSION["idAkses"] != "3"){
        echo '<li>
        <a href="../supplier/index.php" class="nav-link px-0 align-middle">
          <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Supplier</span>
        </a>
      </li>';
      }
    ?>

    <?php
      if($_SESSION["idAkses"] != "4"){
        echo '<li>
        <a href="../pelanggan/index.php" class="nav-link px-0 align-middle">
          <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Pelanggan</span>
        </a>
      </li>';
      }
    ?>
    
    
    <?php
      if($_SESSION["idAkses"] != "3"){
        echo '<li>
        <a href="../barang/index.php" class="nav-link px-0 align-middle">
          <i class="fs-4 bi-grid"></i> <span class="ms-1 d-none d-sm-inline">Barang</span>
        </a>
      </li>
      <li>
      <a href="#" class="nav-link px-0 align-middle">
        <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">Pembelian</span>
      </a>
    </li>';
      }
    ?>
    
    <?php
      if($_SESSION["idAkses"] != "4"){
        echo '<li>
        <a href="../penjualan/index.php" class="nav-link px-0 align-middle">
          <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">Penjualan</span>
        </a>
      </li>';
      }
    ?>
    
    
    <li>
      <a href="../laporan/index.php" class="nav-link px-0 align-middle">
        <i class="fs-4 bi-file-text-fill"></i> <span class="ms-1 d-none d-sm-inline">Laporan</span>
      </a>
    </li>
  </ul>
  <hr>
  <div class="dropdown pb-4">
    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
      <i class="fs-4 bi-person-circle"></i><span class="d-none d-sm-inline mx-1"><?php echo (" ".$_SESSION["NamaDepan"]." ".$_SESSION["NamaBelakang"]);?></span>
    </a>
    <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
        <li><a class="dropdown-item" href="#">Settings</a></li>
        <li><a class="dropdown-item" href="#">Profile</a></li>
        <li>
            <hr class="dropdown-divider">
        </li>
        <li><a class="dropdown-item" href="../controller/logout.php">Sign out</a></li>
    </ul>
  </div>
</div>