<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class TrangChu extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata('TaiKhoan')){
			return redirect(base_url('dang-nhap/'));
		}
		$this->load->model('Model_TrangChu');
	}

	public function index()
	{
		$data['title'] = "Hệ thống quản lý ký túc xá trường học!";
		$data['countPhong'] = $this->Model_TrangChu->getCountPhong()[0]['tongso'];
		$data['countSinhVien'] = $this->Model_TrangChu->getCountSinhVien()[0]['tongso'];
		$data['countVatDung'] = $this->Model_TrangChu->getCountVatDung()[0]['tongso'];
		$data['countNhanVien'] = $this->Model_TrangChu->getCountNhanVien()[0]['tongso'];
		return $this->load->view('View_TrangChu', $data);
	}

}

/* End of file TrangChu.php */
/* Location: ./application/controllers/TrangChu.php */