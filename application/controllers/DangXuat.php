<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class DangXuat extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata('TaiKhoan')){
			return redirect(base_url('dang-nhap/'));
		}
	}

	public function index()
	{
		$userdata = array('MaTaiKhoan','HoTen', 'TaiKhoan');
		$this->session->unset_userdata($userdata);
		$this->session->set_flashdata('success', 'Đăng xuất thành công!');
		return redirect(base_url('dang-nhap/'));
	}

}

/* End of file DangXuat.php */
/* Location: ./application/controllers/DangXuat.php */