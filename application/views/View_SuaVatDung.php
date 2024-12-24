<?php require(APPPATH.'views/layouts/header.php'); ?>

<div class="content-wrapper" style="min-height: 1203.31px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Quản Lý Vật Dụng Phòng</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Trang Chủ</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url('vat-dung-phong/'); ?>">Quản Lý Vật Dụng Phòng</a></li>
              <li class="breadcrumb-item active">Sửa Vật Dụng</li>
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
            <h3 class="card-title">Thông tin vật dụng phòng</h3>
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
                    <label for="ten">Mã Vật Dụng</label>
                    <input type="text" class="form-control" id="ten" placeholder="Mã vật dụng" name="mavatdung" value="<?php echo $detail['MaVatDung']; ?>" required>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">Tên Vật Dụng</label>
                    <input type="text" class="form-control" id="ten" placeholder="Tên vật dụng" name="tenvatdung" value="<?php echo $detail['TenVatDung']; ?>" required>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="sc">Số Lượng</label>
                    <div class="input-group">
                      <input type="number" class="form-control" id="sc" placeholder="Số lượng vật dụng" name="soluong" value="<?php echo $detail['SoLuong']; ?>" required>
                      <div class="input-group-append">
                        <span class="input-group-text">cái</span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Trạng Thái</label>
                    <select class="form-control" name="trangthai" required>
                      <?php if($detail['TrangThai'] == 1){ ?>
                        <option value="1" selected>Đang sử dụng</option>
                        <option value="2">Đang sửa chữa</option>
                      <?php }else{ ?>
                        <option value="1">Đang sử dụng</option>
                        <option value="2" selected>Đang sửa chữa</option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-12">
                <div class="form-group">
                  <label>Phòng Sở Hữu</label>
                  <div class="select2-purple">
                    <select class="select2" multiple="multiple" data-placeholder="Chọn tên phòng" data-dropdown-css-class="select2-purple" style="width: 100%;" name="phong[]" required>
                      <?php foreach ($phong as $key => $value): ?>
                        <?php if(count($this->Model_VatDung->get_phong($value['MaPhong'], $detail['MaVatDung'])) >= 1){ ?>
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
              <a class="btn btn-success" href="<?php echo base_url('vat-dung-phong/'); ?>">Quay Lại</a>
              <button class="btn btn-primary">Cập Nhật Vật Dụng</button>
            </form>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

<?php require(APPPATH.'views/layouts/footer.php'); ?>
<script src="<?php echo base_url('public/'); ?>plugins/select2/js/select2.full.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url('public/'); ?>plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="<?php echo base_url('public/'); ?>plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<script type="text/javascript">
  $(document).ready(function() {
    $('.select2').select2();
  });
</script>