<?php
  class User
  {
    private $IdUser;
    private $username;
    private $password;
    private $FirstName;
    private $LastName;
    private $AlamatUser;
    private $HpUser;
    private $IdRoles;
    
    /* Properties */
    private $conn;

    /* Get database access */
    public function __construct(\PDO $database) {
      $this->conn = $database;
    }
    
    function setIdUser ($IdUser) {
      $this->IdUser = $IdUser;
    }
    function setUsername ($username) {
      $this->username = $username;
    }
    function setPassword ($password) {
      $this->password = $password;
    }
    function setFirstName ($FirstName)
    {
      $this->FirstName = $FirstName;
    }
    function setLastName ($LastName)
    {
      $this->LastName = $LastName;
    }
    function setAlamatUser ($AlamatUser)
    {
      $this->AlamatUser = $AlamatUser;
    }
    function setHpUser ($HpUser)
    {
      $this->HpUser = $HpUser;
    }
    function setIdRoles ($IdRoles)
    {
      $this->IdRoles = $IdRoles;
    }
    function getIdUser ()
    {
      return $IdUser;
    }
    function getUsername ()
    {
      return $username;
    }
    function getPassword ()
    {
      return $password;
    }
    function getFristName ()
    {
      return $FirstName;
    }
    function LastName ()
    {
      return $LastName;
    }
    function getAlamatUser ()
    {
      return $AlamatUser;
    }
    function getHpUser ()
    {
      return $HpUser;
    }
    function getIdRoles ()
    {
      return $IdRoles;
    }
    function AddUser ()
      {
        try {
          $query = "INSERT INTO Users (IdUser, username, password, FirstName, LastName, AlamatUser, HpUser, IdRoles) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
          $prepareDB = $this->conn->prepare($query);
          $sqlAddUser = $prepareDB->execute([$this->IdUser, $this->username, $this->password, $this->FirstName, $this->LastName, $this->AlamatUser, $this->HpUser, $this->IdRoles]);
          return $sqlAddUser;
        } catch (Exception $e) {
          throw $e;
        }
      }
    function UserList ()
    {
      $query = "SELECT IdUser, username, password, nama_User, AlamatUser, HpUser, nama_bagian FROM Users NATURAL JOIN Roles ORDER BY FirstName ASC";
      $prepareDB = $this->conn->prepare($query);
      $prepareDB->execute();
      $UserList = $prepareDB->fetchAll();
      return $UserList;
    }
    function findUserById ($id)
    {
      try {
        $query = "SELECT * FROM Users WHERE IdUser = ?";
        $prepareDB = $this->conn->prepare($query);
        $prepareDB->execute([$id]);
        $findUserById = $prepareDB->fetchAll();
        return $findUserById;
      } catch (Exception $e) {
        throw $e;
      }
    }

    function UserUpdate ()
    {
      try {
        $query = "UPDATE Users SET username = ?, password = ?, nama_User = ?, AlamatUser = ?, HpUser = ?, IdRoles = ? WHERE IdUser = ?";
        $prepareDB = $this->conn->prepare($query);
        $UserUpdate = $prepareDB->execute([$this->username, $this->password, $this->FirstName, $this->LastName, $this->AlamatUser, $this->HpUser, $this->IdRoles, $this->IdUser]);
        return $UserUpdate;
      } catch (Exception $e) {
        throw $e;
      }
    }

    function UserDelete ($id)
    {
      try {
        $query = "DELETE FROM Users WHERE IdUser = ?";
        $prepareDB = $this->conn->prepare($query);
        $UserDelete = $prepareDB->execute([$id]);
        return $UserDelete;
      } catch (Exception $e) {
        throw $e;
      }
    }

    function Welcome ()
    {
      $sqlWelcome = mysql_query ("SELECT FirstName FROM Users");
    }
  }
?>