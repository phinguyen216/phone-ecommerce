<?php
session_start();

include "model/pdo.php";
include "model/danhmuc.php";
include "model/sanpham.php";
include "model/taikhoan.php";
include "model/bill.php";
include "model/cart.php";
include "model/bill_detail.php";

$listdm = loadall_danhmuc();
$spnew = loadAll_sanpham();

// ⭐ Đưa include header xuống dưới, sau khi xử lý header()
ob_start();

if (isset($_GET['act']) && $_GET['act'] != "") {
    $act = $_GET['act'];
    switch ($act) {

        // ===============================
        case 'spct':
            if (isset($_GET['idsp']) && $_GET['idsp'] > 0) {
                $id = $_GET['idsp'];
                $onesp = loadone_sanpham($id);
                if ($onesp) {
                    $iddm = $onesp['iddm'];
                    include "trangsp/spct.php";
                }
            }
            break;

        // ===============================
        case 'sanpham':
            $keyword = $_POST['keyword'] ?? "";

            if (isset($_GET['iddm']) && $_GET['iddm'] > 0) {
                $iddm = $_GET['iddm'];
                $dssp = loadall_sanpham($iddm);
            } else {
                $dssp = loadall_sanpham();
            }

            include "trangsp/sanpham.php";
            break;

        // ===============================
        case 'dmsp':
            if (isset($_GET['iddm']) && $_GET['iddm'] > 0) {
                $iddm = $_GET['iddm'];
                $dssp = loadAll_sanpham($iddm);
                include "trangsp/dmsp.php";
            } else {
                include "view/home.php";
            }
            break;

        case 'home':
            include "view/home.php";
            break;

        // ===============================
        case 'dangky':
            if (isset($_POST['dangky'])) {
                $username = $_POST['username'] ?? '';
                $password = $_POST['password'] ?? '';
                $email    = $_POST['email'] ?? '';
                $tel      = $_POST['tel'] ?? '';
                $hoten    = $_POST['hoten'] ?? '';

                if (empty($username) || empty($password) || empty($email) || empty($tel) || empty($hoten)) {
                    $thongbao = "Vui lòng điền đầy đủ thông tin";
                } elseif (strlen($password) < 8) {
                    $thongbao = "Mật khẩu phải ít nhất 8 ký tự";
                } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $thongbao = "Email không hợp lệ";
                } else {
                    $thongbao = "Đăng ký thành công";
                }
            }
            include "taikhoan/dangky.php";
            break;

        // ===============================
        case 'dangnhap':
            if (isset($_POST['dangnhap']) && $_POST['dangnhap']) {
                if (isset($_POST['username']) && isset($_POST['password'])) {
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $checkuser = checkuser($username, $password);
                    if (is_array($checkuser)) {
                        $_SESSION['user'] = $checkuser;
                        header('Location: index.php');
                        exit();
                    } else {
                        $thongbao = "Sai tài khoản hoặc mật khẩu";
                    }
                } else {
                    $thongbao = "Vui lòng điền đầy đủ";
                }
            }
            include "taikhoan/dangnhap.php";
            break;

        // ===============================
        case 'addtocart':
            if (isset($_SESSION['user']) && isset($_SESSION['user']['id'])) {
                $iduser = intval($_SESSION['user']['id']);
                $id      = $_POST['id'];
                $img     = $_POST['img'];
                $name    = $_POST['name'];
                $price   = $_POST['price'];
                $soluong = intval($_POST['soluong'] ?? 1);

                $thanhtien = $price * $soluong;
                $idbill = 0;

                insert_cart($iduser, $id, $img, $name, $price, $soluong, $thanhtien, $idbill);

                header('Location: index.php?act=giohang');
                exit();
            } else {
                header('Location: index.php?act=dangnhap');
                exit();
            }

            break;


        case 'removefromcart':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                delete_cart($id);
                header('Location: index.php?act=giohang');
                exit();
            }
            break;

        // ===============================
        case 'updatecart':
            if (isset($_POST['id']) && isset($_POST['action'])) {
                $id = $_POST['id'];
                $action = $_POST['action'];
                $soluong = intval($_POST['soluong'] ?? 1);

                if ($action == 'increase') $soluong++;
                elseif ($action == 'decrease' && $soluong > 1) $soluong--;

                update_cart($id, $soluong);
                header('Location: index.php?act=giohang');
                exit();
            }
            break;

        // ===============================
        case 'giohang':
            if (isset($_SESSION['user'])) {
                $iduser = $_SESSION['user']['id'];
                $gioHang = load_cart_by_user($iduser);
                include "trangsp/giohang.php";
            } else {
                header('Location: index.php?act=dangnhap');
                exit();
            }
            break;

        // ===============================
        case 'edit_taikhoan':
            if (isset($_POST['capnhat']) && $_POST['capnhat']) {

                $username = $_POST['username'];
                $password = $_POST['password'];
                $hoten    = $_POST['hoten'];
                $address  = $_POST['address'];
                $tel      = $_POST['tel'];
                $email    = $_POST['email'];
                $id       = $_POST['id'];

                if (empty($username) || empty($password) || empty($hoten) || empty($address) || empty($tel) || empty($email)) {
                    $thongbao = "Vui lòng điền đầy đủ.";
                } elseif (strlen($password) < 8) {
                    $thongbao = "Mật khẩu phải ít nhất 8 ký tự.";
                } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $thongbao = "Email không hợp lệ.";
                } else {
                    update_taikhoan($id, $username, $password, $email, $tel, $address, $hoten);
                    $_SESSION['user'] = [
                        'id' => $id,
                        'username' => $username,
                        'password' => $password,
                        'email' => $email,
                        'tel' => $tel,
                        'address' => $address,
                        'hoten' => $hoten
                    ];
                    header('Location: index.php?act=edit_taikhoan&success=1');
                    exit();
                }
            }
            include "view/user.php";
            break;

        // ===============================
        case 'bill':
    if (isset($_POST['xacnhan'])) {

        $iduser = $_SESSION['user']['id'] ?? 0;

        $hoten = $_POST['hoten'] ?? '';
        $diachi = $_POST['diachi'] ?? '';
        $sdt = $_POST['sdt'] ?? '';
        $email = $_POST['email'] ?? '';
        $pttt = $_POST['pttt'] ?? 1;
        $ngaydathang = $_POST['ngaydathang'] ?? date('Y-m-d');

        $total = floatval($_POST['total'] ?? 0);

        $trangthai = 0;

        // Nếu thanh toán online
        if ($pttt == 2) {

            $_SESSION['vnpay_bill'] = [
                'iduser' => $iduser,
                'hoten' => $hoten,
                'diachi' => $diachi,
                'sdt' => $sdt,
                'email' => $email,
                'pttt' => $pttt,
                'ngaydathang' => $ngaydathang,
                'total' => $total
            ];

            include "vnpay/vnpay_create_payment.php";
            exit();
        }

        // Thanh toán thường
        $idbill = insert_bill($iduser, $hoten, $diachi, $sdt, $email, $pttt, $ngaydathang, $total, $trangthai);

        if ($idbill) {

            $cartItems = load_cart_by_user($iduser);

            foreach ($cartItems as $item) {

                $sp = pdo_query_one(
                    "SELECT id FROM sanpham WHERE name = ?",
                    $item['name']
                );

                $idpro = $sp ? $sp['id'] : 0;

                insert_bill_detail(
                    $iduser,
                    $idbill,
                    $idpro,
                    $item['img'],
                    $item['name'],
                    $item['soluong'],
                    $item['price'],
                    $item['thanhtien']
                );
            }

            clear_cart($iduser);

            header('Location: index.php?act=billconfirm');
            exit();
        }
    }

    include "trangsp/bill.php";
    break;
        case 'mybill':
            include "trangsp/mybill.php";
            break;


        // ===============================
        case 'billconfirm':
            include "trangsp/billconfirm.php";
            break;

        // ===============================
        case 'cancel_order':
            if (isset($_GET['order_id'])) {
                $order_id = intval($_GET['order_id']);
                cancel_order($order_id);
            }
            header('Location: index.php?act=billconfirm');
            exit();
            break;

        // ===============================
        case 'thoat':
            session_unset();
            header('Location: index.php');
            exit();
            break;

        default:
            include "view/home.php";
            break;
    }
} else {
    include "view/home.php";
}

// ⭐ Include header/footer cuối cùng để không gây lỗi header()
$page_content = ob_get_clean();
include "view/header.php";
echo $page_content;
include "view/footer.php";
