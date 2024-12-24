<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_HoaDon extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getAll(){
		return $this->db->query('SELECT hoadon.*, phong.TenPhong FROM hoadon, phong WHERE hoadon.MaPhong = phong.MaPhong ORDER BY ThanhToan ASC')->result_array();
	}

	public function insert($mahoadon, $maphong){
		return $this->db->query('INSERT INTO `hoadon`(`MaHoaDon`, `MaPhong`, `TongTien`, `ThanhToan`) VALUES (?, ?, 0, 0)', array($mahoadon, $maphong));
	}

	public function getById($mahoadon){
		return $this->db->query('SELECT hoadon.*, phong.TenPhong FROM hoadon, phong WHERE hoadon.MaPhong = phong.MaPhong AND hoadon.MaHoaDon = ?', array($mahoadon))->result_array();
	}

	public function getDetailAll($mahoadon){
		return $this->db->query('SELECT * FROM chitiethoadon WHERE MaHoaDon = ?', array($mahoadon))->result_array();
	}


	public function insertDetail($TenMuc, $MaHoaDon, $ThanhTien, $SoLuong, $GhiChu){
		return $this->db->query('INSERT INTO `chitiethoadon`(`TenMuc`, `MaHoaDon`, `ThanhTien`, `SoLuong`, `GhiChu`) VALUES (?, ?, ?, ?, ?)', array($TenMuc, $MaHoaDon, $ThanhTien, $SoLuong, $GhiChu));
	}

	public function updateTotal($mahoadon, $tongtien){
		return $this->db->query('UPDATE `hoadon` SET `TongTien`=? WHERE MaHoaDon = ?', array($tongtien, $mahoadon));
	}

	public function deleteDetail($machitiethoadon){
		return $this->db->query('DELETE FROM `chitiethoadon` WHERE MaChiTietHoaDon = ?', array($machitiethoadon));
	}

	public function getByIdDetail($machitiethoadon){
		return $this->db->query('SELECT * FROM chitiethoadon WHERE MaChiTietHoaDon = ?', array($machitiethoadon))->result_array();
	}

	public function updatPay($mahoadon){
		return $this->db->query('UPDATE `hoadon` SET `ThanhToan`=1 WHERE MaHoaDon = ?', array($mahoadon));
	}
}

/* End of file Model_HoaDon.php */
/* Location: ./application/models/Model_HoaDon.php */