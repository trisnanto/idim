<?php
  class Pembelian {
    private $idPembelian;
    private $idBarang;
    private $JumlahPembelian;
    private $HargaBeli;
    private $idPengguna;

    private $conn;

    public function __construct(\PDO $database) {
      $this->conn = $database;
    }

    function setIdPembelian ($idPembelian) {
      $this->idPembelian = $idPembelian;
    }

    function setIdPengguna ($idPengguna) {
      $this->idPengguna = $idPengguna;
    }

    function setIdBarang ($idBarang) {
      $this->idBarang = $idBarang;
    }

    function setJumlahPembelian ($JumlahPembelian) {
      $this->JumlahPembelian = $JumlahPembelian;
    }

    function setHargaBeli ($HargaBeli) {
      $this->HargaBeli = $HargaBeli;
    }

    function getIdPembelian () {
      return $idPembelian;
    }

    function getIdPengguna () {
      return $idPengguna;
    }

    function getIdBarang () {
      return $idBarang;
    }

    function getJumlahPembelian () {
      return $JumlahPembelian;
    }

    function getHargaBeli () {
      return $HargaBeli;
    }

    // create pembelian
    function simpanPembelian() {
      try {
        $query = "INSERT INTO Pembelian(idPengguna, idBarang, JumlahPembelian, HargaBeli) VALUES (?, ?, ?, ?)";
        $prepareDB = $this->conn->prepare($query);
        $isSuccess = $prepareDB->execute([$this->idPengguna, $this->idBarang, $this->JumlahPembelian, $this->HargaBeli]);
        return $isSuccess;
      } catch (Exception $e) {
        throw $e;
      }
    }

    // read pembelian
    function daftarPembelian() {
      // $sql = "SELECT * FROM Pembelian";
      // $sql = "SELECT * FROM Pembelian JOIN Pengguna ON Pembelian.idPengguna = Pengguna.idPengguna JOIN Barang ON Pembelian.idBarang = Barang.idBarang";
      $sql = "SELECT a.idPembelian, a.JumlahPembelian, a.HargaBeli, c.NamaBarang, b.NamaPengguna, (a.JumlahPembelian*a.HargaBeli) Modal FROM Pembelian a JOIN Pengguna b ON a.idPengguna = b.idPengguna JOIN Barang c ON a.idBarang = c.idBarang";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    // update pembelian
    function rubahPembelian() {
      try {
        $query = "UPDATE Pembelian SET idPengguna = ?, idBarang = ?, JumlahPembelian = ?, HargaBeli = ? WHERE idPembelian = ?";
        $prepareDB = $this->conn->prepare($query);
        $isSuccess = $prepareDB->execute([$this->idPengguna, $this->idBarang, $this->JumlahPembelian, $this->HargaBeli, $this->idPembelian]);
        return $isSuccess;
      } catch (Exception $e) {
        throw $e;
      }
    }

    //delete pembelian
    function hapusPembelian() {
      try {
        $query = "DELETE FROM Pembelian WHERE idPembelian = ?";
        $prepareDB = $this->conn->prepare($query);
        $isSuccess = $prepareDB->execute([$this->idPembelian]);
        return $isSuccess;
      } catch (Exception $e) {
        throw $e;
      }
    }

    // find pembelian by id
    function cariPembelian() {
      try {
        $query = "SELECT * FROM Pembelian WHERE idPembelian = ?";
        $prepareDB = $this->conn->prepare($query);
        $prepareDB->execute([$this->idPembelian]);
        $dataPembelian = $prepareDB->fetch();
        return $dataPembelian;
      } catch (Exception $e) {
        throw $e;
      }
    }


  }
?>