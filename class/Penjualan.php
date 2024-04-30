<?php
  class Penjualan {
    private $idPenjualan;
    private $idPengguna;
    private $idBarang;
    private $idPelanggan;
    private $JumlahPenjualan;
    private $HargaJual;

    private $conn;

    public function __construct(\PDO $database) {
      $this->conn = $database;
    }

    function setIdPenjualan ($idPenjualan) {
      $this->idPenjualan = $idPenjualan;
    }

    function setIdPengguna ($idPengguna) {
      $this->idPengguna = $idPengguna;
    }

    function setIdBarang ($idBarang) {
      $this->idBarang = $idBarang;
    }

    function setIdPelanggan ($idPelanggan) {
      $this->idPelanggan = $idPelanggan;
    }

    function setJumlahPenjualan ($JumlahPenjualan) {
      $this->JumlahPenjualan = $JumlahPenjualan;
    }

    function setHargaJual ($HargaJual) {
      $this->HargaJual = $HargaJual;
    }

    function getIdPenjualan () {
      return $idPenjualan;
    }

    function getIdPengguna () {
      return $idPengguna;
    }

    function getIdBarang () {
      return $idBarang;
    }

    function getIdPelanggan () {
      return $idpelanggan;
    }

    function getJumlahPenjualan () {
      return $JumlahPenjualan;
    }

    function getHargaJual () {
      return $HargaJual;
    }

    // create Penjualan
    function simpanPenjualan() {
      try {
        $query = "INSERT INTO Penjualan(idPengguna, idBarang, idPelanggan, JumlahPenjualan, HargaJual) VALUES (?, ?, ?, ?, ?)";
        $prepareDB = $this->conn->prepare($query);
        $isSuccess = $prepareDB->execute([$this->idPengguna, $this->idBarang, $this->idPelanggan, $this->JumlahPenjualan, $this->HargaJual]);
        return $isSuccess;
      } catch (Exception $e) {
        throw $e;
      }
    }

    // read Penjualan
    function daftarPenjualan() {
      $sql = "SELECT * FROM Penjualan";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    // update Penjualan
    function rubahPenjualan() {
      try {
        $query = "UPDATE Penjualan SET idPengguna = ?, idBarang = ?, idPelanggan = ?, JumlahPenjualan = ?, HargaJual = ? WHERE idAkses = ?";
        $prepareDB = $this->conn->prepare($query);
        $isSuccess = $prepareDB->execute([$this->idPengguna, $this->idBarang, $this->idPelanggan, $this->JumlahPenjualan, $this->HargaJual, $this->idPenjualan]);
        return $isSuccess;
      } catch (Exception $e) {
        throw $e;
      }
    }

     //delete hak akses
     function hapusPenjualan() {
      try {
        $query = "DELETE FROM Penjualan WHERE idPenjualan = ?";
        $prepareDB = $this->conn->prepare($query);
        $isSuccess = $prepareDB->execute([$this->idPenjualan]);
        return $isSuccess;
      } catch (Exception $e) {
        throw $e;
      }
    }


  }
?>