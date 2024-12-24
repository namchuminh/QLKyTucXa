<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PhongKyTuc extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata('TaiKhoan')){
			return redirect(base_url('dang-nhap/'));
		}
		$this->load->model('Model_Phong');
		$this->load->model('Model_ViTri');
	}

	public function index()
	{
		$data['title'] = "Quản lý phòng ký túc xá";
		$data['list'] = $this->Model_Phong->getAll();
		return $this->load->view('View_PhongKyTuc', $data);
	}

	public function add(){
		$data['title'] = "Thêm phòng ký túc xá";
		$data['vitri'] = $this->Model_ViTri->getAll();
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$maphong = $this->input->post('maphong');
			$tenphong = $this->input->post('tenphong');
			$soluong = $this->input->post('soluong');
			$mavitri = $this->input->post('vitri');
			$trangthai = $this->input->post('trangthai');

			if(count($this->Model_Phong->getById($maphong)) >= 1){
				$data['error'] = "Mã phòng đã tồn tại!";
				return $this->load->view('View_ThemPhongKyTuc', $data);
			}
			
			$this->Model_Phong->insert($maphong, $tenphong, $soluong, $mavitri, $trangthai);

			$this->session->set_flashdata('success', 'Thêm phòng ký túc thành công!');
			return redirect(base_url('phong-ky-tuc/'));
		}
		return $this->load->view('View_ThemPhongKyTuc', $data);
	}

	public function update($maphong){
		$data['detail'] = $this->Model_Phong->getById($maphong)[0];
		$data['vitri'] = $this->Model_ViTri->getAll();
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$tenphong = $this->input->post('tenphong');
			$soluong = $this->input->post('soluong');
			$mavitri = $this->input->post('vitri');
			$trangthai = $this->input->post('trangthai');
			
			$this->Model_Phong->update($maphong, $tenphong, $soluong, $mavitri, $trangthai);

			$data['success'] = "Cập nhật phòng thành công!";
			$data['detail'] = $this->Model_Phong->getById($maphong)[0];
			return $this->load->view('View_SuaPhongKyTuc', $data);
		}
		return $this->load->view('View_SuaPhongKyTuc', $data);
	}

	public function delete($maphong){
		$this->Model_Phong->delete($maphong);
		$this->session->set_flashdata('success', 'Xóa phòng ký túc thành công!');
		return redirect(base_url('phong-ky-tuc/'));
	}

}

/* End of file PhongKyTuc.php */
/* Location: ./application/controllers/PhongKyTuc.php */