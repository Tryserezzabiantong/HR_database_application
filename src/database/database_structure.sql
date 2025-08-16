-- Employee Management System Database Structure
-- Database: db_kepegawaian

-- Create database if not exists
CREATE DATABASE IF NOT EXISTS `db_kepegawaian` 
CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE `db_kepegawaian`;

-- Drop table if exists
DROP TABLE IF EXISTS `data_pegawai`;

-- Create employees table
CREATE TABLE `data_pegawai` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nomor_Pegawai` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text,
  `kota` varchar(50),
  `telepon` varchar(20),
  `Jenis_Kelamin` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `Tempat_Lahir` varchar(50),
  `Tanggal_Lahir` date NULL,
  `Golongan_Darah` enum('A','B','AB','O') DEFAULT NULL,
  `Agama` varchar(20),
  `Pendidikan` varchar(50),
  `Status_Perkawinan` enum('Belum Menikah','Menikah','Cerai') DEFAULT NULL,
  `No_KTP` varchar(20),
  `NPWP` varchar(20),
  `Tgl_Masuk` date NULL,
  `Tgl_Keluar` date NULL,
  `DEPARTMENT` varchar(50),
  `Jabatan` varchar(50),
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Nomor_Pegawai` (`Nomor_Pegawai`),
  KEY `idx_nama` (`nama`),
  KEY `idx_department` (`DEPARTMENT`),
  KEY `idx_jabatan` (`Jabatan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insert sample data
INSERT INTO `data_pegawai` (
  `Nomor_Pegawai`, `nama`, `alamat`, `kota`, `telepon`, 
  `Jenis_Kelamin`, `Tempat_Lahir`, `Tanggal_Lahir`, `Golongan_Darah`, 
  `Agama`, `Pendidikan`, `Status_Perkawinan`, `No_KTP`, `NPWP`, 
  `Tgl_Masuk`, `Tgl_Keluar`, `DEPARTMENT`, `Jabatan`
) VALUES 
('EMP001', 'John Doe', 'Jl. Sudirman No. 123', 'Jakarta', '08123456789', 
 'Laki-laki', 'Jakarta', '1990-05-15', 'O', 'Islam', 'S1', 
 'Menikah', '3171234567890123', '12.345.678.9-123.000', 
 '2020-01-15', NULL, 'IT', 'Software Developer'),

('EMP002', 'Jane Smith', 'Jl. Thamrin No. 456', 'Jakarta', '08123456790', 
 'Perempuan', 'Bandung', '1992-08-20', 'A', 'Kristen', 'S1', 
 'Belum Menikah', '3171234567890124', '12.345.678.9-124.000', 
 '2020-03-01', NULL, 'HR', 'HR Specialist'),

('EMP003', 'Ahmad Rahman', 'Jl. Gatot Subroto No. 789', 'Jakarta', '08123456791', 
 'Laki-laki', 'Surabaya', '1988-12-10', 'B', 'Islam', 'S2', 
 'Menikah', '3171234567890125', '12.345.678.9-125.000', 
 '2019-07-01', NULL, 'Finance', 'Finance Manager'),

('EMP004', 'Sarah Johnson', 'Jl. Rasuna Said No. 321', 'Jakarta', '08123456792', 
 'Perempuan', 'Medan', '1995-03-25', 'AB', 'Katolik', 'S1', 
 'Belum Menikah', '3171234567890126', '12.345.678.9-126.000', 
 '2021-01-10', NULL, 'Marketing', 'Marketing Executive'),

('EMP005', 'Budi Santoso', 'Jl. Sudirman No. 654', 'Jakarta', '08123456793', 
 'Laki-laki', 'Semarang', '1991-11-05', 'O', 'Islam', 'S1', 
 'Menikah', '3171234567890127', '12.345.678.9-127.000', 
 '2020-06-15', NULL, 'IT', 'System Administrator');

-- Create indexes for better performance
CREATE INDEX `idx_created_at` ON `data_pegawai` (`created_at`);
CREATE INDEX `idx_updated_at` ON `data_pegawai` (`updated_at`);
CREATE INDEX `idx_jenis_kelamin` ON `data_pegawai` (`Jenis_Kelamin`);
CREATE INDEX `idx_status_perkawinan` ON `data_pegawai` (`Status_Perkawinan`);

-- Show table structure
DESCRIBE `data_pegawai`;

-- Show sample data
SELECT * FROM `data_pegawai` LIMIT 5;

-- Show table information
SELECT 
    TABLE_NAME,
    TABLE_ROWS,
    DATA_LENGTH,
    INDEX_LENGTH,
    (DATA_LENGTH + INDEX_LENGTH) AS TOTAL_SIZE
FROM information_schema.TABLES 
WHERE TABLE_SCHEMA = 'db_kepegawaian' 
AND TABLE_NAME = 'data_pegawai';
