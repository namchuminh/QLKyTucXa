<?php require(APPPATH.'views/layouts/header.php'); ?>
<div class="content-wrapper" style="min-height: 1203.31px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Thông Tin Cá Nhân</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Trang Chủ</a></li>
              <li class="breadcrumb-item active">Thông Tin Cá Nhân</li>
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
            <h3 class="card-title">Thông tin cá nhân</h3>
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
                    <label for="ten">Họ Tên</label>
                    <input type="text" class="form-control" id="ten" placeholder="Họ tên" name="hoten" value="<?php echo $detail[0]['HoTen']; ?>" required>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">Tài Khoản</label>
                    <input type="text" class="form-control" id="ten" placeholder="Tài khoản" name="taikhoan" value="<?php echo $detail[0]['TaiKhoan']; ?>" required>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">Mật Khẩu Mới</label>
                    <input type="password" class="form-control" id="ten" placeholder="Mật khẩu mới" name="matkhau">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">Nhập Lại Mật Khẩu</label>
                    <input type="password" class="form-control" id="ten" placeholder="Nhập lại mật khẩu" name="matkhau2">
                  </div>
                </div>
              </div> 
              <a class="btn btn-success" href="<?php echo base_url(); ?>">Quay Lại</a>
              <button class="btn btn-primary">Cập Nhật Cá Nhân</button>
            </form>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

<?php require(APPPATH.'views/layouts/footer.php'); ?>
