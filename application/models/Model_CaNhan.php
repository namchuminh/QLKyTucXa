<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_CaNhan extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
	}

	public function getById($MaTaiKhoan){
		return $this->db->query('SELECT * FROM taikhoan WHERE MaTaiKhoan = ?', array($MaTaiKhoan))->result_array();
	}

	public function update($hoten, $taikhoan, $matkhau, $mataikhoan){
		return $this->db->query('UPDATE taikhoan SET hoten = ?, taikhoan = ?, matkhau
			 = ? WHERE mataikhoan = ?',array($hoten, $taikhoan, $matkhau, $mataikhoan));
	}

}

/* End of file Model_CaNhan.php */
/* Location: ./application/models/Model_CaNhan.php */