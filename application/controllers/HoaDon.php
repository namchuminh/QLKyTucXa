<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class HoaDon extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata('TaiKhoan')){
			return redirect(base_url('dang-nhap/'));
		}
		$this->load->model('Model_HoaDon');
		$this->load->model('Model_Phong');
		$this->load->model('Model_VatDung');
	}

	public function index()
	{
		$data['title'] = "Quản lý hóa đơn";
		$data['list'] = $this->Model_HoaDon->getAll();
		$data['rooms'] = $this->Model_Phong->getAll();
		return $this->load->view('View_HoaDon', $data);
	}

	public function view($mahoadon){
		$data['title'] = "Xử lý hóa đơn";
		$data['list'] = $this->Model_HoaDon->getDetailAll($mahoadon);
		$data['detail'] = $this->Model_HoaDon->getById($mahoadon);

		return $this->load->view('View_XemHoaDon', $data);
	}	

	public function add(){
		$maphong = $this->input->post('MaPhong');
		$mahoadon = substr(str_shuffle(str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789', 15)), 0, 15);
		$this->Model_HoaDon->insert($mahoadon, $maphong);

		return redirect(base_url('hoa-don/them/'.$mahoadon.'/chi-tiet'));
	}

	public function addDetail($mahoadon){
		if ($this->Model_HoaDon->getById($mahoadon)[0]['ThanhToan'] == 1) {
			return redirect(base_url('hoa-don/xem/'.$mahoadon));
		}

		$maphong = $this->Model_HoaDon->getById($mahoadon)[0]['MaPhong'];

		$data['title'] = "Tạo hóa đơn";
		$data['list'] = $this->Model_HoaDon->getDetailAll($mahoadon);
		$data['objects'] = $this->Model_VatDung->getAllByMaPhong($maphong);
		$data['mahoadon'] = $mahoadon;

		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$tenmuc = $this->input->post('tenmuc');
			$thanhtien = $this->input->post('thanhtien');
			$soluong = $this->input->post('soluong');

			$ghichu = $this->input->post('ghichu');

			$this->Model_HoaDon->insertDetail($tenmuc, $mahoadon, $thanhtien, $soluong, $ghichu);

			$tongtiencu = $this->Model_HoaDon->getById($mahoadon)[0]['TongTien'];

			$tongtienmoi = $tongtiencu + ($soluong * $thanhtien);

			$this->Model_HoaDon->updateTotal($mahoadon, $tongtienmoi);

			return redirect(base_url('hoa-don/them/'.$mahoadon.'/chi-tiet'));
		}


		return $this->load->view('View_ThemChiTietHoaDon', $data);
	}

	public function deleteDetail($machitiethoadon){
		$mahoadon = $this->input->get('mahoadon');

		$soluong = $this->Model_HoaDon->getByIdDetail($machitiethoadon)[0]['SoLuong'];
		$thanhtien = $this->Model_HoaDon->getByIdDetail($machitiethoadon)[0]['ThanhTien'];

		$tongtiencu = $this->Model_HoaDon->getById($mahoadon)[0]['TongTien'];

		$tongtienmoi = $tongtiencu - ($soluong * $thanhtien);

		$this->Model_HoaDon->updateTotal($mahoadon, $tongtienmoi);

		$this->Model_HoaDon->deleteDetail($machitiethoadon);

		return redirect(base_url('hoa-don/them/'.$mahoadon.'/chi-tiet'));
	}

	public function pay($mahoadon){
		$this->Model_HoaDon->updatPay($mahoadon);

		return redirect(base_url('hoa-don/xem/'.$mahoadon));
	}

}

/* End of file HoaDon.php */
/* Location: ./application/controllers/HoaDon.php */