<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CaNhan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata('TaiKhoan')){
			return redirect(base_url('dang-nhap/'));
		}
		$this->load->model('Model_CaNhan');
	}

	public function index()
	{
		$data['title'] = "Thông tin cá nhân";
		$data['detail'] = $this->Model_CaNhan->getById($this->session->userdata('MaTaiKhoan'));
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$matkhau = $this->Model_CaNhan->getById($this->session->userdata('MaTaiKhoan'))[0]['MatKhau'];
			$taikhoan = $this->input->post('taikhoan');
			$hoten = $this->input->post('hoten');
			if(isset($_POST['matkhau']) && !empty($_POST['matkhau']))
			{
				$matkhau = $this->input->post('matkhau');
				if($matkhau != $this->input->post('matkhau2')){
					$data['error'] = "Mật khẩu nhập lại không trùng khớp!";
					return $this->load->view('View_CaNhan', $data);
				}

				$this->Model_CaNhan->update($hoten, $taikhoan, md5($matkhau), $this->session->userdata('MaTaiKhoan'));
				$data['success'] = "Cập nhật thông tin cá nhân thành công!";
				$data['detail'] = $this->Model_CaNhan->getById($this->session->userdata('MaTaiKhoan'));
				return $this->load->view('View_CaNhan', $data);
			}else{
				$this->Model_CaNhan->update($hoten, $taikhoan, $matkhau, $this->session->userdata('MaTaiKhoan'));
				$data['success'] = "Cập nhật thông tin cá nhân thành công!";
				$data['detail'] = $this->Model_CaNhan->getById($this->session->userdata('MaTaiKhoan'));
				return $this->load->view('View_CaNhan', $data);
			}
		}
		return $this->load->view('View_CaNhan', $data);
	}

}

/* End of file CaNhan.php */
/* Location: ./application/controllers/CaNhan.php */