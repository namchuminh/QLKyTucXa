<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_DangNhap extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function checkLogin($taikhoan,$matkhau){
		return $this->db->query("SELECT * FROM taikhoan WHERE TaiKhoan = ? AND MatKhau = ?", array($taikhoan, $matkhau))->result_array();
	}

}

/* End of file Model_DangNhap.php */
/* Location: ./application/models/Model_DangNhap.php */