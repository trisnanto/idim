<?php
  class Barang {
    private $idBarang;
    private $NamaBarang;
    private $Keterangan;
    private $Satuan;
    private $idPengguna;

    private $conn;

    public function __construct(\PDO $database) {
      $this->conn = $database;
    }

    function setIdBarang ($idBarang) {
      $this->idBarang = $idBarang;
    }

    function setNamaBarang ($NamaBarang) {
      $this->NamaBarang = $NamaBarang;
    }

    function setKeterangan ($Keterangan) {
      $this->Keterangan = $Keterangan;
    }

    function setSatuan ($Satuan) {
      $this->Satuan = $Satuan;
    }

    function setIdPengguna ($idPengguna) {
      $this->idPengguna = $idPengguna;
    }

    function getIdBarang () {
      return $idBarang;
    }

    function getNamaBarang () {
      return $NamaBarang;
    }

    function getKeterangan () {
      return $Keterangan;
    }

    function getSatuan () {
      return $Satuan;
    }

    function getIdPengguna () {
      return $idPengguna;
    }

    // create barang
    function simpanBarang() {
      try {
        $query = "INSERT INTO Barang(NamaBarang, Keterangan, Satuan, idPengguna) VALUES (?, ?, ?, ?)";
        $prepareDB = $this->conn->prepare($query);
        $isSuccess = $prepareDB->execute([$this->NamaBarang, $this->Keterangan, $this->Satuan, $this->idPengguna]);
        return $isSuccess;
      } catch (Exception $e) {
        throw $e;
      }
    }

    //update barang
    function rubahBarang() {
      try {
        $query = "UPDATE Barang SET NamaBarang = ?, Keterangan = ?, Satuan = ? WHERE idBarang = ?";
        $prepareDB = $this->conn->prepare($query);
        $isSuccess = $prepareDB->execute([$this->NamaBarang, $this->Keterangan, $this->Satuan, $this->idBarang]);
        return $isSuccess;
      } catch (Exception $e) {
        throw $e;
      }
    }

    //read barang
    function daftarBarang() {
      try {
        $query = "SELECT * FROM Barang";
        $prepareDB = $this->conn->prepare($query);
        $prepareDB->execute();
        $daftarBarang = $prepareDB->fetchAll();
        return $daftarBarang;
      } catch (Exception $e) {
        throw $e;
      }
    }

    //delete barang
    function hapusBarang($id)
    {
      try {
        $query = "DELETE FROM Barang WHERE idBarang = ?";
        $prepareDB = $this->conn->prepare($query);
        $isSuccess = $prepareDB->execute([$id]);
        return $isSuccess;
      } catch (Exception $e) {
        throw $e;
      }
    }

  }
?>