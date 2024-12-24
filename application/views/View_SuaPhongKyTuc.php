<?php require(APPPATH.'views/layouts/header.php'); ?>
<div class="content-wrapper" style="min-height: 1203.31px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Quản Lý Phòng Ký Túc</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Trang Chủ</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url('phong-ky-tuc/'); ?>">Quản Lý Phòng Ký Túc</a></li>
              <li class="breadcrumb-item active">Sửa Phòng Ký Túc</li>
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
            <h3 class="card-title">Thông tin phòng ký túc</h3>
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
                    <label for="ten">Mã Phòng</label>
                    <input type="text" class="form-control" id="ten" placeholder="Mã phòng" name="maphong" value="<?php echo $detail['MaPhong']; ?>" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="ten">Tên Phòng</label>
                    <input type="text" class="form-control" id="ten" placeholder="Tên phòng" name="tenphong" value="<?php echo $detail['TenPhong']; ?>" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="sc">Số Lượng Người</label>
                    <div class="input-group">
                      <input type="number" class="form-control" id="sc" placeholder="Số lượng người tối đa" name="soluong" value="<?php echo $detail['SoLuong']; ?>" required>
                      <div class="input-group-append">
                        <span class="input-group-text">người tối đa</span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Vị Trí Phòng</label>
                    <select class="form-control" name="vitri" required>
                      <?php foreach ($vitri as $key => $value): ?>
                        <?php if($detail['MaViTri'] == $value['MaViTri']){ ?>
                          <option value="<?php echo $value['MaViTri']; ?>" selected><?php echo $value['ToaNha'].' - '. $value['Tang'].' - '.$value['CoSo']; ?></option>
                        <?php }else{ ?>
                          <option value="<?php echo $value['MaViTri']; ?>"><?php echo $value['ToaNha'].' - '. $value['Tang'].' - '.$value['CoSo']; ?></option>
                        <?php } ?>
                        
                      <?php endforeach ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Trạng Thái</label>
                    <select class="form-control" name="trangthai" required>
                      <?php if($detail['TrangThai'] == 1){ ?>
                        <option selected="selected" value="1">Hoạt động</option>
                        <option value="0">Sửa chữa</option>
                      <?php }else{ ?>
                        <option value="1">Hoạt động</option>
                        <option value="0" selected="selected">Sửa chữa</option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
              </div> 
              <a class="btn btn-success" href="<?php echo base_url('phong-ky-tuc/'); ?>">Quay Lại</a>
              <button class="btn btn-primary">Cập Nhật Phòng</button>
            </form>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
<?php require(APPPATH.'views/layouts/footer.php'); ?>
