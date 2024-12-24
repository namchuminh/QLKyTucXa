<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_TrangChu extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getCountPhong(){
		return $this->db->query("SELECT COALESCE(COUNT(*), 0) AS tongso FROM phong")->result_array();
	}

	public function getCountSinhVien(){
		return $this->db->query("SELECT COALESCE(COUNT(*), 0) AS tongso FROM sinhvien")->result_array();
	}

	public function getCountVatDung(){
		return $this->db->query("SELECT COALESCE(COUNT(*), 0) AS tongso FROM vatdung")->result_array();
	}

	public function getCountNhanVien(){
		return $this->db->query("SELECT COALESCE(COUNT(*), 0) AS tongso FROM nhanvien")->result_array();
	}

}

/* End of file Model_TrangChu.php */
/* Location: ./application/models/Model_TrangChu.php */