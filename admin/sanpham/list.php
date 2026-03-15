<!-- Start main wrapper -->
<main class="main-wrapper">
  <div class="main-content">

    <!-- Breadcrumb -->
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h4 class="fw-bold mb-0">Sản phẩm</h4>
    </div>

    <!-- Bộ lọc -->
    <div class="card mb-4">
      <div class="card-body d-flex flex-wrap gap-3 align-items-center">

        <!-- Ô tìm kiếm -->
        <div class="flex-grow-1 position-relative">
          <input type="search" class="form-control ps-5" placeholder="Nhập sản phẩm cần tìm...">
          <i class="bi bi-search position-absolute top-50 start-0 translate-middle-y ms-3 text-secondary"></i>
        </div>

        <!-- Select danh mục -->
        <select class="form-select w-auto">
          <option value="0" selected>Tất cả</option>
          <option value="1">iPhone</option>
          <option value="2">Samsung</option>
          <option value="3">Huawei</option>
          <option value="4">Xiaomi</option>
        </select>

        <!-- Nút thêm -->
        <a href="index.php?act=addsp" class="btn btn-primary d-flex align-items-center gap-2">
          <i class="bi bi-plus-lg"></i> Thêm sản phẩm
        </a>

      </div>
    </div>

    <!-- Bảng sản phẩm -->
    <div class="card">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-hover align-middle">
            <thead class="table-light">
              <tr>
                <th>Tên sản phẩm</th>
                <th>Ảnh</th>
                <th>Giá</th>
                <th>Tồn kho</th>
                <th>Chức năng</th>
              </tr>
            </thead>

            <tbody>
              <?php 
              foreach ($listsanpham as $sp) {
                extract($sp);
                $suasp = "index.php?act=suasp&id=".$id;
                $xoasp = "index.php?act=xoasp&id=".$id;
              ?>
              <tr>
                <td class="fw-semibold"><?= $name ?></td>

                <td>
                  <img src="../view/images/<?= $img ?>" class="img-thumbnail" style="width: 120px;">
                </td>

                <td class="text-danger fw-bold"><?= $price ?><u>đ</u></td>

                <td><?= $stock ?></td>

                <td>
                  <a href="<?= $suasp ?>" class="btn btn-sm btn-warning me-2">
                    <i class="bi bi-pencil-square"></i>
                  </a>

                  <a href="<?= $xoasp ?>" 
                     onclick="return confirm('Bạn có muốn xoá không?')" 
                     class="btn btn-sm btn-danger">
                    <i class="bi bi-trash"></i>
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
</main>
<!-- End main wrapper -->
