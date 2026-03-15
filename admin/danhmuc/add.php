<!-- Start main wrapper -->
<main class="main-wrapper">
  <div class="main-content">

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="mb-4">
      <ol class="breadcrumb">
        <li class="breadcrumb-item active fw-bold" aria-current="page">
          Thêm mới loại hàng
        </li>
      </ol>
    </nav>

    <!-- Nút danh sách -->
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h4 class="fw-bold mb-0">Thêm mới danh mục</h4>

      <a href="index.php?act=listdm" class="btn btn-secondary">
        <i class="bi bi-list-ul"></i> Danh sách loại hàng
      </a>
    </div>

    <!-- Form thêm -->
    <div class="card shadow-sm border-0">
      <div class="card-body">

        <!-- GIỮ NGUYÊN LOGIC -->
        <form action="index.php?act=adddm" method="post">

          <!-- Mã loại hàng (disabled) -->
          <div class="mb-3">
            <label class="form-label fw-semibold">Mã loại hàng</label>
            <input type="text" class="form-control" disabled placeholder="Auto">
          </div>

          <!-- Danh mục loại hàng -->
          <div class="mb-3">
            <label class="form-label fw-semibold">Danh mục loại hàng</label>
            <input 
              type="text" 
              name="name" 
              class="form-control" 
              placeholder="Nhập tên danh mục..." 
              required
            >
          </div>

          <!-- Buttons -->
          <div class="mt-4 d-flex gap-2">
            <input 
              type="submit" 
              value="Lưu lại" 
              name="luulai" 
              class="btn btn-success px-4"
            >

            <input 
              type="reset" 
              value="Hủy bỏ" 
              class="btn btn-outline-danger px-4"
            >
          </div>

          <!-- Thông báo -->
          <div class="mt-3 text-danger fw-semibold">
            <?php
              if(isset($thongbao) && ($thongbao!="")) echo $thongbao;
            ?>
          </div>

        </form>

      </div>
    </div>

  </div>
</main>
<!-- End main wrapper -->
