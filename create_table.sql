-- create table HakAkses
CREATE TABLE `HakAkses` (
  `idAkses` int(11) NOT NULL AUTO_INCREMENT,
  `NamaAkses` varchar(16) NOT NULL,
  `Keterangan` varchar(128) NOT NULL,
  PRIMARY KEY (`idAkses`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- insert data to HakAkses table
INSERT INTO HakAkses(NamaAkses, Keterangan)
VALUES
('administrator', 'all access'),
('manager', 'all pages'),
('sales', 'penjualan page, pelanggan page');
('purchasing', 'pembelian page, supplier page, barang page');

-- create table Pengguna
CREATE TABLE `Pengguna` (
  `idPengguna` int(11) NOT NULL AUTO_INCREMENT,
  `NamaPengguna` varchar(16) NOT NULL,
  `Password` varchar(64) NOT NULL,
  `NamaDepan` varchar(64) NOT NULL,
  `NamaBelakang` varchar(64) NOT NULL,
  `NoHp` varchar(15) NOT NULL,
  `Alamat` varchar(256) NOT NULL,
  `idAkses` int(11) NOT NULL,
  PRIMARY KEY (`idPengguna`),
  KEY `idAkses` (`idAkses`),
  CONSTRAINT `Pengguna-idAkses` FOREIGN KEY (`idAkses`) REFERENCES `HakAkses` (`idAkses`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- insert data to Pengguna table
INSERT INTO Pengguna(NamaPengguna, Password, NamaDepan, NamaBelakang, NoHp, Alamat, idAkses)
VALUES
('admin', '123123', 'System', 'Administrator', '08123456789', 'Jl. Admin', 1),
('manajer', '123123', 'The', 'Manager', '08123456789', 'Jl. Manager', 2),
('penjualan', '123123', 'Sales', 'Staff', '08123456789', 'Jl. Sales', 3),
('pembelian', '123123', 'Purchasing', 'Staff', '08123456789', 'Jl. Purchasing', 4);

-- create table Supplier
CREATE TABLE `Supplier` (
  `idSupplier` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `NamaDepan` varchar(128) NOT NULL,
  `NamaBelakang` varchar(128) DEFAULT NULL,
  `NoHp` varchar(15) NOT NULL,
  `Alamat` varchar(255) NOT NULL,
  PRIMARY KEY (`idSupplier`),
  UNIQUE KEY `idSupplier` (`idSupplier`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--create table Pelanggan
CREATE TABLE `Pelanggan` (
  `idPelanggan` int(11) NOT NULL AUTO_INCREMENT,
  `NamaDepan` varchar(128) NOT NULL,
  `NamaBelakang` varchar(128) DEFAULT NULL,
  `NoHp` varchar(15) NOT NULL,
  `Alamat` varchar(255) NOT NULL,
  PRIMARY KEY (`idPelanggan`),
  UNIQUE KEY `idPelanggan` (`idPelanggan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- create table Barang
CREATE TABLE `Barang` (
  `idBarang` int(11) NOT NULL AUTO_INCREMENT,
  `NamaBarang` varchar(64) NOT NULL,
  `Keterangan` varchar(128) NOT NULL,
  `Satuan` varchar(10) NOT NULL,
  `idPengguna` int(11) NOT NULL,
  `idSupplier` int(11) NOT NULL,
  PRIMARY KEY (`idBarang`),
  KEY `idPengguna` (`idPengguna`),
  KEY `idSupplier` (`idSupplier`),
  CONSTRAINT `Barang-idPengguna` FOREIGN KEY (`idPengguna`) REFERENCES `Pengguna` (`idPengguna`),
  CONSTRAINT `Barang-idSupplier` FOREIGN KEY (`idSupplier`) REFERENCES `Supplier` (`idSupplier`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- creta table Pembelian
CREATE TABLE `Pembelian` (
  `idPembelian` int(11) NOT NULL AUTO_INCREMENT,
  `idBarang` int(11) NOT NULL,
  `JumlahPembelian` int(11) NOT NULL,
  `HargaBeli` int(11) NOT NULL,
  `idPengguna` int(11) NOT NULL,
  PRIMARY KEY (`idPembelian`),
  KEY `idBarang` (`idBarang`),
  KEY `idPengguna` (`idPengguna`),
  CONSTRAINT `Pembelian-idBarang` FOREIGN KEY (`idBarang`) REFERENCES `Barang` (`idBarang`),
  CONSTRAINT `Pembelian-idPengguna` FOREIGN KEY (`idPengguna`) REFERENCES `Pengguna` (`idPengguna`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- create table Penjualan
CREATE TABLE `Penjualan` (
  `idPenjualan` int(11) NOT NULL AUTO_INCREMENT,
  `idBarang` int(11) NOT NULL,
  `JumlahPenjualan` int(11) NOT NULL,
  `HargaJual` int(11) NOT NULL,
  `idPengguna` int(11) NOT NULL,
  `idPelanggan` int(11) NOT NULL,
  PRIMARY KEY (`idPenjualan`),
  KEY `idBarang` (`idBarang`),
  KEY `idPengguna` (`idPengguna`),
  KEY `idPelanggan` (`idPelanggan`),
  CONSTRAINT `Penjualan-idBarang` FOREIGN KEY (`idBarang`) REFERENCES `Barang` (`idBarang`),
  CONSTRAINT `Penjualan-idPengguna` FOREIGN KEY (`idPengguna`) REFERENCES `Pengguna` (`idPengguna`),
  CONSTRAINT `Penjualan-idPelanggan` FOREIGN KEY (`idPelanggan`) REFERENCES `Pelanggan` (`idPelanggan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;