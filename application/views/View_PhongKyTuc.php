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
              <li class="breadcrumb-item active">Quản Lý Phòng Ký Túc</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Danh sách phòng ký túc</h3>
                <div class="card-tools">
                  <a href="<?php echo base_url('phong-ky-tuc/them/'); ?>" class="btn btn-primary">Thêm Phòng Mới</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>STT</th>
                      <th>Mã Phòng</th>
                      <th>Tên Phòng</th>
                      <th>Số Lượng</th>
                      <th>Vị Trí</th>
                      <th>Trạng Thái</th>
                      <th>Hành Động</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($list as $key => $value): ?>
                      <tr>
                        <td><?php echo $key + 1; ?></td>
                        <td><?php echo $value['MaPhong']; ?></td>
                        <td><?php echo $value['TenPhong']; ?></td>
                        <td>Tối đa <?php echo $value['SoLuong']; ?> người</td>
                        <td style="max-width: 200px;"><?php echo $value['ToaNha'] ." - ". $value['Tang'] ." - ". $value['CoSo']; ?></td>
                        <td>
                          <?php echo $value['TrangThai'] == 1 ? "Hoạt động" : "Sửa chữa"; ?>
                        </td>
                        <td>
                          <a href="<?php echo base_url('phong-ky-tuc/sua/'.$value['MaPhong'].'/'); ?>" class="btn btn-primary" style="color: white;">
                            <i class="fas fa-edit"></i>
                              <span>SỬA</span>
                            </a>
                            <a href="<?php echo base_url('phong-ky-tuc/xoa/'.$value['MaPhong'].'/'); ?>" class="btn btn-danger" style="color: white;">
                            <i class="fas fa-trash"></i>
                              <span>XÓA</span>
                            </a>
                        </td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<?php require(APPPATH.'views/layouts/footer.php'); ?>