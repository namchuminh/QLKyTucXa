<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class NhanVien extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata('TaiKhoan')){
			return redirect(base_url('dang-nhap/'));
		}
		$this->load->model('Model_NhanVien');
		$this->load->model('Model_Phong');
	}

	public function index()
	{
		$data['title'] = "Quản lý nhân viên";
		$data['list'] = $this->Model_NhanVien->getAll();
		return $this->load->view('View_NhanVien', $data);
	}

	public function add(){
		$data['title'] = "Thêm thông tin nhân viên";
		$data['phong'] = $this->Model_Phong->getAll();
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$manhanvien = $this->input->post('manhanvien');
			$tennhanvien = $this->input->post('tennhanvien');
			$diachi = $this->input->post('diachi');
			$sodienthoai = $this->input->post('sodienthoai');
			$chucvu = $this->input->post('chucvu');
			$phong = $this->input->post('phong');

			if(count($this->Model_NhanVien->getById($manhanvien)) >= 1){
				$data['error'] = "Mã nhân viên đã tồn tại!";
				return $this->load->view('View_ThemNhanVien', $data);
			}

			$this->Model_NhanVien->insert($manhanvien, $tennhanvien, $diachi, $sodienthoai,$chucvu);

			foreach ($phong as $maphong) {
	            $this->Model_NhanVien->insert_phong($maphong, $manhanvien);
	        }

			$this->session->set_flashdata('success', 'Thêm thông tin nhân viên thành công!');
			return redirect(base_url('nhan-vien/'));
		}
		return $this->load->view('View_ThemNhanVien', $data);
	}

	public function update($manhanvien){
		$data['title'] = "Cập nhật thông tin nhân viên";
		$data['detail'] = $this->Model_NhanVien->getById($manhanvien);
		$data['phong'] = $this->Model_Phong->getAll();
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$manhanvien = $this->input->post('manhanvien');
			$tennhanvien = $this->input->post('tennhanvien');
			$diachi = $this->input->post('diachi');
			$sodienthoai = $this->input->post('sodienthoai');
			$chucvu = $this->input->post('chucvu');
			$phong = $this->input->post('phong');

			$this->Model_NhanVien->update($manhanvien, $tennhanvien, $diachi, $sodienthoai,$chucvu);
			$this->Model_NhanVien->deletePhong($manhanvien);
			foreach ($phong as $maphong) {
	            $this->Model_NhanVien->insert_phong($maphong, $manhanvien);
	        }
			$data['detail'] = $this->Model_NhanVien->getById($manhanvien);
			$data['success'] = "Cập nhật thông tin nhân viên thành công!";
			return $this->load->view('View_SuaNhanVien', $data);

		}
		return $this->load->view('View_SuaNhanVien', $data);
	}

	public function delete($manhanvien){
		$this->Model_NhanVien->deletePhong($manhanvien);
		$this->Model_NhanVien->delete($manhanvien);
		$this->session->set_flashdata('success', 'Xóa nhân viên thành công!');
		return redirect(base_url('nhan-vien/'));
	}

}

/* End of file PhongHoc.php */
/* Location: ./application/controllers/PhongHoc.php */