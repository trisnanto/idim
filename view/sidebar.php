<div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
  <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
    <span class="fs-5 d-none d-sm-inline">Kelompok 7</span>
  </a>
  <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
    <li class="nav-item">
      <a href="<?php echo ("../".$_SESSION['route']."/index.php");?>" class="nav-link align-middle px-0">
        <img style="filter: invert(1)" src="/icons/speedometer2.svg" width="32" height="32"> <span class="ms-1 d-none d-sm-inline">Dashboard</span>
      </a>
    </li>
    
    <?php
      if($_SESSION["idAkses"] == "1"){
        echo '<li>
        <a href="../hak-akses/index.php" class="nav-link px-0 align-middle">
          <img style="filter: invert(1)" src="/icons/key-fill.svg" width="32" height="32"> <span class="ms-1 d-none d-sm-inline">Hak Akses</span>
        </a>
      </li>
        <li>
        <a href="../pengguna/index.php" class="nav-link px-0 align-middle">
          <img style="filter: invert(1)" src="/icons/people-fill.svg" width="32" height="32"> <span class="ms-1 d-none d-sm-inline">Pengguna</span>
        </a>
      </li>
        ';
      }
    ?>
    
    <?php
      if($_SESSION["idAkses"] != "3"){
        echo '<li>
        <a href="../supplier/index.php" class="nav-link px-0 align-middle">
          <img style="filter: invert(1)" src="/icons/people-fill.svg" width="32" height="32"> <span class="ms-1 d-none d-sm-inline">Supplier</span>
        </a>
      </li>';
      }
    ?>

    <?php
      if($_SESSION["idAkses"] != "4"){
        echo '<li>
        <a href="../pelanggan/index.php" class="nav-link px-0 align-middle">
          <img style="filter: invert(1)" src="/icons/people-fill.svg" width="32" height="32"> <span class="ms-1 d-none d-sm-inline">Pelanggan</span>
        </a>
      </li>';
      }
    ?>
    
    
    <?php
      if($_SESSION["idAkses"] != "3"){
        echo '<li>
        <a href="../barang/index.php" class="nav-link px-0 align-middle">
          <img style="filter: invert(1)" src="/icons/grid-fill.svg" width="32" height="32"> <span class="ms-1 d-none d-sm-inline">Barang</span>
        </a>
      </li>
      ';
      }
    ?>

    <?php
      if($_SESSION["idAkses"] != "3"  && $_SESSION["idAkses"] != "4"){
        echo '
      <li>
      <a href="../pembelian/index.php" class="nav-link px-0 align-middle">
        <img style="filter: invert(1)" src="/icons/table.svg" width="32" height="32"> <span class="ms-1 d-none d-sm-inline">Pembelian</span>
      </a>
    </li>';
      }
    ?>
    
    <?php
      if($_SESSION["idAkses"] != "3" && $_SESSION["idAkses"] != "4"){
        echo '<li>
        <a href="../penjualan/index.php" class="nav-link px-0 align-middle">
          <img style="filter: invert(1)" src="/icons/table.svg" width="32" height="32"> <span class="ms-1 d-none d-sm-inline">Penjualan</span>
        </a>
      </li>';
      }
    ?>

    <?php
      if($_SESSION["idAkses"] == "1" || $_SESSION["idAkses"] == "2"){
        echo '<li>
        <a href="../laporan/index.php" class="nav-link px-0 align-middle">
          <img style="filter: invert(1)" src="/icons/file-fill.svg" width="32" height="32"> <span class="ms-1 d-none d-sm-inline">Laporan</span>
        </a>
      </li>';
      }
    ?>
    
    <li>
      <a class="dropdown-item" href="../controller/logout.php"><button class="btn btn-danger">Logout <?php echo (" ".$_SESSION["NamaPengguna"]);?></button></a>
    </li>
    
  </ul>
  
</div>