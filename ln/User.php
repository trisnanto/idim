<?php
  class User
  {
    /* Properties */
    private $conn;
    private $IdUser;
    private $Username;
    private $Password;
    private $NamaDepan;
    private $NamaBelakang;
    private $Alamat;
    private $Hp;
    private $IdRole;

    /* Get database access */
    public function __construct(\PDO $database) {
      $this->conn = $database;
    }
    
    function setIdUser($IdUser) {
      $this->IdUser = $IdUser;
    }
    function setUsername($Username) {
      $this->Username = $Username;
    }
    function setPassword($Password) {
      $this->Password = $Password;
    }
    function setNamaDepan($NamaDepan) {
      $this->NamaDepan = $NamaDepan;
    }
    function setNamaBelakang($NamaBelakang) {
      $this->NamaBelakang = $NamaBelakang;
    }
    function setAlamat($Alamat) {
      $this->Alamat = $Alamat;
    }
    function setHp($Hp) {
      $this->Hp = $Hp;
    }
    function setIdRole($IdRole) {
      $this->IdRole = $IdRole;
    }
    function getIdUser() {
      return $IdUser;
    }
    function getUsername() {
      return $Username;
    }
    function getPassword() {
      return $Password;
    }
    function getNamaDepan() {
      return $NamaDepan;
    }
    function NamaBelakang() {
      return $NamaBelakang;
    }
    function getAlamat() {
      return $Alamat;
    }
    function getHp() {
      return $Hp;
    }
    function getIdRole() {
      return $IdRole;
    }
    function addUser() {
        try {
          $query = "INSERT INTO Users (IdUser, Username, Password, NamaDepan, NamaBelakang, Alamat, Hp, IdRole) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
          $prepareDB = $this->conn->prepare($query);
          $sqlAddUser = $prepareDB->execute([$this->IdUser, $this->Username, $this->Password, $this->NamaDepan, $this->NamaBelakang, $this->Alamat, $this->Hp, $this->IdRole]);
          return $sqlAddUser;
        } catch (Exception $e) {
          throw $e;
        }
      }
    function userList() {
      $query = "SELECT IdUser, Username, Password, NamaDepan, NamaBelakang, Alamat, Hp, NamaRole FROM Users NATURAL JOIN Roles ORDER BY NamaDepan ASC";
      $prepareDB = $this->conn->prepare($query);
      $prepareDB->execute();
      $UserList = $prepareDB->fetchAll();
      return $UserList;
    }
    function findUserById($id) {
      try {
        $query = "SELECT * FROM Users WHERE IdUser = ?";
        $prepareDB = $this->conn->prepare($query);
        $prepareDB->execute([$id]);
        $findUserById = $prepareDB->fetch();
        return $findUserById;
      } catch (Exception $e) {
        throw $e;
      }
    }

    function updateUser() {
      try {
        $query = "UPDATE Users SET Username = ?, Password = ?, NamaDepan = ?, NamaBelakang = ?, Alamat = ?, Hp = ?, IdRole = ? WHERE IdUser = ?";
        $prepareDB = $this->conn->prepare($query);
        $UserUpdate = $prepareDB->execute([$this->Username, $this->Password, $this->NamaDepan, $this->NamaBelakang, $this->Alamat, $this->Hp, $this->IdRole, $this->IdUser]);
        return $UserUpdate;
      } catch (Exception $e) {
        throw $e;
      }
    }

    function deleteUser($id) {
      try {
        $query = "DELETE FROM Users WHERE IdUser = ?";
        $prepareDB = $this->conn->prepare($query);
        $UserDelete = $prepareDB->execute([$id]);
        return $UserDelete;
      } catch (Exception $e) {
        throw $e;
      }
    }

    // otentifikasi pengguna
    function authenticateUser() {
      try {
        $query = "SELECT * FROM Users WHERE Username = ? AND Password = ?";
        $prepareDB = $this->conn->prepare($query);
        $prepareDB->execute([$this->Username, $this->Password]);
        $userData = $prepareDB->fetchAll();
        return $userData;
      } catch (Exception $e) {
        throw $e;
      }
    }

  }
?>