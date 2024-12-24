<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_VatDung extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getAll(){
		return $this->db->query("SELECT * FROM vatdung")->result_array();
	}

	public function getById($mavatdung){
		return $this->db->query("SELECT * FROM vatdung WHERE mavatdung = ?", array($mavatdung))->result_array();
	}

	public function insert($mavatdung, $tenvatdung, $soluong, $trangthai){
		return $this->db->query("INSERT INTO vatdung (mavatdung, tenvatdung, soluong, trangthai) VALUES (?, ?, ?, ?)", array($mavatdung, $tenvatdung, $soluong, $trangthai));
	}

	public function update($mavatdung, $tenvatdung, $soluong, $trangthai){
		return $this->db->query("UPDATE vatdung SET tenvatdung = ?, SoLuong = ?, TrangThai = ? WHERE mavatdung = ?", array($tenvatdung, $soluong, $trangthai, $mavatdung));
	}

	public function delete($mavatdung){
		return $this->db->query("DELETE FROM vatdung WHERE mavatdung = ?", array($mavatdung));
	}

	public function insert_phong($maphong, $mavatdung){
		return $this->db->query("INSERT INTO phong_vatdung (maphong, mavatdung) VALUES (?, ?)", array($maphong, $mavatdung));
	}

	public function delete_phong($mavatdung){
		return $this->db->query("DELETE FROM phong_vatdung WHERE mavatdung = ?", array($mavatdung));
	}

	public function get_phong($maphong, $mavatdung){
		return $this->db->query('SELECT * FROM `phong_vatdung` WHERE mavatdung = ? AND maphong = ?', array($mavatdung, $maphong))->result_array();
	}

	public function getAllByMaPhong($maphong){
		return $this->db->query("SELECT vatdung.* FROM `phong_vatdung`, `vatdung` WHERE phong_vatdung.MaPhong = ? AND phong_vatdung.MaVatDung = vatdung.MaVatDung", array($maphong))->result_array();
	}

	
}

/* End of file Model_VatDung.php */
/* Location: ./application/models/Model_VatDung.php */