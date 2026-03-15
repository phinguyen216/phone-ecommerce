<!-- Start main wrapper -->
<main class="main-wrapper">
  <div class="main-content">

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="mb-4">
      <ol class="breadcrumb">
        <li class="breadcrumb-item active fw-bold" aria-current="page">
          Thêm mới sản phẩm
        </li>
      </ol>
    </nav>

    <!-- Nút danh sách -->
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h4 class="fw-bold mb-0">Thêm mới sản phẩm</h4>

      <a href="index.php?act=listsp" class="btn btn-secondary">
        <i class="bi bi-list-ul"></i> Danh sách sản phẩm
      </a>
    </div>

    <!-- Form card -->
    <div class="card shadow-sm border-0">
      <div class="card-body">

        <!-- === GIỮ NGUYÊN LOGIC CODE === -->
        <form action="index.php?act=addsp" method="post" enctype="multipart/form-data">

          <!-- Danh mục -->
          <div class="mb-3">
            <label class="form-label fw-semibold">Danh mục sản phẩm</label>
            <select name="iddm" class="form-select" required>
              <option value="" disabled selected>Chọn danh mục</option>
              <?php 
                foreach ($listdanhmuc as $danhmuc) {
                  extract($danhmuc);
                  echo '<option value="'.$id.'">'.$name.'</option>';
                }
              ?>
            </select>
          </div>

          <!-- Tên sản phẩm -->
          <div class="mb-3">
            <label class="form-label fw-semibold">Tên sản phẩm</label>
            <input 
              type="text" 
              name="name" 
              class="form-control"
              placeholder="Nhập tên sản phẩm..."
              required
            >
          </div>

          <!-- Mô tả -->
          <div class="mb-3">
            <label class="form-label fw-semibold">Mô tả</label>
            <textarea
              class="form-control"
              rows="5"
              name="mota"
              placeholder="Nhập mô tả sản phẩm..."
              required
            ></textarea>
          </div>

          <!-- Ảnh -->
          <div class="mb-3">
            <label class="form-label fw-semibold">Ảnh sản phẩm</label>
            <input 
              type="file" 
              name="img" 
              class="form-control" 
              accept="image/*" 
              required
            >
          </div>

          <!-- Giá -->
          <div class="mb-3">
            <label class="form-label fw-semibold">Giá</label>
            <input 
              type="number" 
              name="price" 
              class="form-control"
              placeholder="Nhập giá..."
              min="0"
              step="0.01"
              required
            >
          </div>

          <!-- Tồn kho -->
          <div class="mb-3">
            <label class="form-label fw-semibold">Tồn kho</label>
            <input 
              type="number" 
              name="stock" 
              class="form-control"
              placeholder="Nhập số lượng tồn..."
              min="0"
              required
            >
          </div>

          <!-- Nút -->
          <div class="mt-4 d-flex gap-2">
            <input 
              type="submit" 
              name="luulai" 
              value="Lưu lại" 
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
              if (isset($thongbao) && $thongbao != "") echo $thongbao;
            ?>
          </div>

        </form>
      </div>
    </div>

  </div>
</main>
<!-- End main wrapper -->
