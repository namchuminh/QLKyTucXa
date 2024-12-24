<?php require(APPPATH.'views/layouts/header.php'); ?>
<div class="content-wrapper" style="min-height: 1203.31px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Thống Kê</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Trang Chủ</a></li>
              <li class="breadcrumb-item active">Thống Kê</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $countPhong; ?></h3>
                <p>Phòng Ký Túc</p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-school"></i>
              </div>
              <a href="<?php echo base_url('phong-ky-tuc/'); ?>" class="small-box-footer">XEM TẤT CẢ <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $countSinhVien; ?></h3>
                <p>Sinh Viên</p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-graduation-cap"></i>
              </div>
              <a href="<?php echo base_url('sinh-vien/'); ?>" class="small-box-footer">XEM TẤT CẢ <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $countVatDung; ?></h3>
                <p>Vật Dụng Phòng</p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-tv"></i>
              </div>
              <a href="<?php echo base_url('vat-dung-phong/'); ?>" class="small-box-footer">XEM TẤT CẢ <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $countNhanVien; ?></h3>
                <p>Nhân Viên</p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-users"></i>
              </div>
              <a href="<?php echo base_url('nhan-vien/'); ?>" class="small-box-footer">XEM TẤT CẢ <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
<?php require(APPPATH.'views/layouts/footer.php'); ?>