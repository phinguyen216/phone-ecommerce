<?php

if (!isset($_SESSION['user'])) {
    header('Location: index.php?act=dangnhap');
    exit();
}

$gioHang = load_cart_by_user($_SESSION['user']['id']);

$tongTien = 0;
if ($gioHang) {
    foreach ($gioHang as $sp) {
        $tongTien += $sp['price'] * $sp['soluong'];
    }
}

function formatCurrency($amount)
{
    return number_format($amount, 0, '.') . " ₫";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt hàng</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="trangsp/bill.css">
</head>

<body>
    <div class="boxtrai">
        <h2>Thông tin đặt hàng</h2>
        <form action="index.php?act=bill" method="post">
            <label for="hoten">Họ và tên:</label>
            <input type="text" id="hoten" name="hoten" required>

            <label for="diachi">Địa chỉ:</label>
            <input type="text" id="diachi" name="diachi" required>

            <label for="sdt">Số điện thoại:</label>
            <input type="text" id="sdt" name="sdt" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="total">Tổng đơn hàng:</label>
            <input type="text" id="total" name="total_display" value="<?= formatCurrency($tongTien) ?>" readonly>
            <input type="hidden" id="total" name="total" value="<?= $tongTien ?>">

            <label for="ngaydathang">Ngày Đặt Hàng:</label>
            <input type="date" id="ngaydathang" name="ngaydathang" value="<?= date('Y-m-d') ?>" required>

            <label for="pttt1">Phương thức thanh toán:</label>
            <table>
                <tr>
                    <td><input type="radio" id="pttt1" name="pttt" value="1" required> Thanh toán trực tiếp (COD)</td>
                </tr>
                <tr>
                   <td><input type="radio" name="pttt" value="2"> Thanh toán online (VNPay)</td> 
                </tr>
            </table>

            <button type="submit" name="xacnhan" class="button-color">Xác nhận thông tin</button>
        </form>
    </div>
    <div class="boxphai">
        <h2>Giỏ hàng của bạn</h2>
        <table class="cart-table">
            <tr>
                <th>Hình ảnh</th>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Tổng</th>
            </tr>
            <?php
            if ($gioHang) {
                foreach ($gioHang as $sp) {
                    $price = $sp['price'];
                    $soluong = $sp['soluong'];
                    $total = $price * $soluong;
                    echo "<tr>
                        <td><img src='view/images/{$sp['img']}' width='100' alt='{$sp['name']}'></td>
                        <td>{$sp['name']}</td>
                        <td class='cart-price'>" . formatCurrency($price) . "</td>
                        <td>$soluong</td>
                        <td class='cart-total'>" . formatCurrency($total) . "</td>
                    </tr>";
                }
                echo "<tr>
                    <td colspan='4'><strong>Tổng giỏ hàng:</strong></td>
                    <td class='cart-total'>" . formatCurrency($tongTien) . "</td>
                </tr>";
            } else {
                echo "<tr><td colspan='5'>Giỏ hàng của bạn trống.</td></tr>";
            }
            ?>
        </table>
    </div>
</body>

</html>