<?php
  class Pengguna {
    private $idPengguna;
    private $NamaPengguna;
    private $Password;
    private $NamaDepan;
    private $NamaBelakang;
    private $NoHp;
    private $Alamat;
    private $idAkses;

    private $conn;

    public function __construct(\PDO $database) {
      $this->conn = $database;
    }

    function setIdPengguna ($idPengguna) {
      $this->idPengguna = $idPengguna;
    }

    function setNamaPengguna ($NamaPengguna) {
      $this->NamaPengguna = $NamaPengguna;
    }

    function setPassword ($Password) {
      $this->Password = $Password;
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

    function setIdAkses ($idAkses) {
      $this->idAkses = $idAkses;
    }

    function getIdPengguna () {
      return $idPengguna;
    }

    function getNamaPengguna () {
      return $NamaPengguna;
    }

    function getPassword () {
      return $Password;
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

    function getIdAkses () {
      return $idAkses;
    }

    // create pengguna
    function tambahPengguna () {
      try {
        $query = "INSERT INTO Pengguna(NamaPengguna, Password, NamaDepan, NamaBelakang, NoHp, Alamat, idAkses) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $prepareDB = $this->conn->prepare($query);
        $isSuccess = $prepareDB->execute([$this->NamaPengguna, $this->Password, $this->NamaDepan, $this->NamaBelakang, $this->NoHp, $this->Alamat, $this->idAkses]);
        return $isSuccess;
      } catch (Exception $e) {
        throw $e;
      }
    }

    // read pengguna
    function daftarPengguna() {
      $query = "SELECT * FROM Pengguna ORDER BY idPengguna ASC";
      $prepareDB = $this->conn->prepare($query);
      $prepareDB->execute();
      $daftarPengguna = $prepareDB->fetchAll();
      return $daftarPengguna;
    }

    // update pengguna
    function updatePengguna() {
      try {
        $query = "UPDATE Pengguna SET NamaPengguna = ?, Password = ?, NamaDepan = ?, NamaBelakang = ?, NoHp = ?, Alamat = ?, idAkses = ? WHERE idPengguna = ?";
        $prepareDB = $this->conn->prepare($query);
        $isSuccess = $prepareDB->execute([$this->NamaPengguna, $this->Password, $this->NamaDepan, $this->NamaBelakang, $this->NoHp, $this->Alamat, $this->idAkses, $this->idPengguna]);
        return $isSuccess;
      } catch (Exception $e) {
        throw $e;
      }
    }

    // delete pengguna
    function hapusPengguna($id) {
      try {
        $query = "DELETE FROM Pengguna WHERE idPengguna = ?";
        $prepareDB = $this->conn->prepare($query);
        $penggunaDelete = $prepareDB->execute([$id]);
        return $penggunaDelete;
      } catch (Exception $e) {
        throw $e;
      }
    }

    // otentifikasi pengguna
    function Authentication() {
      try {
        $query = "SELECT * FROM Pengguna WHERE NamaPengguna = ? AND Password = ?";
        $prepareDB = $this->conn->prepare($query);
        $prepareDB->execute([$this->NamaPengguna, $this->Password]);
        $dataPengguna = $prepareDB->fetchAll();
        return $dataPengguna;
      } catch (Exception $e) {
        throw $e;
      }
    }
  }
?>