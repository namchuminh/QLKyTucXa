<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_SinhVien extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getAll(){
		return $this->db->query("SELECT phong.TenPhong, sinhvien.* FROM phong, sinhvien WHERE phong.MaPhong = sinhvien.MaPhong ORDER BY phong.TenPhong")->result_array();
	}

	public function getById($masinhvien){
		return $this->db->query("SELECT * FROM sinhvien WHERE masinhvien = ?", array($masinhvien))->result_array();
	}

	public function insert($masinhvien, $soccd, $tensinhvien, $ngaysinh, $gioitinh, $sodienthoai, $khoa, $maphong, $trangthai){
		return $this->db->query("INSERT INTO sinhvien (masinhvien, socccd, tensinhvien, ngaysinh, gioitinh, sodienthoai, khoa, maphong, trangthai) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)", array($masinhvien, $soccd, $tensinhvien, $ngaysinh, $gioitinh, $sodienthoai, $khoa, $maphong, $trangthai));
	}

	public function update($masinhvien, $soccd, $tensinhvien, $ngaysinh, $gioitinh, $sodienthoai, $khoa, $maphong, $trangthai){
		return $this->db->query("UPDATE sinhvien SET socccd = ?, tensinhvien = ?, ngaysinh = ?, gioitinh = ?, sodienthoai = ?, khoa = ?, maphong = ?, trangthai = ? WHERE masinhvien = ?", array($soccd, $tensinhvien, $ngaysinh, $gioitinh, $sodienthoai, $khoa, $maphong, $trangthai, $masinhvien));
	}

	public function delete($masinhvien){
		return $this->db->query("DELETE FROM sinhvien WHERE masinhvien = ?", array($masinhvien));
	}

}

/* End of file Model_Phong.php */
/* Location: ./application/models/Model_Phong.php */