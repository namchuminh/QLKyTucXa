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
              <li class="breadcrumb-item active">Quản Lý Sinh Viên</li>
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
                <h3 class="card-title">Danh sách sinh viên</h3>
                <div class="card-tools">
                  <a href="<?php echo base_url('sinh-vien/them/'); ?>" class="btn btn-primary">Thêm Sinh Viên</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>STT</th>
                      <th>Mã Sinh Viên</th>
                      <th>Số CCCD</th>
                      <th>Tên Sinh Viên</th>
                      <th>Ngày Sinh</th>
                      <th>Giới Tính</th>
                      <th>Số Điện Thoại</th>
                      <th>Ngành Học</th>
                      <th>Thuộc Phòng</th>
                      <th>Trạng Thái</th>
                      <th>Hành Động</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($list as $key => $value): ?>
                      <tr>
                        <td><?php echo $key + 1; ?></td>
                        <td><?php echo $value['MaSinhVien']; ?></td>
                        <td><?php echo $value['SoCCCD']; ?></td>
                        <td><?php echo $value['TenSinhVien']; ?></td>
                        <td><?php echo date("d/m/Y", strtotime($value['NgaySinh'])); ?></td>
                        <td><?php echo $value['GioiTinh'] == 1 ? "Nam" : "Nữ"; ?></td>
                        <td><?php echo $value['SoDienThoai']; ?></td>
                        <td><?php echo $value['Khoa']; ?></td>
                        <td><?php echo $value['TenPhong']; ?></td>
                        <td><?php echo $value['TrangThai'] == 1 ? "Đang học tập" : "Đã ra trường"; ?></td>
                        <td>
                          <a href="<?php echo base_url('sinh-vien/sua/'.$value['MaSinhVien'].'/'); ?>" class="btn btn-primary" style="color: white;">
                            <i class="fas fa-edit"></i>
                              <span>SỬA</span>
                            </a>
                            <a href="<?php echo base_url('sinh-vien/xoa/'.$value['MaSinhVien'].'/'); ?>" class="btn btn-danger" style="color: white;">
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