<?php require(APPPATH.'views/layouts/header.php'); ?>
<link rel="stylesheet" href="<?php echo base_url('public/'); ?>plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="<?php echo base_url('public/'); ?>plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<div class="content-wrapper" style="min-height: 1203.31px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Quản Lý Nhân Viên</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Trang Chủ</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url('nhan-vien/'); ?>">Quản Lý Nhân Viên</a></li>
              <li class="breadcrumb-item active">Sửa Nhân Viên</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Thông tin nhân viên</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <form method="post">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">Mã Nhân Viên</label>
                    <input type="text" class="form-control" id="ten" placeholder="Mã nhân viên" name="manhanvien" value="<?php echo $detail[0]['MaNhanVien'] ?>" required>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">Tên Nhân Viên</label>
                    <input type="text" class="form-control" id="ten" placeholder="Tên nhân viên" name="tennhanvien" value="<?php echo $detail[0]['TenNhanVien'] ?>" required>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">Địa Chỉ</label>
                    <input type="text" class="form-control" id="ten" placeholder="Địa chỉ" name="diachi" value="<?php echo $detail[0]['DiaChi'] ?>" required>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">Số Điện Thoại</label>
                    <input type="number" class="form-control" id="ten" placeholder="Số điện thoại" name="sodienthoai" value="<?php echo $detail[0]['SoDienThoai'] ?>" required>
                  </div>
                </div> 
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Chức Vụ</label>
                    <select class="form-control" name="chucvu" required>
                      <?php if($detail[0]['ChucVu'] == 1){ ?>
                        <option value="1" selected>Bảo vệ</option>
                        <option value="2">Giảng viên</option>
                        <option value="3">Nhân viên</option>
                      <?php }else if($detail[0]['ChucVu'] == 2){ ?>
                        <option value="1">Bảo vệ</option>
                        <option value="2" selected>Giảng viên</option>
                        <option value="3">Nhân viên</option>
                      <?php }else{ ?>
                        <option value="1">Bảo vệ</option>
                        <option value="2">Giảng viên</option>
                        <option value="3" selected>Nhân viên</option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-12">
                <div class="form-group">
                  <label>Phòng Quản Lý</label>
                  <div class="select2-purple">
                    <select class="select2" multiple="multiple" data-placeholder="Chọn tên phòng" data-dropdown-css-class="select2-purple" style="width: 100%;" name="phong[]" required>
                      <?php foreach ($phong as $key => $value): ?>
                        <?php if(count($this->Model_NhanVien->getNhanVienPhongById($detail[0]['MaNhanVien'],$value['MaPhong'])) >= 1){ ?>
                          <option value="<?php echo $value['MaPhong']; ?>" selected><?php echo $value['TenPhong']; ?></option>
                        <?php }else{ ?>
                          <option value="<?php echo $value['MaPhong']; ?>"><?php echo $value['TenPhong']; ?></option>
                        <?php } ?>
                      <?php endforeach ?>
                    </select>
                  </div>
                </div>
                <!-- /.form-group -->
              </div>
              </div> 
              <a class="btn btn-success" href="<?php echo base_url('nhan-vien/'); ?>">Quay Lại</a>
              <button class="btn btn-primary">Cập Nhật Nhân Viên</button>
            </form>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

<?php require(APPPATH.'views/layouts/footer.php'); ?>
<script src="<?php echo base_url('public/'); ?>plugins/select2/js/select2.full.min.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
    $('.select2').select2();
  });
</script>