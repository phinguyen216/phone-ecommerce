<?php
function get_payment_method_name($pttt_code) {
    $payment_methods = [
        1 => 'Chuyển khoản',
        2 => 'Thanh toán khi nhận hàng',
        3 => 'Thẻ tín dụng'
    ];
    return isset($payment_methods[$pttt_code]) ? $payment_methods[$pttt_code] : 'Không xác định';
}

function get_order_status_name($status_code) {
    $status_labels = [
        0 => 'Đơn hàng mới',
        1 => 'Đang xử lý',
        2 => 'Xác nhận đơn hàng',
        3 => 'Đang giao hàng',
        4 => 'Đã giao hàng',
        5 => 'Giao hàng thất bại',
        6 => 'Hủy đơn'
  
    ];
    return isset($status_labels[$status_code]) ? $status_labels[$status_code] : 'Không xác định';
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DANH SÁCH ĐƠN HÀNG</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="trangsp/sp.css"> 
</head>
<body>
    <main class="main-wrapper">
        <div class="main-content">
            <div class="page-breadcrumb">
                <div class="breadcrumb-title" style="text-align: center">DANH SÁCH ĐƠN HÀNG</div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="product-table">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="table-light">
                                    <tr>
                                        <th>ID Đơn Hàng</th>
                                        <th>ID User</th>
                                        <th>Tên Người Nhận</th>
                                        <th>Địa Chỉ</th>
                                        <th>Số Điện Thoại</th>
                                        <th>Email</th>
                                        <th>Phương Thức Thanh Toán</th>
                                        <th>Total</th>
                                        <th>Ngày Đặt Hàng</th>
                                        <th>Trạng Thái</th>
                                        <th>Chức Năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($orders as $order) {
                                        $pttt_name = get_payment_method_name($order['pttt']);
                                        $status_name = get_order_status_name($order['trangthai']);
                                        echo "<tr>
                                            <td>{$order['id']}</td>
                                            <td>{$order['iduser']}</td>
                                            <td>{$order['hoten']}</td>
                                            <td>{$order['diachi']}</td>
                                            <td>{$order['sdt']}</td>
                                            <td>{$order['email']}</td>
                                            <td>{$pttt_name}</td>
                                            <td>" . number_format($order['total']) . "đ</td>
                                            <td>{$order['ngaydathang']}</td>
                                            <td>{$status_name}</td>
                                            <td>
                                                <a href='index.php?act=chitietdh&id={$order['id']}' class='sua'>
                                                    <i class='bi bi-pencil-square'></i>
                                                </a>
                                            </td>
                                        </tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
