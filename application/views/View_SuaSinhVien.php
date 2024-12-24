<?php require(APPPATH.'views/layouts/header.php'); ?>
<div class="content-wrapper" style="min-height: 1203.31px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Quản Lý Sinh Viên</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Trang Chủ</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url('sinh-vien/'); ?>">Quản Lý Sinh Viên</a></li>
              <li class="breadcrumb-item active">Sửa Sinh Viên</li>
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
            <h3 class="card-title">Thông tin sinh viên</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <form method="post">
              <div class="row">
              	<div class="col-md-6">
                  <div class="form-group">
                    <label for="ten">Mã Sinh Viên</label>
                    <input type="text" class="form-control" id="ten" placeholder="Mã sinh viên" name="masinhvien" value="<?php echo $detail['MaSinhVien']; ?>" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="ten">Số CCCD</label>
                    <input type="number" class="form-control" id="ten" placeholder="Số căn cước công dân" name="socccd" value="<?php echo $detail['SoCCCD']; ?>" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="ten">Tên Sinh Viên</label>
                    <input type="text" class="form-control" id="ten" placeholder="Tên sinh viên" name="tensinhvien" value="<?php echo $detail['TenSinhVien']; ?>" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="ten">Ngày Sinh</label>
                    <input type="date" class="form-control" id="ten" placeholder="Ngày sinh" name="ngaysinh" value="<?php echo $detail['NgaySinh']; ?>" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Giới Tính</label>
                    <select class="form-control" name="gioitinh" required>
                      <?php if($detail['GioiTinh'] == 1){ ?>
                        <option selected="selected" value="1">Nam</option>
                        <option value="0">Nữ</option>
                      <?php }else{ ?>
                        <option value="1">Nam</option>
                        <option value="0" selected="selected">Nữ</option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="ten">Số Điện Thoại</label>
                    <input type="number" class="form-control" id="ten" placeholder="Số điện thoại" name="sodienthoai" value="<?php echo $detail['SoDienThoai']; ?>" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="ten">Khoa / Ngành Học</label>
                    <input type="text" class="form-control" id="ten" placeholder="Chuyên ngành học" name="khoa" value="<?php echo $detail['Khoa']; ?>" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Chọn Phòng Ký Túc</label>
                    <select class="form-control" name="maphong" required>
                      <?php foreach ($phong as $key => $value): ?>
                        <option value="<?php echo $value['MaPhong']; ?>"><?php echo $value['TenPhong']; ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Trạng Thái</label>
                    <select class="form-control" name="trangthai" required>
                      <?php if($detail['TrangThai'] == 1){ ?>
                        <option selected="selected" value="1">Đang học tập</option>
                        <option value="0">Đã ra trường</option>
                      <?php }else{ ?>
                        <option value="1">Đang học tập</option>
                        <option value="0" selected="selected">Đã ra trường</option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
              </div> 
              <a class="btn btn-success" href="<?php echo base_url('sinh-vien/'); ?>">Quay Lại</a>
              <button class="btn btn-primary">Cập Nhật Sinh Viên</button>
            </form>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
<?php require(APPPATH.'views/layouts/footer.php'); ?>
