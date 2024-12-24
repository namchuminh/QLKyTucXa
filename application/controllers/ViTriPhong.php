<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ViTriPhong extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata('TaiKhoan')){
			return redirect(base_url('dang-nhap/'));
		}
		$this->load->model('Model_ViTri');
	}

	public function index()
	{
		$data['title'] = "Quản lý vị trí phòng";
		$data['list'] = $this->Model_ViTri->getAll();
		return $this->load->view('View_ViTri', $data);
	}

	public function add(){
		$data['title'] = "Thêm thông tin vị trí phòng";
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$mavitriphong = $this->input->post('mavitriphong');
			$toanha = $this->input->post('toanha');
			$tang = $this->input->post('tang');
			$coso = $this->input->post('coso');
			if(count($this->Model_ViTri->getById($mavitriphong)) >= 1){
				$data['error'] = "Mã vị trí phòng đã tồn tại!";
				return $this->load->view('View_ThemViTri', $data);
			}

			$this->Model_ViTri->insert($mavitriphong, $toanha, $tang, $coso);
			$this->session->set_flashdata('success', 'Thêm thông tin vị trí phòng thành công!');
			return redirect(base_url('vi-tri-phong/'));
		}
		return $this->load->view('View_ThemViTri', $data);
	}

	public function update($MaViTri){
		$data['title'] = "Cập nhật thông tin vị trí phòng";
		$data['detail'] = $this->Model_ViTri->getById($MaViTri);
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$mavitriphong = $this->input->post('mavitriphong');
			$toanha = $this->input->post('toanha');
			$tang = $this->input->post('tang');
			$coso = $this->input->post('coso');

			$this->Model_ViTri->update($mavitriphong, $toanha, $tang, $coso);
			$data['detail'] = $this->Model_ViTri->getById($MaViTri);
			$data['success'] = "Cập nhật thông tin vị trí phòng thành công!";
			return $this->load->view('View_SuaViTri', $data);
		}
		return $this->load->view('View_SuaViTri', $data);
	}

	public function delete($MaViTri){
		$this->Model_ViTri->delete($MaViTri);
		$this->session->set_flashdata('success', 'Xóa vị trí phòng thành công!');
		return redirect(base_url('vi-tri-phong/'));
	}

}

/* End of file PhongHoc.php */
/* Location: ./application/controllers/PhongHoc.php */