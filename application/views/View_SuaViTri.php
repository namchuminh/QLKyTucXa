<?php require(APPPATH.'views/layouts/header.php'); ?>
<div class="content-wrapper" style="min-height: 1203.31px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Quản Lý Vị Trí Phòng</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Trang Chủ</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url('vi-tri-phong/'); ?>">Quản Lý Vị Trí Phòng</a></li>
              <li class="breadcrumb-item active">Sửa Vị Trí Phòng</li>
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
            <h3 class="card-title">Thông tin vị trí phòng</h3>
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
                    <label for="ten">Mã Vị Trí Phòng</label>
                    <input type="text" class="form-control" id="ten" placeholder="Mã vị trí phòng" name="mavitriphong" value="<?php echo $detail[0]['MaViTri']; ?>" required>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">Tòa Nhà</label>
                    <input type="text" class="form-control" id="ten" placeholder="Tòa nhà" name="toanha" value="<?php echo $detail[0]['ToaNha']; ?>" required>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">Tầng</label>
                    <input type="text" class="form-control" id="ten" placeholder="Tầng" name="tang" value="<?php echo $detail[0]['Tang']; ?>" required>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">Cơ Sở</label>
                    <input type="text" class="form-control" id="ten" placeholder="Cơ sở" name="coso" value="<?php echo $detail[0]['CoSo']; ?>" required>
                  </div>
                </div>
              </div> 
              <a class="btn btn-success" href="<?php echo base_url('vi-tri-phong/'); ?>">Quay Lại</a>
              <button class="btn btn-primary">Cập Nhật Vị Trí</button>
            </form>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

<?php require(APPPATH.'views/layouts/footer.php'); ?>
