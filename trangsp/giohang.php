<?php

if (!isset($_SESSION['user'])) {
    header('Location: index.php?act=dangnhap');
    exit();
}

$gioHang = load_cart_by_user($_SESSION['user']['id']); 

$tongCong = 0; 

function formatCurrency($amount) {
    return number_format($amount, 0, '.', '.') . " ₫";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="trangsp/sp.css"> 
    <link rel="stylesheet" href="trangsp/cart.css">
</head>
<body>
    <div class="container">
        <h2>Giỏ hàng của bạn</h2>
        <table class="cart-table">
            <tr>
                <th>Hình ảnh</th>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Tổng</th>
                <th>Hành động</th>
            </tr>
            <?php
            if ($gioHang) {
                foreach ($gioHang as $sp) {
                    $price = $sp['price'];
                    $soluong = $sp['soluong'];
                    $total = $price * $soluong;

                    $tongCong += $total; 

                    echo "<tr>
                        <td><img src='view/images/{$sp['img']}' width='100' alt='{$sp['name']}'></td>
                        <td>{$sp['name']}</td>
                        <td class='cart-price'>" . formatCurrency($price) . "</td>
                        <td>
                            <form action='index.php?act=updatecart' method='post'>
                                <input type='hidden' name='id' value='{$sp['id']}'>
                                <button type='submit' name='action' value='decrease'>-</button>
                                <input type='text' name='soluong' value='$soluong' size='2' readonly>
                                <button type='submit' name='action' value='increase'>+</button>
                            </form>
                        </td>
                        <td class='cart-total'>" . formatCurrency($total) . "</td>
                        <td><a href='index.php?act=removefromcart&id={$sp['id']}'>Xóa</a></td>
                    </tr>";
                }

                echo "<tr>
                    <td colspan='4'><strong>Tổng giỏ hàng:</strong></td>
                    <td class='cart-total'>" . formatCurrency($tongCong) . "</td>
                    <td></td>
                </tr>";
                echo "<tr>
                    <td colspan='6' class='text-right'>
                        <a href='index.php?act=bill&total=" . $tongCong . "' class='button-color'>Xác nhận</a>
                    </td>
                </tr>";
            } else {
                echo "<tr><td colspan='6'>Giỏ hàng của bạn trống.</td></tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>
