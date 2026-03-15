<?php
  include './component/header.php';
  include '../model/sanpham.php';
  include '../model/danhmuc.php';
  include '../model/pdo.php';
  include '../model/bill.php';
  include '../model/taikhoan.php';
  include '../model/bill_detail.php';
?>

<!-- WRAPPER CHÍNH -->
<div class="d-flex">
  
  <?php include './component/siderbar.php'; ?>
  
  <!-- MAIN CONTENT - NƠI HIỂN THỊ NỘI DUNG ĐỘNG -->
  <main class="content">
    <?php
    // controller
    if(isset($_GET['act'])){
      $act = $_GET['act'];
      switch ($act) {
        // danh mục
        case 'adddm':
          if(isset($_POST['luulai'])&&$_POST['luulai']){
            $name = $_POST['name'];
            insert_danhmuc($name);
            $thongbao= "Thêm mới thành công!";
          }
          include './danhmuc/add.php';
          break;
        case 'listdm':
          $listdanhmuc = loadAll_danhmuc();
          include './danhmuc/list.php';
          break;
        case 'xoadm':
          if(isset($_GET['id'])&&$_GET['id']>0){
            delete_danhmuc($_GET['id']);
          }
          $listdanhmuc = loadAll_danhmuc();
          include './danhmuc/list.php';
          break;  
        case 'suadm':
          if(isset($_GET['id'])&&$_GET['id']>0){
            $dm = loadOne_danhmuc($_GET['id']);
          }
          include './danhmuc/update.php';
          break;
        case 'updatedm':
          if(isset($_POST['luulai'])&&$_POST['luulai']){
            $id = $_POST['id'];
            $name = $_POST['name'];
            update_danhmuc($id,$name);
            $thongbao= "Cập nhật thành công!";
          }
          $listdanhmuc = loadAll_danhmuc();
          include './danhmuc/list.php';
          break;
        //Sản phẩm
        case 'addsp':
          if(isset($_POST['luulai'])&&$_POST['luulai']){
            $name =$_POST['name'];
            $mota =$_POST['mota'];
            $target_dir = '../upload/';
            $img=$_FILES['img']['name'];
            $target_file = $target_dir . basename( $_FILES["img"]["name"]);
            if(move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)){
              // echo 'upload thành công';
            }else{
              // echo 'Không upload được';
            }
            $price =$_POST['price'];
            $stock =$_POST['stock'];
            $iddm =$_POST['iddm'];
            insert_sanpham($name,$mota,$img,$price,$stock,$iddm);
            $thongbao= "Thêm mới thành công!";
          }
          $listdanhmuc = loadAll_danhmuc();
          include './sanpham/add.php';
          break;
        case 'listsp':
          $listdanhmuc = loadAll_danhmuc();
          $listsanpham = loadAll_sanpham();
          include './sanpham/list.php';
          break;
        case 'suasp':
          if(isset($_GET['id'])&&$_GET['id']>0){
            $sp = loadOne_sanpham($_GET['id']);
          }
          $listdanhmuc = loadAll_danhmuc();
          include './sanpham/update.php';
          break;
        case 'xoasp':
          if(isset($_GET['id'])&&$_GET['id']>0){
            delete_sanpham($_GET['id']);
          }
          $listdanhmuc = loadAll_danhmuc();
          $listsanpham = loadAll_sanpham();
          include './sanpham/list.php';
          break;
        case 'updatesp':
          if(isset($_POST['luulai'])&&$_POST['luulai']){
            $id =$_POST['id'];
            $name =$_POST['name'];
            $mota =$_POST['mota'];
            $target_dir = '../upload/';
            $img=$_FILES['img']['name'];
            $target_file = $target_dir . basename( $_FILES["img"]["name"]);
            if(move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)){
              // echo 'upload thành công';
            }else{
              // echo 'Không upload được';
            }
            $price =$_POST['price'];
            $stock =$_POST['stock'];
            $iddm =$_POST['iddm'];
            update_sanpham($id,$name,$mota,$img,$price,$stock,$iddm);
            $thongbao= "Cập nhật thành công!";
          }
          $listdanhmuc = loadAll_danhmuc();
          $listsanpham = loadAll_sanpham();
          include './sanpham/list.php';
          break;
        //Giỏ hàng  
        case 'khachhang':
          $listtk = loadall_taikhoan();
          include './khachhang/list.php';
          break;
        case 'listdh':
          $orders = load_all_orders();  
          include './donhang/list.php'; 
          break;

        case 'xoatk':
          if(isset($_GET['id'])&&$_GET['id']>0){
            delete_taikhoan($_GET['id']);
          }
          $listtk = loadall_taikhoan();
          include './khachhang/list.php';
          break;
          case 'logout':
    session_start();
    session_unset();
    session_destroy();

    header("Location: ../index.php");
    exit();

        case 'chitietdh':
          if (isset($_GET['id']) && $_GET['id'] > 0) {
              $suabill = loadOne_bill($_GET['id']);
          }
      
          if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['trangthai'])) {
              $id = $_GET['id'];
              $new_status = $_POST['trangthai'];
              if ($suabill) {
                  $current_status = $suabill['trangthai'];
                  // Chỉ cho phép cập nhật đến trạng thái cao hơn hoặc chuyển sang trạng thái hủy đơn
                  if ($new_status > $current_status || $new_status == 4) {
                      update_bill_status($id, $new_status);
                      $_SESSION['success_message'] = "Cập nhật trạng thái đơn hàng thành công.";
                  } else {
                      $_SESSION['error_message'] = "Không thể cập nhật về trạng thái cũ hơn!";
                  }
              } else {
                  $_SESSION['error_message'] = "Không tìm thấy đơn hàng.";
              }
          }
      
          include './donhang/update.php';
          break;
        
        default:
          include './component/home.php';
          break;
      }
    }else{
      include './component/home.php';
    }
    ?>
  </main>
</div>

<?php include './component/footer.php'; ?>