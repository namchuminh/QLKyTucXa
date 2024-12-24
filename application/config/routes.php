<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'TrangChu';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['dang-nhap'] = 'DangNhap/index';
$route['dang-xuat'] = 'DangXuat/index';

$route['phong-ky-tuc'] = 'PhongKyTuc/index';
$route['phong-ky-tuc/them'] = 'PhongKyTuc/add';
$route['phong-ky-tuc/sua/(:any)'] = 'PhongKyTuc/update/$1';
$route['phong-ky-tuc/xoa/(:any)'] = 'PhongKyTuc/delete/$1';

$route['sinh-vien'] = 'SinhVien/index';
$route['sinh-vien/them'] = 'SinhVien/add';
$route['sinh-vien/sua/(:any)'] = 'SinhVien/update/$1';
$route['sinh-vien/xoa/(:any)'] = 'SinhVien/delete/$1';

$route['vat-dung-phong'] = 'VatDungPhong/index';
$route['vat-dung-phong/them'] = 'VatDungPhong/add';
$route['vat-dung-phong/sua/(:any)'] = 'VatDungPhong/update/$1';
$route['vat-dung-phong/xoa/(:any)'] = 'VatDungPhong/delete/$1';

$route['vi-tri-phong'] = 'ViTriPhong/index';
$route['vi-tri-phong/them'] = 'ViTriPhong/add';
$route['vi-tri-phong/sua/(:any)'] = 'ViTriPhong/update/$1';
$route['vi-tri-phong/xoa/(:any)'] = 'ViTriPhong/delete/$1';

$route['nhan-vien'] = 'NhanVien/index';
$route['nhan-vien/them'] = 'NhanVien/add';
$route['nhan-vien/sua/(:any)'] = 'NhanVien/update/$1';
$route['nhan-vien/xoa/(:any)'] = 'NhanVien/delete/$1';

$route['hoa-don'] = 'HoaDon/index';
$route['hoa-don/them'] = 'HoaDon/add';
$route['hoa-don/them/(:any)/chi-tiet'] = 'HoaDon/addDetail/$1';
$route['hoa-don/xoa/(:any)'] = 'HoaDon/deleteDetail/$1';
$route['hoa-don/xem/(:any)'] = 'HoaDon/view/$1';
$route['hoa-don/thanh-toan/(:any)'] = 'HoaDon/pay/$1';


$route['ca-nhan'] = 'CaNhan/index/$1';