<?php
  class Database {
    private $server ="127.0.0.1";
    private $username = "root";
    private $password = "g3m1l4ng";
    private $database = "cobain";

    function createConnection() {
      try {
        // buat koneksi dengan database
        $pdo = new PDO('mysql:host='. $this->server.';dbname='. $this->database, $this->username, $this->password);
        // set error mode
        $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        return $pdo;
      }
      catch (PDOException $e) {
        // tampilkan pesan kesalahan jika koneksi gagal
        print "Koneksi atau query bermasalah: " . $e->getMessage() . "<br/>";
        die();
      }
    }
  }
    
  $db = new Database();
  $database = $db->createConnection();
?>