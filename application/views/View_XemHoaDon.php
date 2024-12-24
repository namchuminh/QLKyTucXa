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
              <li class="breadcrumb-item active">Hóa Đơn <?php echo $detail[0]['MaHoaDon']; ?></li>
            </ol>
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
              <h4 class="text-center mt-3">Thông Tin Hóa Đơn</h4>
              <div style="line-height: 20px;word-spacing: 2px;" class="m-3 detail-order">
                  <span style="display: flex;">
                      <b>Mã Hóa Đơn: </b>
                      <p style="margin-left: 10px;"><?php echo $detail[0]['MaHoaDon'] ?></p>
                  </span>
                  <span style="display: flex;">
                      <b>Tên Phòng: </b>
                      <p style="margin-left: 10px;"><?php echo $detail[0]['TenPhong'] ?></p>
                  </span>
                  <span style="display: flex;">
                      <b>Ngày Lập: </b>
                      <p style="margin-left: 10px;"><?php echo $detail[0]['NgayLap'] ?></p>
                  </span>
                  <span style="display: flex;">
                      <b>Thanh Toán: </b>
                      <p style="margin-left: 10px;"><?php echo $detail[0]['ThanhToan'] == 1 ? "Đã thanh Toán" : "Chưa Thanh Toán"; ?> </p>
                  </span>
              </div>
              <!-- /.card-header -->
              <?php if($detail[0]['ThanhToan'] == 0){ ?>
                <div class="card-header text-right">
                    <a href="<?php echo base_url('hoa-don/them/'.$detail[0]['MaHoaDon'].'/chi-tiet'); ?>" class="btn btn-primary not_print">Thêm Loại Mục</a>
                </div>
              <?php } ?>
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
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
                <?php if(count($list) <= 0){ ?>
                  <p class="text-center mt-4">Không có mục nào!</p>
                <?php } ?>
                <div class="text-right mt-2 d-flex justify-content-end mr-4">
                  <span class="d-flex m-1">
                      <b>Tổng Tiền: </b>
                      <p style="margin-left: 5px;"><?php echo number_format($detail[0]['TongTien']) ?> VND</p>
                  </span>
                </div>
              </div>
              <div class="card-footer clearfix" style="background: white;">
                <a class="btn btn-success not_print" href="<?php echo base_url('hoa-don/'); ?>">Quay Lại</a>
                <button class="btn btn-primary not_print" onclick="window.print()">In Hóa Đơn</button>
                <?php if(($detail[0]['ThanhToan'] == 0)){ ?>
                  <a class="btn btn-warning not_print" href="<?php echo base_url('hoa-don/thanh-toan/'.$detail[0]['MaHoaDon']); ?>"  style="color: white;">Xác Nhận Thanh Toán</a>
                <?php } ?>
              </div>
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
</div>
<?php require(APPPATH.'views/layouts/footer.php'); ?>

<style type="text/css">
  @media print{
    .main-footer{
      display: none !important;
    }

    .content-wrapper{
      background-color: white;
    }

    .not_print{
      display: none !important;
    }

  }
</style>