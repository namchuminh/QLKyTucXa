<?php require(APPPATH.'views/layouts/header.php'); ?>
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
              <li class="breadcrumb-item active">Quản Lý Nhân Viên</li>
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
                <h3 class="card-title">Danh sách nhân viên</h3>
                 <div class="card-tools">
                  <a href="<?php echo base_url('nhan-vien/them/'); ?>" class="btn btn-primary">Thêm Nhân Viên</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>STT</th>
                      <th>Mã Nhân Viên</th>
                      <th>Tên Nhân Viên</th>
                      <th>Địa Chỉ</th>
                      <th>Số Điện Thoại</th>
                      <th>Chức Vụ</th>
                      <th>Hành Động</th>
                    </tr>
                  </thead>
                  <tbody>
                  	<?php foreach ($list as $key => $value): ?>
	                    <tr>
	                      <td><?php echo $key + 1; ?></td>
	                      <td><?php echo $value['MaNhanVien']; ?></td>
	                      <td><?php echo $value['TenNhanVien']; ?></td>
	                      <td style="max-width: 300px;"><?php echo $value['DiaChi']; ?></td>
                        <td><?php echo $value['SoDienThoai']; ?></td>
                        <td>
                          <?php if($value['ChucVu'] == 1){ ?>
                            Bảo vệ
                          <?php }else if($value['ChucVu'] == 2){ ?>
                            Giảng viên
                          <?php }else{ ?>
                            Nhân viên
                          <?php } ?>
                        </td>
	                      <td>
	                      	<a href="<?php echo base_url('nhan-vien/sua/'.$value['MaNhanVien'].'/'); ?>" class="btn btn-primary" style="color: white;">
	                      		<i class="fas fa-edit"></i>
                            	<span>SỬA</span>
                           	</a>
                           	<a href="<?php echo base_url('nhan-vien/xoa/'.$value['MaNhanVien'].'/'); ?>" class="btn btn-danger" style="color: white;">
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
