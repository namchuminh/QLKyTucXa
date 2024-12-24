<?php require(APPPATH.'views/layouts/header.php'); ?>
<div class="content-wrapper" style="min-height: 1203.31px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Quản Lý Hóa Đơn</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('/'); ?>">Trang Chủ</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url('/hoa-don/'); ?>">Quản Lý Hóa Đơn</a></li>
              <li class="breadcrumb-item active">Tạo Hóa Đơn</li>

            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card card-default">
          <!-- /.card-header -->
          <div class="card-body">
            <form method="post" enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">Chọn Tên Mục</label>
                    <select class="form-control" name="tenmuc" id="tenmuc" required>
                      <option value="Khoản Thu Tiền Phòng">Khoản Thu Tiền Phòng</option>
                      <option value="Khoản Thu Tiền Điện">Khoản Thu Tiền Điện</option>
                      <option value="Khoản Thu Tiền Nước">Khoản Thu Tiền Nước</option>
                      <option value="Khoản Thu Tiền Mạng">Khoản Thu Tiền Mạng</option>
                      <option value="Khoản Thu Gửi Xe">Khoản Thu Gửi Xe</option>
                      <?php foreach ($objects as $key => $value): ?>
                        <option value="<?php echo $value['TenVatDung']; ?>"><?php echo $value['TenVatDung']; ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">Chi Phí</label>
                    <input type="number" min="1" class="form-control" placeholder="Chi phí / 1 số lượng" name="thanhtien">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">Số Lượng</label>
                    <input type="number" min="1" class="form-control" placeholder="Số lượng" name="soluong">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">Ghi Chú</label>
                    <textarea class="form-control" rows="4" placeholder="Nhập ghi chú" name="ghichu"></textarea>
                  </div>
                </div>
              </div> 
              <button class="btn btn-primary">Thêm Loại Mục</button>
            </form>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header text-right">
                <a href="<?php echo base_url('hoa-don/xem/'.$mahoadon.''); ?>" class="btn btn-primary">Xử Lý Hóa Đơn</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Tên Mục</th>
                      <th>Chi Phí</th>
                      <th>Số Lượng</th>
                      <th>Thành Tiền</th>
                      <th>Ghi Chú</th>
                      <th>Hành Động</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($list as $key => $value): ?>
                      <tr>
                        <td><?php echo $key + 1; ?></td>
                        <td><?php echo $value['TenMuc']; ?></td>
                        <td><?php echo number_format($value['ThanhTien']); ?> VNĐ</td>
                        <td>x<?php echo $value['SoLuong']; ?></td> 
                        <td><?php echo number_format($value['SoLuong'] * $value['ThanhTien']); ?> VNĐ</td>
                        <td><?php echo $value['GhiChu']; ?></td>
                        <td>
                            <a href="<?php echo base_url('hoa-don/xoa/'.$value['MaChiTietHoaDon'].'/?mahoadon='.$mahoadon); ?>" class="btn btn-danger" style="color: white;">
                            <i class="fas fa-trash"></i>
                              <span>XÓA</span>
                            </a>
                        </td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
                <?php if(count($list) <= 0){ ?>
                  <p class="text-center mt-4">Không có mục nào!</p>
                <?php } ?>
              </div>
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
