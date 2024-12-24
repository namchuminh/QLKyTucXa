<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SinhVien extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata('TaiKhoan')){
			return redirect(base_url('dang-nhap/'));
		}
		$this->load->model('Model_Phong');
		$this->load->model('Model_SinhVien');
	}

	public function index()
	{
		$data['title'] = "Quản lý sinh viên ký túc xá";
		$data['list'] = $this->Model_SinhVien->getAll();
		return $this->load->view('View_SinhVien', $data);
	}

	public function add(){
		$data['title'] = "Thêm sinh viên vào phòng ký túc xá";
		$data['phong'] = $this->Model_Phong->getAll();
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$masinhvien = $this->input->post('masinhvien');
			$soccd = $this->input->post('socccd');
			$tensinhvien = $this->input->post('tensinhvien');
			$ngaysinh = $this->input->post('ngaysinh');
			$gioitinh = $this->input->post('gioitinh');
			$sodienthoai = $this->input->post('sodienthoai');
			$khoa = $this->input->post('khoa');
			$maphong = $this->input->post('maphong');
			$trangthai = $this->input->post('trangthai');

			if(count($this->Model_SinhVien->getById($masinhvien)) >= 1){
				$data['error'] = "Mã sinh viên đã tồn tại!";
				return $this->load->view('View_ThemSinhVien', $data);
			}
			
			$this->Model_SinhVien->insert($masinhvien, $soccd, $tensinhvien, $ngaysinh, $gioitinh, $sodienthoai, $khoa, $maphong, $trangthai);

			$this->session->set_flashdata('success', 'Thêm sinh viên vào ký túc thành công!');
			return redirect(base_url('sinh-vien/'));
		}
		return $this->load->view('View_ThemSinhVien', $data);
	}

	public function update($masinhvien){
		$data['detail'] = $this->Model_SinhVien->getById($masinhvien)[0];
		$data['phong'] = $this->Model_Phong->getAll();
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$soccd = $this->input->post('socccd');
			$tensinhvien = $this->input->post('tensinhvien');
			$ngaysinh = $this->input->post('ngaysinh');
			$gioitinh = $this->input->post('gioitinh');
			$sodienthoai = $this->input->post('sodienthoai');
			$khoa = $this->input->post('khoa');
			$maphong = $this->input->post('maphong');
			$trangthai = $this->input->post('trangthai');
			
			$this->Model_SinhVien->update($masinhvien, $soccd, $tensinhvien, $ngaysinh, $gioitinh, $sodienthoai, $khoa, $maphong, $trangthai);

			$data['success'] = "Cập nhật sinh viên thành công!";
			$data['detail'] = $this->Model_SinhVien->getById($masinhvien)[0];
			return $this->load->view('View_SuaSinhVien', $data);
		}
		return $this->load->view('View_SuaSinhVien', $data);
	}

	public function delete($masinhvien){
		$this->Model_SinhVien->delete($masinhvien);
		$this->session->set_flashdata('success', 'Xóa sinh viên thành công!');
		return redirect(base_url('sinh-vien/'));
	}

}

/* End of file PhongKyTuc.php */
/* Location: ./application/controllers/PhongKyTuc.php */