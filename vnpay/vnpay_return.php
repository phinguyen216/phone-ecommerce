<?php
session_start();
include "../model/pdo.php";
include "../model/bill.php";
include "../model/cart.php";
include "../model/bill_detail.php";
include "../model/sanpham.php";

if (isset($_GET['vnp_ResponseCode']) && $_GET['vnp_ResponseCode'] == '00') {

    $bill = $_SESSION['vnpay_bill'];
    $iduser = $bill['iduser'];

    // LỖI 1 FIX: Lấy dữ liệu từ VNPay gửi về URL
    $vnp_transaction_no = $_GET['vnp_TransactionNo'];
    $vnp_bank_code = $_GET['vnp_BankCode'];

    $idbill = insert_bill(
        $iduser,
        $bill['hoten'],
        $bill['diachi'],
        $bill['sdt'],
        $bill['email'],
        $bill['pttt'],
        $bill['ngaydathang'],
        $bill['total'],
        1,
        $vnp_transaction_no, 
        $vnp_bank_code       
    );

    if ($idbill) {
        $cartItems = load_cart_by_user($iduser);
        foreach ($cartItems as $item) {
            $sp = pdo_query_one("SELECT id FROM sanpham WHERE name = ?", $item['name']);
            $idpro = $sp ? $sp['id'] : 0;

            insert_bill_detail($iduser, $idbill, $idpro, $item['img'], $item['name'], $item['soluong'], $item['price'], $item['thanhtien']);
        }

        clear_cart($iduser);
        unset($_SESSION['vnpay_bill']);

        header("Location: ../index.php?act=billconfirm&idbill=" . $idbill);
        exit();
    }
} else {
    header("Location: ../index.php?act=giohang&error=payment_failed");
    exit();
}
