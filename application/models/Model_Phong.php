<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Phong extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getAll(){
		return $this->db->query("SELECT phong.*, vitri.* FROM phong, vitri WHERE phong.MaViTri = vitri.MaViTri ORDER BY phong.TenPhong")->result_array();
	}

	public function getById($maphong){
		return $this->db->query("SELECT * FROM phong WHERE MaPhong = ?", array($maphong))->result_array();
	}

	public function insert($maphong, $tenphong, $soluong, $mavitri, $trangthai){
		return $this->db->query("INSERT INTO phong (maphong, tenphong, soluong, mavitri, trangthai) VALUES (?, ?, ?, ?, ?)", array($maphong, $tenphong, $soluong, $mavitri, $trangthai));
	}

	public function update($maphong, $tenphong, $soluong, $mavitri, $trangthai){
		return $this->db->query("UPDATE phong SET TenPhong = ?, SoLuong = ?, MaViTri = ?, TrangThai = ? WHERE MaPhong = ?", array($tenphong, $soluong, $mavitri, $trangthai, $maphong));
	}

	public function delete($maphong){
		return $this->db->query("DELETE FROM phong WHERE MaPhong = ?", array($maphong));
	}

}

/* End of file Model_Phong.php */
/* Location: ./application/models/Model_Phong.php */