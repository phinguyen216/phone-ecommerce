    <!-- Start main wrapper -->
    <main class="main-wrapper">
      <div class="main-content">
        <!-- start breadcrumb -->
        <div class="page-breadcrumb">
          <div class="breadcrumb-title">Danh sách tài khoản</div>
        </div>
        <!-- end breadcrumb -->
          <div class="col-auto">
            <div class="btn-ds">
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <div class="product-table">
              <form action="" method="post">
                <div class="table-responsive">
                  <table class="table">
                    <thead class="table-light">
                      <tr>
                        <th></th>
                        <th>ID</th>
                        <th>Tên tài khoản</th>
                        <th>Mật Khẩu</th>
                        <th>Email</th>
                        <th>Địa chỉ</th>
                        <th>Chức năng</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($listtk as $tk) { 
                        extract($tk);
                        $suatk="index.php?act=suatk&id=".$id;
                        $xoatk="index.php?act=xoatk&id=".$id;
                      echo '
                          <tr>
                        <td>
                          <input type="checkbox" class="form-check-input" />
                        </td>
                        <td>'.$id.'</td>
                        <td>'.$username.'</td>
                        <td>'.$password.'</td>
                        <td>'.$email.'</td>
                        <td>'.$address.'</td>
                        <td>
                          <a href="'.$suatk.'" class="sua">
                            <i class="bi bi-pencil-square"></i>
                          </a>
                          <a onclick="return confirm(\'Bạn có muốn xóa?\')" href="'.$xoatk.'" class="xoa">
                            <i class="bi bi-trash"></i>
                          </a>
                        </td>
                      </tr>
                      ';
                      
                    }?>
                    </tbody>
                  </table>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </main>
    <!-- End main wrapper -->