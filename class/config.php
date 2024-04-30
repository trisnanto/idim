<?php
  class Database
    {
      private $server ="127.0.0.1";
      private $username = "root";
      private $password = "g3m1l4ng";
      private $database = "cobain";

      function koneksidatabase() {
        try {
          // buat koneksi dengan database
          $dbh = new PDO('mysql:host='. $this->server
          .';dbname='. $this->database, $this->username, $this->password);
          // set error mode
          $dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
          return $dbh;
        }
        catch (PDOException $e) {
          // tampilkan pesan kesalahan jika koneksi gagal
          print "Koneksi atau query bermasalah: " . $e->getMessage() . "<br/>";
          die();
        }
      }
    }
    
  $d1 = new Database();
  $database = $d1->koneksidatabase();
?>