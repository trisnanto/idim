<?php
  class Pelanggan
  {
    private $idPelanggan;
    private $NamaDepan;
    private $NamaBelakang;
    private $NoHp;
    private $Alamat;
    private $conn;
    
    public function __construct(\PDO $database) {
      $this->conn = $database;
    }

    function setIdPelanggan ($idPelanggan) {
      $this->idPelanggan = $idPelanggan;
    }

    function setNamaDepan ($NamaDepan) {
      $this->NamaDepan = $NamaDepan;
    }

    function setNamaBelakang ($NamaBelakang) {
      $this->NamaBelakang = $NamaBelakang;
    }

    function setNoHp ($NoHp) {
      $this->NoHp = $NoHp;
    }

    function setAlamat ($Alamat) {
      $this->Alamat = $Alamat;
    }

    function getIdPelanggan () {
      return $idPelanggan;
    }

    function getNamaDepan () {
      return $NamaDepan;
    }

    function getNamaBelakang () {
      return $NamaBelakang;
    }

    function getNoHp () {
      return $NoHp;
    }

    function getAlamat () {
      return $Alamat;
    }

    //create pelanggan
    function simpanPelanggan () {
      try {
        $query = "INSERT INTO Pelanggan(NamaDepan, NamaBelakang, NoHp, Alamat)  VALUES (?, ?, ?, ?)";
        $prepareDB = $this->conn->prepare($query);
        $isSuccess = $prepareDB->execute([$this->NamaDepan, $this->NamaBelakang, $this->NoHp, $this->Alamat]);
        return $isSuccess;
      } catch (Exception $e) {
        throw $e;
      }
    }

    //read pelanggan
    function daftarPelanggan() {
      $query = "SELECT * FROM Pelanggan ORDER BY idPelanggan ASC";
      $prepareDB = $this->conn->prepare($query);
      $prepareDB->execute();
      $daftarPelanggan = $prepareDB->fetchAll();
      return $daftarPelanggan;
    }

    //update pelanggan
    function rubahPelanggan() {
      try {
        $query = "UPDATE Pelanggan SET NamaDepan = ?, NamaBelakang = ? , NoHp = ?, Alamat = ? WHERE idPelanggan = ?";
        $prepareDB = $this->conn->prepare($query);
        $isSuccess = $prepareDB->execute([$this->NamaDepan, $this->NamaBelakang, $this->idPelanggan, $this->NoHp, $this->Alamat]);
        return $isSuccess;
      } catch (Exception $e) {
        throw $e;
      }
    }

    //delete pelanggan
    function hapusPelanggan() {
      try {
        $query = "DELETE FROM Pelanggan WHERE idPelanggan = ?";
        $prepareDB = $this->conn->prepare($query);
        $isSuccess = $prepareDB->execute([$this->idPelanggan]);
        return $isSuccess;
      } catch (Exception $e) {
        throw $e;
      }
    }
  }
?>