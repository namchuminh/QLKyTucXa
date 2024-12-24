-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2024 at 08:25 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qlkytucxa`
--

-- --------------------------------------------------------

--
-- Table structure for table `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `MaChiTietHoaDon` int(11) NOT NULL,
  `TenMuc` varchar(500) NOT NULL,
  `MaHoaDon` varchar(255) NOT NULL,
  `ThanhTien` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `GhiChu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chitiethoadon`
--

INSERT INTO `chitiethoadon` (`MaChiTietHoaDon`, `TenMuc`, `MaHoaDon`, `ThanhTien`, `SoLuong`, `GhiChu`) VALUES
(7, 'Khoản Thu Tiền Mạng', '1GT2SZR873QRSEN', 100000, 3, 'abcde'),
(8, 'Bàn học tập', '1GT2SZR873QRSEN', 100000, 2, 'Chi phí sửa chữa'),
(9, 'Giường đơn', 'TCI5IOI3A8QA5L0', 50000, 2, 'Sửa chữa giường bị hỏng'),
(11, 'Khoản Thu Tiền Phòng', 'TCI5IOI3A8QA5L0', 2500000, 2, 'Thanh toán 2 tháng tiền phòng (T12, T1)');

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE `hoadon` (
  `MaHoaDon` varchar(255) NOT NULL,
  `MaPhong` varchar(255) NOT NULL,
  `TongTien` int(11) NOT NULL,
  `ThanhToan` int(11) NOT NULL,
  `NgayLap` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hoadon`
--

INSERT INTO `hoadon` (`MaHoaDon`, `MaPhong`, `TongTien`, `ThanhToan`, `NgayLap`) VALUES
('1GT2SZR873QRSEN', 'PHONG04', 500000, 1, '2024-12-24 13:45:26'),
('TCI5IOI3A8QA5L0', 'PHONG01', 5100000, 0, '2024-12-24 14:15:30'),
('X94ZMW34OMFN8CE', 'PHONG04', 0, 0, '2024-12-24 14:06:22');

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MaNhanVien` varchar(255) NOT NULL,
  `TenNhanVien` varchar(500) NOT NULL,
  `DiaChi` varchar(500) NOT NULL,
  `SoDienThoai` varchar(11) NOT NULL,
  `ChucVu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`MaNhanVien`, `TenNhanVien`, `DiaChi`, `SoDienThoai`, `ChucVu`) VALUES
('NHANVIEN01', 'Nguyễn Văn Bình', 'Tầng 2, Tòa ABC, Quận XYZ1', '0379962045', 1),
('NHANVIEN02', 'Nguyễn Văn Chung', 'Tầng 2, Tòa ABC, Quận XYZ1', '0999999999', 1);

-- --------------------------------------------------------

--
-- Table structure for table `phong`
--

CREATE TABLE `phong` (
  `MaPhong` varchar(255) NOT NULL,
  `TenPhong` varchar(255) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `MaViTri` varchar(255) NOT NULL,
  `TrangThai` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `phong`
--

INSERT INTO `phong` (`MaPhong`, `TenPhong`, `SoLuong`, `MaViTri`, `TrangThai`) VALUES
('PHONG01', 'Phòng E203', 15, 'VITRI01', 1),
('PHONG02', 'Phòng A213', 20, 'VITRI02', 1),
('PHONG04', 'Phòng A202', 12, 'VITRI02', 0);

-- --------------------------------------------------------

--
-- Table structure for table `phong_nhanvien`
--

CREATE TABLE `phong_nhanvien` (
  `MaPhong` varchar(255) NOT NULL,
  `MaNhanVien` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `phong_nhanvien`
--

INSERT INTO `phong_nhanvien` (`MaPhong`, `MaNhanVien`) VALUES
('PHONG01', 'NHANVIEN01'),
('PHONG02', 'NHANVIEN01'),
('PHONG02', 'NHANVIEN02'),
('PHONG04', 'NHANVIEN01'),
('PHONG04', 'NHANVIEN02');

-- --------------------------------------------------------

--
-- Table structure for table `phong_vatdung`
--

CREATE TABLE `phong_vatdung` (
  `MaPhong` varchar(255) NOT NULL,
  `MaVatDung` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `phong_vatdung`
--

INSERT INTO `phong_vatdung` (`MaPhong`, `MaVatDung`) VALUES
('PHONG01', 'VATDUNG01'),
('PHONG01', 'VATDUNG03'),
('PHONG02', 'VATDUNG01'),
('PHONG02', 'VATDUNG02'),
('PHONG04', 'VATDUNG03');

-- --------------------------------------------------------

--
-- Table structure for table `sinhvien`
--

CREATE TABLE `sinhvien` (
  `MaSinhVien` varchar(255) NOT NULL,
  `SoCCCD` varchar(30) NOT NULL,
  `TenSinhVien` varchar(255) NOT NULL,
  `NgaySinh` date NOT NULL,
  `GioiTinh` int(1) NOT NULL,
  `SoDienThoai` varchar(11) NOT NULL,
  `Khoa` varchar(500) NOT NULL,
  `MaPhong` varchar(255) NOT NULL,
  `TrangThai` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sinhvien`
--

INSERT INTO `sinhvien` (`MaSinhVien`, `SoCCCD`, `TenSinhVien`, `NgaySinh`, `GioiTinh`, `SoDienThoai`, `Khoa`, `MaPhong`, `TrangThai`) VALUES
('20810210262', '001202020203', 'Nguyễn Văn An', '1999-05-11', 1, '0379962045', 'Công nghệ thông tin', 'PHONG01', 1),
('20810210262585', '0021296252265', 'Nguyễn Văn Dũng', '1996-05-29', 1, '0379962045', 'Công nghệ thông tin', 'PHONG01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `MaTaiKhoan` varchar(255) NOT NULL,
  `HoTen` varchar(500) NOT NULL,
  `TaiKhoan` varchar(255) NOT NULL,
  `MatKhau` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`MaTaiKhoan`, `HoTen`, `TaiKhoan`, `MatKhau`) VALUES
('Admin', 'Nguyễn Văn An', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `vatdung`
--

CREATE TABLE `vatdung` (
  `MaVatDung` varchar(255) NOT NULL,
  `TenVatDung` varchar(500) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `TrangThai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `vatdung`
--

INSERT INTO `vatdung` (`MaVatDung`, `TenVatDung`, `SoLuong`, `TrangThai`) VALUES
('VATDUNG01', 'Giường đơn', 6, 2),
('VATDUNG02', 'Tủ quần áo', 3, 1),
('VATDUNG03', 'Bàn học tập', 12, 1);

-- --------------------------------------------------------

--
-- Table structure for table `vitri`
--

CREATE TABLE `vitri` (
  `MaViTri` varchar(255) NOT NULL,
  `ToaNha` varchar(500) NOT NULL,
  `Tang` varchar(500) NOT NULL,
  `CoSo` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `vitri`
--

INSERT INTO `vitri` (`MaViTri`, `ToaNha`, `Tang`, `CoSo`) VALUES
('VITRI01', 'Tòa nhà E03', 'Tầng 4', 'Cơ sở I'),
('VITRI02', 'Tòa nhà A1', 'Tầng 04', 'Cơ sở I');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD PRIMARY KEY (`MaChiTietHoaDon`),
  ADD KEY `TenMuc` (`TenMuc`),
  ADD KEY `MaHoaDon` (`MaHoaDon`),
  ADD KEY `TenMuc_2` (`TenMuc`);

--
-- Indexes for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`MaHoaDon`),
  ADD KEY `MaPhong` (`MaPhong`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MaNhanVien`);

--
-- Indexes for table `phong`
--
ALTER TABLE `phong`
  ADD PRIMARY KEY (`MaPhong`),
  ADD KEY `MaViTri` (`MaViTri`);

--
-- Indexes for table `phong_nhanvien`
--
ALTER TABLE `phong_nhanvien`
  ADD PRIMARY KEY (`MaPhong`,`MaNhanVien`),
  ADD KEY `MaPhong` (`MaPhong`,`MaNhanVien`),
  ADD KEY `MaNhanVien` (`MaNhanVien`);

--
-- Indexes for table `phong_vatdung`
--
ALTER TABLE `phong_vatdung`
  ADD PRIMARY KEY (`MaPhong`,`MaVatDung`),
  ADD KEY `MaPhong` (`MaPhong`,`MaVatDung`),
  ADD KEY `MaVatDung` (`MaVatDung`);

--
-- Indexes for table `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD PRIMARY KEY (`MaSinhVien`),
  ADD KEY `MaPhong` (`MaPhong`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`MaTaiKhoan`);

--
-- Indexes for table `vatdung`
--
ALTER TABLE `vatdung`
  ADD PRIMARY KEY (`MaVatDung`);

--
-- Indexes for table `vitri`
--
ALTER TABLE `vitri`
  ADD PRIMARY KEY (`MaViTri`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  MODIFY `MaChiTietHoaDon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD CONSTRAINT `chitiethoadon_ibfk_1` FOREIGN KEY (`MaHoaDon`) REFERENCES `hoadon` (`MaHoaDon`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`MaPhong`) REFERENCES `phong` (`MaPhong`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `phong`
--
ALTER TABLE `phong`
  ADD CONSTRAINT `phong_ibfk_1` FOREIGN KEY (`MaViTri`) REFERENCES `vitri` (`MaViTri`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `phong_nhanvien`
--
ALTER TABLE `phong_nhanvien`
  ADD CONSTRAINT `phong_nhanvien_ibfk_1` FOREIGN KEY (`MaNhanVien`) REFERENCES `nhanvien` (`MaNhanVien`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `phong_nhanvien_ibfk_2` FOREIGN KEY (`MaPhong`) REFERENCES `phong` (`MaPhong`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `phong_vatdung`
--
ALTER TABLE `phong_vatdung`
  ADD CONSTRAINT `phong_vatdung_ibfk_1` FOREIGN KEY (`MaVatDung`) REFERENCES `vatdung` (`MaVatDung`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `phong_vatdung_ibfk_2` FOREIGN KEY (`MaPhong`) REFERENCES `phong` (`MaPhong`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD CONSTRAINT `sinhvien_ibfk_1` FOREIGN KEY (`MaPhong`) REFERENCES `phong` (`MaPhong`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
