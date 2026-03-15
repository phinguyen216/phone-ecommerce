<!-- Start main wrapper -->
<main class="main-wrapper">
  <div class="main-content">

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="mb-4">
      <ol class="breadcrumb">
        <li class="breadcrumb-item active fw-bold" aria-current="page">
          Danh sách loại sản phẩm
        </li>
      </ol>
    </nav>

    <!-- Nút thêm mới -->
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h4 class="fw-bold">Quản lý loại hàng</h4>

      <a href="index.php?act=adddm" class="btn btn-primary">
        <i class="bi bi-plus-lg"></i> Thêm loại hàng
      </a>
    </div>

    <!-- Table -->
    <div class="card shadow-sm border-0">
      <div class="card-body">

        <div class="table-responsive">
          <table class="table table-hover table-striped align-middle">
            <thead class="table-primary">
              <tr>
                <th width="60"></th>
                <th width="80">ID</th>
                <th class="w-50">Tên danh mục</th>
                <th width="150" class="text-center">Chức năng</th>
              </tr>
            </thead>

            <tbody>
              <?php foreach ($listdanhmuc as $dm) { 
                extract($dm);
                $suadm="index.php?act=suadm&id=".$id;
                $xoadm="index.php?act=xoadm&id=".$id;
              ?>

              <tr>
                <td>
                  <input type="checkbox" class="form-check-input" />
                </td>

                <td><span class="badge text-bg-secondary"><?= $id ?></span></td>

                <td><?= $name ?></td>

                <td class="text-center">
                  <a href="<?= $suadm ?>" class="btn btn-sm btn-outline-primary me-1">
                    <i class="bi bi-pencil-square"></i>
                  </a>

                  <a onclick="return confirm('Bạn có muốn xoá?')" 
                     href="<?= $xoadm ?>" 
                     class="btn btn-sm btn-outline-danger">
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
