<?php
  class Barang {
    private $idBarang;
    private $NamaBarang;
    private $Keterangan;
    private $Satuan;
    private $idPengguna;
    private $idSupplier;

    private $conn;

    public function __construct(\PDO $database) {
      $this->conn = $database;
    }

    function setIdBarang ($idBarang) {
      $this->idBarang = $idBarang;
    }

    function setNamaBarang ($NamaBarang) {
      $this->NamaBarang = $NamaBarang;
    }

    function setKeterangan ($Keterangan) {
      $this->Keterangan = $Keterangan;
    }

    function setSatuan ($Satuan) {
      $this->Satuan = $Satuan;
    }

    function setIdPengguna ($idPengguna) {
      $this->idPengguna = $idPengguna;
    }

    function setIdSupplier ($idSupplier) {
      $this->idSupplier = $idSupplier;
    }

    function getIdBarang () {
      return $idBarang;
    }

    function getNamaBarang () {
      return $NamaBarang;
    }

    function getKeterangan () {
      return $Keterangan;
    }

    function getSatuan () {
      return $Satuan;
    }

    function getIdPengguna () {
      return $idPengguna;
    }

    function getIdSupplier () {
      return $idSupplier;
    }

    // create barang
    function simpanBarang() {
      try {
        $query = "INSERT INTO Barang(NamaBarang, Keterangan, Satuan, idPengguna, idSupplier) VALUES (?, ?, ?, ?, ?)";
        $prepareDB = $this->conn->prepare($query);
        $isSuccess = $prepareDB->execute([$this->NamaBarang, $this->Keterangan, $this->Satuan, $this->idPengguna, $this->idSupplier]);
        return $isSuccess;
      } catch (Exception $e) {
        throw $e;
      }
    }

    //update barang
    function rubahBarang() {
      try {
        $query = "UPDATE Barang SET NamaBarang = ?, Keterangan = ?, Satuan = ?, idSupplier = ? WHERE idBarang = ?";
        $prepareDB = $this->conn->prepare($query);
        $isSuccess = $prepareDB->execute([$this->NamaBarang, $this->Keterangan, $this->Satuan, $this->idSupplier, $this->idBarang]);
        return $isSuccess;
      } catch (Exception $e) {
        throw $e;
      }
    }

    //read barang
    function daftarBarang() {
      try {
        // $query = "SELECT * FROM Barang";
        // $query = "SELECT Barang.idBarang, Barang.NamaBarang, Barang.Keterangan, Barang.Satuan, Pengguna.NamaPengguna as NamaPengguna, CONCAT(Supplier.NamaDepan, ' ', Supplier.NamaBelakang) as NamaSupplier FROM Barang JOIN Pengguna ON Barang.idPengguna = Pengguna.idPengguna JOIN Supplier ON Barang.idSupplier = Supplier.idSupplier";
        // $query = "SELECT a.*, Pengguna.NamaPengguna,
        // CONCAT(Supplier.NamaDepan, ' ', Supplier.NamaBelakang) AS NamaSupplier, 
        // COALESCE(b.TotalPembelian, 0), COALESCE(b.TotalHargaBeli,0),
        // ROUND((COALESCE(b.TotalHargaBeli, 0)/COALESCE(b.TotalPembelian,1)),0) AvgHargaBeli, 
        // COALESCE(c.TotalPenjualan, 0), 
        // (COALESCE(b.TotalPembelian, 0)-COALESCE(c.TotalPenjualan, 0)) AS Stok
        // FROM Barang a
        // JOIN Supplier ON a.idSupplier = Supplier.idSupplier
        // JOIN Pengguna ON a.idPengguna = Pengguna.idPengguna
        // LEFT JOIN
        // (SELECT idBarang, SUM(JumlahPembelian) AS TotalPembelian, SUM(JumlahPembelian*HargaBeli) AS TotalHargaBeli
        //  FROM Pembelian GROUP BY idBarang) b
        // ON a.idBarang = b.idBarang
        // LEFT JOIN
        // (SELECT idBarang, SUM(JumlahPenjualan) AS TotalPenjualan
        //  FROM Penjualan GROUP BY idBarang) c 
        // ON a.idBarang = c.idBarang";
        $query = "SELECT a.*, Pengguna.NamaPengguna,
        CONCAT(Supplier.NamaDepan, ' ', Supplier.NamaBelakang) AS NamaSupplier, 
        COALESCE(b.TotalPembelian, 0), COALESCE(b.TotalHargaBeli,0),
        ROUND((COALESCE(b.TotalHargaBeli, 0)/COALESCE(b.TotalPembelian,1)),0) AvgHargaBeli, 
        COALESCE(c.TotalPenjualan, 0), 
        (COALESCE(b.TotalPembelian, 0)-COALESCE(c.TotalPenjualan, 0)) AS Stok, 
        d.HargaBeli AS HargaBeliTerakhir,
        e.HargaJual AS HargaJualTerakhir
        FROM Barang a
        JOIN Supplier ON a.idSupplier = Supplier.idSupplier
        JOIN Pengguna ON a.idPengguna = Pengguna.idPengguna
        LEFT JOIN
        (SELECT idBarang, SUM(JumlahPembelian) AS TotalPembelian, SUM(JumlahPembelian*HargaBeli) AS TotalHargaBeli
          FROM Pembelian GROUP BY idBarang) b
        ON a.idBarang = b.idBarang
        LEFT JOIN
        (SELECT idBarang, SUM(JumlahPenjualan) AS TotalPenjualan
          FROM Penjualan GROUP BY idBarang) c 
        ON a.idBarang = c.idBarang
        LEFT JOIN
        (SELECT x.idPembelian, x.idBarang, x.HargaBeli
        FROM Pembelian x, (select max(idPembelian) idPembelian, HargaBeli FROM Pembelian GROUP BY idBarang) y
        WHERE x.idPembelian = y.idPembelian) d
        ON a.idBarang = d.idBarang
        LEFT JOIN
        (SELECT s.idPenjualan, s.idBarang, s.HargaJual
        FROM Penjualan s, (select max(idPenjualan) idPenjualan, HargaJual FROM Penjualan GROUP BY idBarang) t
        WHERE s.idPenjualan = t.idPenjualan) e
        ON a.idBarang = e.idBarang
        WHERE (COALESCE(b.TotalPembelian, 0)-COALESCE(c.TotalPenjualan, 0)) != 0
        ";
        $prepareDB = $this->conn->prepare($query);
        $prepareDB->execute();
        $daftarBarang = $prepareDB->fetchAll();
        return $daftarBarang;
      } catch (Exception $e) {
        throw $e;
      }
    }

    //delete barang
    function hapusBarang()
    {
      try {
        $query = "DELETE FROM Barang WHERE idBarang = ?";
        $prepareDB = $this->conn->prepare($query);
        $isSuccess = $prepareDB->execute([$this->idBarang]);
        return $isSuccess;
      } catch (Exception $e) {
        throw $e;
      }
    }

    //find barang by id
    function cariBarang()
    {
      try {
        $query = "SELECT * FROM Barang WHERE idBarang = ?";
        $prepareDB = $this->conn->prepare($query);
        $prepareDB->execute([$this->idBarang]);
        $barang = $prepareDB->fetch();
        return $barang;
      } catch (Exception $e) {
        throw $e;
      }
    }

  }
?>