<?php
// Lấy dữ liệu từ model
$listsanpham = loadAll_sanpham();
$listdanhmuc = loadAll_danhmuc();
$listtaikhoan = loadall_taikhoan();
$listdonhang = load_all_orders();

// Tính tổng số
$tong_san_pham   = count($listsanpham);
$tong_danh_muc   = count($listdanhmuc);
$tong_tai_khoan  = count($listtaikhoan);
$tong_don_hang   = count($listdonhang);
?>

<div class="container-fluid py-3">

  <!-- TITLE -->
  <h3 class="fw-bold mb-3">Trang tổng quan</h3>

  <!-- DASHBOARD BOX -->
  <div class="row g-3">

    <!-- Tổng sản phẩm -->
    <div class="col-md-3">
      <div class="card shadow-sm border-0 rounded-3">
        <div class="card-body d-flex align-items-center">
          <div class="p-3 bg-primary text-white rounded-3 me-3">
            <i class="bi bi-box-seam fs-3"></i>
          </div>
          <div>
            <div class="text-muted small">Tổng sản phẩm</div>
            <h4 class="fw-bold"><?= $tong_san_pham ?></h4>
          </div>
        </div>
      </div>
    </div>

    <!-- Tổng danh mục -->
    <div class="col-md-3">
      <div class="card shadow-sm border-0 rounded-3">
        <div class="card-body d-flex align-items-center">
          <div class="p-3 bg-warning text-white rounded-3 me-3">
            <i class="bi bi-tags fs-3"></i>
          </div>
          <div>
            <div class="text-muted small">Tổng danh mục</div>
            <h4 class="fw-bold"><?= $tong_danh_muc ?></h4>
          </div>
        </div>
      </div>
    </div>

    <!-- Tổng tài khoản -->
    <div class="col-md-3">
      <div class="card shadow-sm border-0 rounded-3">
        <div class="card-body d-flex align-items-center">
          <div class="p-3 bg-success text-white rounded-3 me-3">
            <i class="bi bi-people fs-3"></i>
          </div>
          <div>
            <div class="text-muted small">Tổng tài khoản</div>
            <h4 class="fw-bold"><?= $tong_tai_khoan ?></h4>
          </div>
        </div>
      </div>
    </div>

    <!-- Tổng đơn hàng -->
    <div class="col-md-3">
      <div class="card shadow-sm border-0 rounded-3">
        <div class="card-body d-flex align-items-center">
          <div class="p-3 bg-danger text-white rounded-3 me-3">
            <i class="bi bi-receipt fs-3"></i>
          </div>
          <div>
            <div class="text-muted small">Tổng đơn hàng</div>
            <h4 class="fw-bold"><?= $tong_don_hang ?></h4>
          </div>
        </div>
      </div>
    </div>

  </div>
<div class="card mb-4 shadow-sm border-0">
      <div class="card-body">
        <h5 class="fw-bold mb-3">Thống kê doanh thu</h5>
        <canvas id="chartDoanhThu" height="120"></canvas>
      </div>
    </div>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx = document.getElementById('chartDoanhThu');
  new Chart(ctx, {
    type: 'line',
    data: {
      labels: ['T2','T3','T4','T5','T6','T7','CN'],
      datasets: [{
        label: 'Doanh thu (VNĐ)',
        data: [0, 0, 0, 0, 0, 0, 0],
        borderWidth: 2
      }]
    }
  });
</script>
  <!-- Sản phẩm mới -->
  <div class="card shadow-sm border-0 rounded-3 mt-4">
    <div class="card-header bg-white border-0">
      <h5 class="fw-bold m-0">Chi tiết các sản phẩm</h5>
    </div>

    <div class="card-body">
      <div class="table-responsive">
        <table class="table align-middle">
          <thead class="table-light">
            <tr>
              <th>Tên sản phẩm</th>
              <th>Ảnh</th>
              <th>Giá</th>
              <th>Tồn kho</th>
              <th>Thao tác</th>
            </tr>
          </thead>

          <tbody>
            <?php foreach ($listsanpham as $sp) { extract($sp); ?>
            <tr>
              <td><?= $name ?></td>
              <td><img src="../upload/<?= $img ?>" width="60" class="rounded"></td>
              <td><?= number_format($price) ?> đ</td>
              <td><?= $stock ?></td>
              <td>
                <a href="index.php?act=suasp&id=<?= $id ?>" class="btn btn-sm btn-outline-primary">
                  <i class="bi bi-pencil-square"></i>
                </a>
              </td>
            </tr>
            <?php } ?>
          </tbody>

        </table>
      </div>
    </div>
  </div>

</div>
