<?php
  class Roles
    {
      private $IdRole;
      private $NamaRole;
      private $Keterangan;
      /* Properties */
      private $conn;
      /* Get database access */
      public function __construct(\PDO $database) {
        $this->conn = $database;
      }

      function setIdRole ($IdRole) {
        $this->IdRole = $IdRole;
      }

      function setNamaRole ($NamaRole) {
        $this->NamaRole = $Role;
      }
      
      function setKeterangan ($Keterangan) {
        $this->Keterangan = $keterangan;
      }
      function getIdRole () {
        return $IdRole;
      }

      function getNamaRole () {
        return $NamaRole;
      }

      function getKeterangan () {
        return $keterangan;
      }

      function AddRoles () {
        try {
          $query = "INSERT INTO roles(`IdRoles`, `NameRoles`, `Keterangan`) VALUES (?, ?, ?)";
          $prepareDB = $this->conn->prepare($query);
          $sqlAddBagian = $prepareDB->execute([$this->id_bagian, $this->nama_bagian, $this->keterangan]);
          return $sqlAddBagian;
        } catch (Exception $e) {
          throw $e;
        }
      }

      function BagianList() {
        $query = "SELECT * FROM bagian ORDER BY nama_bagian ASC";
        $prepareDB = $this->conn->prepare($query);
        $prepareDB->execute();
        $bagianList = $prepareDB->fetchAll();
        return $bagianList;
      }

      function findBagianById($id) {
        try {
          $query = "SELECT * FROM bagian WHERE id_bagian = ?";
          $prepareDB = $this->conn->prepare($query);
          $prepareDB->execute([$id]);
          $findBagianById = $prepareDB->fetchAll();
          return $findBagianById;
        } catch (Exception $e) {
          throw $e;
        }
      }
      
      function BagianUpdate() {
        try {
          $query = "UPDATE bagian SET nama_bagian = ? WHERE id_bagian = ?";
          $prepareDB = $this->conn->prepare($query);
          $bagianUpdate = $prepareDB->execute([$this->nama_bagian, $this->id_bagian]);
          return $bagianUpdate;
        } catch (Exception $e) {
          throw $e;
        }
      }

      function BagianDelete($id) {
        try {
          $query = "DELETE FROM bagian WHERE id_bagian = ?";
          $prepareDB = $this->conn->prepare($query);
          $bagianDelete = $prepareDB->execute([$id]);
          return $bagianDelete;
        } catch (Exception $e) {
          throw $e;
        }
      }
    }
?>