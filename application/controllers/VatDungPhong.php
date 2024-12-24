<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VatDungPhong extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata('TaiKhoan')){
			return redirect(base_url('dang-nhap/'));
		}
		$this->load->model('Model_Phong');
		$this->load->model('Model_VatDung');
	}

	public function index()
	{
		$data['title'] = "Quản lý vật dụng phòng";
		$data['list'] = $this->Model_VatDung->getAll();
		return $this->load->view('View_VatDungPhong', $data);
	}

	public function add(){
		$data['title'] = "Thêm vật dụng phòng";
		$data['phong'] = $this->Model_Phong->getAll();
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$mavatdung = $this->input->post('mavatdung');
			$tenvatdung = $this->input->post('tenvatdung');
			$soluong = $this->input->post('soluong');
			$trangthai = $this->input->post('trangthai');
			$phong = $this->input->post('phong');
			if(count($this->Model_VatDung->getById($mavatdung)) >= 1){
				$data['error'] = "Mã vật dụng đã tồn tại!";
				return $this->load->view('View_ThemVatDung', $data);
			}
			
			$this->Model_VatDung->insert($mavatdung, $tenvatdung, $soluong, $trangthai);
			foreach ($phong as $maphong) {
	            $this->Model_VatDung->insert_phong($maphong, $mavatdung);
	        }

			$this->session->set_flashdata('success', 'Thêm vật dụng phòng thành công!');
			return redirect(base_url('vat-dung-phong/'));
		}
		return $this->load->view('View_ThemVatDung', $data);
	}

	public function update($mavatdung){
		$data['detail'] = $this->Model_VatDung->getById($mavatdung)[0];
		$data['phong'] = $this->Model_Phong->getAll();
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$tenvatdung = $this->input->post('tenvatdung');
			$soluong = $this->input->post('soluong');
			$trangthai = $this->input->post('trangthai');
			$phong = $this->input->post('phong');
			
			$this->Model_VatDung->update($mavatdung, $tenvatdung, $soluong, $trangthai);
			$this->Model_VatDung->delete_phong($mavatdung);

			foreach ($phong as $maphong) {
	            $this->Model_VatDung->insert_phong($maphong, $mavatdung);
	        }

			$data['success'] = "Cập nhật vật dụng phòng thành công!";
			$data['detail'] = $this->Model_VatDung->getById($mavatdung)[0];
			return $this->load->view('View_SuaVatDung', $data);
		}
		return $this->load->view('View_SuaVatDung', $data);
	}

	public function delete($mavatdung){
		$this->Model_VatDung->delete_phong($mavatdung);
		$this->Model_VatDung->delete($mavatdung);
		$this->session->set_flashdata('success', 'Xóa vật dụng phòng thành công!');
		return redirect(base_url('vat-dung-phong/'));
	}

}

/* End of file PhongKyTuc.php */
/* Location: ./application/controllers/PhongKyTuc.php */