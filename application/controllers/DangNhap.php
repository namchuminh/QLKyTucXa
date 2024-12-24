<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class DangNhap extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->has_userdata('TaiKhoan')){
			return redirect(base_url());
		}
		$this->load->model('Model_DangNhap');
	}

	public function index()
	{
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $taikhoan = $this->input->post('taikhoan');
			$matkhau = md5($this->input->post('matkhau'));

			if(count($this->Model_DangNhap->checkLogin($taikhoan,$matkhau)) <= 0){
				$data['error'] = "Sai tài khoản hoặc mật khẩu!";
				return $this->load->view('View_DangNhap', $data);
			}else{
				$newdata = array(
					'MaTaiKhoan' => $this->Model_DangNhap->checkLogin($taikhoan,$matkhau)[0]['MaTaiKhoan'],
					'HoTen' => $this->Model_DangNhap->checkLogin($taikhoan,$matkhau)[0]['HoTen'],
					'TaiKhoan' => $this->Model_DangNhap->checkLogin($taikhoan,$matkhau)[0]['TaiKhoan'],
				);
				$this->session->set_userdata($newdata);
				$this->session->set_flashdata('success', 'Đăng nhập thành công!');
				return redirect(base_url());
			}
		}
		return $this->load->view('View_DangNhap');
	}

}

/* End of file DangNhap.php */
/* Location: ./application/controllers/DangNhap.php */