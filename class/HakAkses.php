<?php
  class HakAkses
  {
    private $idAkses;
    private $NamaAkses;
    private $Keterangan;
    /* Properties */
    private $conn;
    /* Get database access */
    
    // create pdo connection
    public function __construct(\PDO $database) {
      $this->conn = $database;
    }

    function setIdAkses ($idAkses) {
      $this->idAkses = $idAkses;
    }

    function setNamaAkses ($NamaAkses) {
      $this->NamaAkses = $NamaAkses;
    }

    function setKeterangan ($Keterangan) {
      $this->Keterangan = $Keterangan;
    }

    function getIdAkses () {
      return $idAkses;
    }

    function getNamaAkses () {
      return $NamaAkses;
    }

    function getKeterangan () {
      return $Keterangan;
    }

    //create hak akses
    function simpanHakAkses () {
      try {
        $query = "INSERT INTO HakAkses(idAkses, NamaAkses, Keterangan) VALUES (?, ?, ?)";
        $prepareDB = $this->conn->prepare($query);
        $isSuccess = $prepareDB->execute([$this->idAkses, $this->NamaAkses, $this->Keterangan]);
        return $isSuccess;
      } catch (Exception $e) {
        throw $e;
      }
    }

    //read hak akses
    function daftarHakAkses() {
      $query = "SELECT * FROM HakAkses ORDER BY idAkses ASC";
      $prepareDB = $this->conn->prepare($query);
      $prepareDB->execute();
      $daftarHakAkses = $prepareDB->fetchAll();
      return $daftarHakAkses;
    }

    //update hak akses
    function rubahHakAkses() {
      try {
        $query = "UPDATE HakAkses SET NamaAkses = ?, Keterangan = ? WHERE idAkses = ?";
        $prepareDB = $this->conn->prepare($query);
        $isSuccess = $prepareDB->execute([$this->NamaAkses, $this->Keterangan, $this->idAkses]);
        return $isSuccess;
      } catch (Exception $e) {
        throw $e;
      }
    }

    //delete hak akses
    function hapusHakAkses() {
      try {
        $query = "DELETE FROM HakAkses WHERE idAkses = ?";
        $prepareDB = $this->conn->prepare($query);
        $isSuccess = $prepareDB->execute([$this->idAkses]);
        return $isSuccess;
      } catch (Exception $e) {
        throw $e;
      }
    }
  }
?>