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
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Trang Chủ</a></li>
              <li class="breadcrumb-item active">Quản Lý Hóa Đơn</li>
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
                <h3 class="card-title">Danh sách hóa đơn</h3>
                 <div class="card-tools">
                  <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addInvoiceModal">Thêm Hóa Đơn</button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>STT</th>
                      <th>Mã Hóa Đơn</th>
                      <th>Tên Phòng</th>
                      <th>Tổng Tiền</th>
                      <th>Thanh Toán</th>
                      <th>Thời Gian Lập</th>
                      <th>Hành Động</th>
                    </tr>
                  </thead>
                  <tbody>
                  	<?php foreach ($list as $key => $value): ?>
	                    <tr>
	                      <td><?php echo $key + 1; ?></td>
	                      <td><?php echo $value['MaHoaDon']; ?></td>
	                      <td><?php echo $value['TenPhong']; ?></td>
	                      <td><?php echo number_format($value['TongTien']); ?> VNĐ</td>
                        <td>
                          <?php if($value['ThanhToan'] == 0){ ?>
                            Chưa Thanh Toán
                          <?php }else{ ?>
                            Đã Thanh Toán
                          <?php } ?>
                        </td>
                        <td>
                          <?php echo $value['NgayLap']; ?>
                        </td>
	                      <td>
	                      	<a href="<?php echo base_url('hoa-don/xem/'.$value['MaHoaDon'].'/'); ?>" class="btn btn-primary" style="color: white;">
	                      		<i class="fas fa-edit"></i>
                            	<span>XỬ LÝ HÓA ĐƠN</span>
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
<div class="modal fade" id="addInvoiceModal" tabindex="-1" aria-labelledby="addInvoiceModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addInvoiceModalLabel">Thêm Hóa Đơn</h5>
      </div>
      <div class="modal-body">
        <form id="addInvoiceForm" method="POST" action="<?php echo base_url('hoa-don/them/'); ?>">
          <div class="mb-3">
            <label for="roomSelect" class="form-label">Chọn Phòng</label>
            <select class="form-control" id="roomSelect" name="MaPhong" required>
              <option value="">-- Chọn phòng --</option>
              <!-- Thêm các option phòng từ database -->
              <?php foreach ($rooms as $room): ?>
                <option value="<?php echo $room['MaPhong']; ?>"><?php echo $room['TenPhong']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
        <button type="submit" form="addInvoiceForm" class="btn btn-primary">Tạo Hóa Đơn</button>
      </div>
    </div>
  </div>
</div>
<?php require(APPPATH.'views/layouts/footer.php'); ?>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
