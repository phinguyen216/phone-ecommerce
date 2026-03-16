<?php

if (!isset($_SESSION['user'])) {
    header('Location: index.php?act=dangnhap');
    exit();
}

if (!isset($bill) || empty($bill)) {
    echo "<div class='container'><h3>Không tìm thấy thông tin đơn hàng hoặc đơn hàng không tồn tại.</h3></div>";
    return;
}


$billDetails = load_bill_detail_by_id($bill['id']);

$paymentMethods = [
    1 => 'Thanh toán khi nhận hàng (COD)',
    2 => 'Thanh toán trực tuyến (VNPay)',
];

$statusLabels = [
    0 => 'Đơn hàng mới',
    1 => 'Đã thanh toán / Đang xử lý',
    2 => 'Xác nhận đơn hàng',
    3 => 'Đang giao hàng',
    4 => 'Đã giao hàng',
    5 => 'Giao hàng thất bại',
    6 => 'Đã hủy'
];

$pttt = $paymentMethods[$bill['pttt']] ?? 'Không xác định';
$status = $statusLabels[$bill['trangthai']] ?? 'Không xác định';

if (isset($_POST['cancel_order'])) {
    $order_id = $_POST['order_id'];
    update_order_status($order_id, 6);
    header("Location: index.php?act=billconfirm&idbill=" . $order_id);
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác nhận đơn hàng #<?= $bill['id'] ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="trangsp/sp.css">
    <script>
        function confirmCancelOrder() {
            return confirm('Bạn có chắc chắn muốn hủy đơn hàng này không?');
        }
    </script>
</head>

<body>
    <div class="container" style="margin-top: 50px; margin-bottom: 50px;">
        <div style="text-align: center; margin-bottom: 30px;">
            <i class="fas fa-check-circle" style="color: #28a745; font-size: 50px;"></i>
            <h2 style="color:black; margin-top: 15px;">ĐẶT HÀNG THÀNH CÔNG</h2>
            <p style="color:black">Cảm ơn bạn đã tin tưởng và mua sắm tại cửa hàng!</p>
        </div>

        <div class="order-info" style="background: #f9f9f9; padding: 20px; border-radius: 8px;">
            <h3 style="color:black; border-bottom: 1px solid #ddd; padding-bottom: 10px;">Thông tin đơn hàng #<?= $bill['id'] ?></h3>
            <p style="color:black"><strong>Ngày đặt hàng:</strong> <?= date('d/m/Y H:i', strtotime($bill['ngaydathang'])) ?></p>
            <p style="color:black">
                <strong>Trạng thái:</strong> <?= $status ?>
            </p>
            <p style="color:black"><strong>Phương thức thanh toán:</strong> <?= $pttt ?></p>

            <?php if (!empty($bill['vnp_transaction_no'])): ?>
                <p style="color:black"><strong>Mã giao dịch VNPay:</strong> <?= $bill['vnp_transaction_no'] ?></p>
            <?php endif; ?>
        </div>

        <div class="customer-info" style="margin-top: 20px;">
            <h3 style="color:black">Thông tin người nhận:</h3>
            <p style="color:black"><strong>Họ và tên:</strong> <?= $bill['hoten'] ?></p>
            <p style="color:black"><strong>Email:</strong> <?= $bill['email'] ?></p>
            <p style="color:black"><strong>Số điện thoại:</strong> <?= $bill['sdt'] ?></p>
            <p style="color:black"><strong>Địa chỉ giao hàng:</strong> <?= $bill['diachi'] ?></p>
        </div>

        <h3 style="color:black; margin-top: 30px;">Chi tiết sản phẩm:</h3>
        <table style="color:black; width: 100%; border-collapse: collapse; margin-top: 10px;">
            <thead style="background: #eee;">
                <tr>
                    <th style="padding: 10px; border: 1px solid #ddd;">Hình ảnh</th>
                    <th style="padding: 10px; border: 1px solid #ddd;">Tên sản phẩm</th>
                    <th style="padding: 10px; border: 1px solid #ddd;">Giá</th>
                    <th style="padding: 10px; border: 1px solid #ddd;">Số lượng</th>
                    <th style="padding: 10px; border: 1px solid #ddd;">Thành tiền</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $grandTotal = 0;
                if (!empty($billDetails)) {
                    foreach ($billDetails as $detail) {
                        $thanhtien = $detail['price'] * $detail['soluong'];
                        $grandTotal += $thanhtien;
                ?>
                        <tr>
                            <td style="padding: 10px; border: 1px solid #ddd; text-align: center;">
                                <img src="view/images/<?= $detail['img'] ?>" width="80" alt="<?= $detail['name'] ?>">
                            </td>
                            <td style="padding: 10px; border: 1px solid #ddd;"><?= $detail['name'] ?></td>
                            <td style="padding: 10px; border: 1px solid #ddd; text-align: right;"><?= number_format($detail['price'], 0, ',', '.') ?> đ</td>
                            <td style="padding: 10px; border: 1px solid #ddd; text-align: center;"><?= $detail['soluong'] ?></td>
                            <td style="padding: 10px; border: 1px solid #ddd; text-align: right;"><strong><?= number_format($thanhtien, 0, ',', '.') ?> đ</strong></td>
                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>
            <tfoot>
                <tr style="background: #f1f1f1;">
                    <td colspan="4" style="padding: 15px; text-align: right;"><strong>Tổng giá trị đơn hàng:</strong></td>
                    <td style="padding: 15px; text-align: right; color: red; font-size: 1.2em;">
                        <strong><?= number_format($bill['total'], 0, ',', '.') ?> đ</strong>
                    </td>
                </tr>
            </tfoot>
        </table>

        <div style="margin-top: 30px; display: flex; gap: 10px;">
            <a href="index.php" class="btn-home" style="padding: 10px 20px; background: #007bff; color: white; text-decoration: none; border-radius: 5px;">Tiếp tục mua sắm</a>

            <?php if ($bill['trangthai'] == 0): ?>
                <form method="post" action="" onsubmit="return confirmCancelOrder();">
                    <input type="hidden" name="order_id" value="<?= $bill['id'] ?>">
                    <button type="submit" name="cancel_order" style="padding: 10px 20px; background: #dc3545; color: white; border: none; border-radius: 5px; cursor: pointer;">Hủy đơn hàng</button>
                </form>
            <?php endif; ?>
        </div>
    </div>
</body>

</html>