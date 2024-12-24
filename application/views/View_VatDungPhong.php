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
              <li class="breadcrumb-item active">Quản Lý Vật Dụng Phòng</li>
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
                <h3 class="card-title">Danh sách vật dụng phòng</h3>
                <div class="card-tools">
                  <a href="<?php echo base_url('vat-dung-phong/them/'); ?>" class="btn btn-primary">Thêm Vật Dụng Mới</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>STT</th>
                      <th>Mã Vật Dụng</th>
                      <th>Tên Vật Dụng</th>
                      <th>Số Lượng</th>
                      <th>Trạng Thái</th>
                      <th>Hành Động</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($list as $key => $value): ?>
                      <tr>
                        <td><?php echo $key + 1; ?></td>
                        <td><?php echo $value['MaVatDung']; ?></td>
                        <td><?php echo $value['TenVatDung']; ?></td>
                        <td><?php echo $value['SoLuong']; ?> cái</td>
                        <td><?php echo $value['TrangThai'] == 1 ? "Đang sử dụng" : "Đang sửa chữa"; ?></td>
                        <td>
                          <a href="<?php echo base_url('vat-dung-phong/sua/'.$value['MaVatDung'].'/'); ?>" class="btn btn-primary" style="color: white;">
                            <i class="fas fa-edit"></i>
                              <span>SỬA</span>
                            </a>
                            <a href="<?php echo base_url('vat-dung-phong/xoa/'.$value['MaVatDung'].'/'); ?>" class="btn btn-danger" style="color: white;">
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