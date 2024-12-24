<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_NhanVien extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
	}

	public function getAll(){
		return $this->db->query('SELECT * FROM nhanvien')->result_array();
	}

	public function getById($Manhanvien){
		return $this->db->query('SELECT * FROM nhanvien WHERE Manhanvien = ?', array($Manhanvien))->result_array();
	}

	public function update($manhanvien, $tennhanvien, $diachi, $sodienthoai,$chucvu){
		return $this->db->query('UPDATE nhanvien SET Manhanvien = ?, Tennhanvien = ?, diachi = ?, sodienthoai = ?, chucvu = ? WHERE Manhanvien = ?', array($manhanvien, $tennhanvien, $diachi, $sodienthoai, $chucvu, $manhanvien));
	}

	public function insert($manhanvien, $tennhanvien, $diachi, $sodienthoai,$chucvu){
		return $this->db->query('INSERT INTO `nhanvien`(`Manhanvien`, `Tennhanvien`, `diachi`, `sodienthoai`, `chucvu`) VALUES (?, ?, ?, ?, ?)', array($manhanvien, $tennhanvien, $diachi, $sodienthoai,$chucvu));
	}

	public function insert_phong($MaPhong, $Manhanvien){
		return $this->db->query('INSERT INTO `phong_nhanvien`(`MaPhong`, `Manhanvien`) VALUES (?, ?)', array($MaPhong, $Manhanvien));
	}

	public function delete($manhanvien){
		return $this->db->query('DELETE FROM `nhanvien` WHERE Manhanvien = ?', array($manhanvien));
	}

	public function deletePhong($manhanvien){
		return $this->db->query('DELETE FROM `phong_nhanvien` WHERE Manhanvien = ?', array($manhanvien));
	}

	public function getNhanVienPhongById($manhanvien, $maphong){
		return $this->db->query('SELECT * FROM `phong_nhanvien` WHERE Manhanvien = ? AND MaPhong = ?', array($manhanvien, $maphong))->result_array();
	}
}

/* End of file Model_LoaiPhong.php */
/* Location: ./application/models/Model_LoaiPhong.php */