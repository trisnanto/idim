<?php
  class Laporan {
    private $conn;

    public function __construct(\PDO $database) {
      $this->conn = $database;
    }

    function getLaporanLabaRugi() {
      $query = "SELECT a.NamaBarang, 
      COALESCE(b.TotalPembelian, 0) TotalPembelian,
      ROUND((COALESCE(b.TotalModal, 0)/COALESCE(b.TotalPembelian,1)),0) AvgHargaBeli,  
      COALESCE(b.TotalModal,0) TotalModal,
      COALESCE(c.TotalPenjualan, 0) TotalPenjualan,
      ROUND((COALESCE(c.TotalOmset, 0)/COALESCE(c.TotalPenjualan,1)),0) AvgHargaJual,
      COALESCE(c.TotalOmset,0) TotalOmset,
      (c.TotalOmset-b.TotalModal) AS LabaRugi   
      FROM Barang a
      LEFT JOIN
      (SELECT idBarang, SUM(JumlahPembelian) AS TotalPembelian, SUM(JumlahPembelian*HargaBeli) AS TotalModal
       FROM Pembelian GROUP BY idBarang) b
      ON a.idBarang = b.idBarang
      LEFT JOIN
      (SELECT idBarang, SUM(JumlahPenjualan) AS TotalPenjualan, SUM(JumlahPenjualan*HargaJual) AS TotalOmset
       FROM Penjualan GROUP BY idBarang) c 
      ON a.idBarang = c.idBarang
      ";
      $prepare = $this->conn->prepare($query);
      $prepare->execute();
      return $prepare->fetchAll();
    }
  }
?>