<?php
  class Supplier
  {
    private $idSupplier;
    private $NamaDepan;
    private $NamaBelakang;
    private $NoHp;
    private $Alamat;
    private $conn;
    
    public function __construct(\PDO $database) {
      $this->conn = $database;
    }

    function setIdSupplier ($idSupplier) {
      $this->idSupplier = $idSupplier;
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

    function getIdSupplier () {
      return $idSupplier;
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

    //create supplier
    function simpanSupplier () {
      try {
        $query = "INSERT INTO Supplier(NamaDepan, NamaBelakang, NoHp, Alamat)  VALUES (?, ?, ?, ?)";
        $prepareDB = $this->conn->prepare($query);
        $isSuccess = $prepareDB->execute([$this->NamaDepan, $this->NamaBelakang, $this->NoHp, $this->Alamat]);
        return $isSuccess;
      } catch (Exception $e) {
        throw $e;
      }
    }

    //read supplier
    function daftarSupplier() {
      $query = "SELECT * FROM Supplier ORDER BY idSupplier ASC";
      $prepareDB = $this->conn->prepare($query);
      $prepareDB->execute();
      $daftarSupplier = $prepareDB->fetchAll();
      return $daftarSupplier;
    }

    //update supplier
    function rubahSupplier() {
      try {
        $query = "UPDATE Supplier SET NamaDepan = ?, NamaBelakang = ? , NoHp = ?, Alamat = ? WHERE idSupplier = ?";
        $prepareDB = $this->conn->prepare($query);
        $isSuccess = $prepareDB->execute([$this->NamaDepan, $this->NamaBelakang, $this->idSupplier, $this->NoHp, $this->Alamat]);
        return $isSuccess;
      } catch (Exception $e) {
        throw $e;
      }
    }

    //delete supplier
    function hapusSupplier() {
      try {
        $query = "DELETE FROM Supplier WHERE idSupplier = ?";
        $prepareDB = $this->conn->prepare($query);
        $isSuccess = $prepareDB->execute([$this->idSupplier]);
        return $isSuccess;
      } catch (Exception $e) {
        throw $e;
      }
    }

    // find supplier by id
    function cariSupplier() {
      try {
        $query = "SELECT * FROM Supplier WHERE idSupplier = ?";
        $prepareDB = $this->conn->prepare($query);
        $prepareDB->execute([$this->idSupplier]);
        $supplier = $prepareDB->fetch();
        return $supplier;
      } catch (Exception $e) {
        throw $e;
      }
    }
  }
?>