<?php
  class Roles
    {
      /* Properties */
      private $conn;
      private $IdRole;
      private $NamaRole;
      private $Keterangan;

      /* Get database access */
      public function __construct(\PDO $database) {
        $this->conn = $database;
      }

      function setIdRole ($IdRole) {
        $this->IdRole = $IdRole;
      }

      function setNamaRole ($NamaRole) {
        $this->NamaRole = $NamaRole;
      }
      
      function setKeterangan ($Keterangan) {
        $this->Keterangan = $Keterangan;
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

      function addRole () {
        try {
          $query = "INSERT INTO Roles(NamaRole, Keterangan) VALUES (?, ?)";
          $prepareDB = $this->conn->prepare($query);
          $addRole = $prepareDB->execute([$this->NamaRole, $this->Keterangan]);
          return $addRole;
        } catch (Exception $e) {
          throw $e;
        }
      }

      function rolesList() {
        $query = "SELECT * FROM Roles ORDER BY IdRole ASC";
        $prepareDB = $this->conn->prepare($query);
        $prepareDB->execute();
        $rolesList = $prepareDB->fetchAll();
        return $rolesList;
      }

      function findRolesById($id) {
        try {
          $query = "SELECT * FROM Roles WHERE IdRole = ?";
          $prepareDB = $this->conn->prepare($query);
          $prepareDB->execute([$id]);
          $findRolesById = $prepareDB->fetchAll();
          return $findRolesById;
        } catch (Exception $e) {
          throw $e;
        }
      }
      
      function updateRole($id) {
        try {
          $query = "UPDATE Roles SET NamaRole = ?, Keterangan = ? WHERE IdRole = ?";
          $prepareDB = $this->conn->prepare($query);
          $roleUpdate = $prepareDB->execute([$this->NamaRole, $this->Keterangan, $id]);
          return $roleUpdate;
        } catch (Exception $e) {
          throw $e;
        }
      }

      function deleteRole($id) {
        try {
          $query = "DELETE FROM Roles WHERE IdRole = ?";
          $prepareDB = $this->conn->prepare($query);
          $roleDelete = $prepareDB->execute([$id]);
          return $roleDelete;
        } catch (Exception $e) {
          throw $e;
        }
      }
    }
?>