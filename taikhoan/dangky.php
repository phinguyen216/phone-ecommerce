<?php
if (isset($_POST['dangky'])) {
    if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email']) && isset($_POST['tel'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $tel = $_POST['tel'];
        $hoten = $_POST['hoten'];
        if (empty($username) || empty($password) || empty($email) || empty($tel)|| empty($hoten)) {
            $thongbao = "Vui lòng điền đầy đủ thông tin";
        } else if (strlen($password) < 8) {
            $thongbao = "Mật khẩu phải ít nhất 8 ký tự";
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $thongbao = "Email không hợp lệ";
        } else {
            insert_taikhoan($username, $password, $email, $tel,$hoten);
            $thongbao = "Đăng ký thành công!";
        }
    } else {
        $thongbao = "Vui lòng điền đầy đủ thông tin đăng ký";
    }
}
?>

<!-- CSS + BOOTSTRAP -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
    body {
        background: #f5f5f5;
        font-family: Arial, sans-serif;
    }

    .auth-wrapper {
        display: flex;
        justify-content: center;
        padding: 40px 10px;
    }

    .auth-container {
        width: 900px;
        max-width: 100%;
        background: #fff;
        display: flex;
        border-radius: 16px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.12);
        overflow: hidden;
    }

    .auth-action-left {
        width: 50%;
        padding: 40px;
    }

    .auth-action-right {
        width: 50%;
    }

    .auth-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .auth-form-title {
        font-size: 28px;
        font-weight: bold;
        color: #EE4D2D;
        margin-bottom: 20px;
    }

    .auth-form-input {
        width: 100%;
        padding: 12px 14px;
        border-radius: 10px;
        border: 1px solid #ccc;
        margin-bottom: 15px;
        font-size: 15px;
        transition: border 0.2s;
    }

    .auth-form-input:focus {
        border-color: #EE4D2D;
        box-shadow: 0 0 0 2px rgba(238,77,45,0.2);
    }

    .auth-submit {
        width: 100%;
        padding: 12px;
        background: #EE4D2D;
        color: white;
        border: none;
        border-radius: 10px;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
        transition: 0.25s;
    }

    .auth-submit:hover {
        background: #ff694b;
    }

    .auth-btn-direct {
        display: inline-block;
        margin-top: 12px;
        font-size: 15px;
        color: #EE4D2D;
    }

    .auth-btn-direct:hover {
        text-decoration: underline;
    }

    .auth-container span {
        color: red;
        font-size: 15px;
        margin-top: 10px;
        display: block;
    }

    @media (max-width: 768px) {
        .auth-container {
            flex-direction: column;
        }
        .auth-action-left, .auth-action-right {
            width: 100%;
        }
        .auth-action-right {
            display: none;
        }
    }
</style>

<div class="auth-wrapper">
    <div class="auth-container">

        <div class="auth-action-left">
            <div class="auth-form-outer">
                <h2 class="auth-form-title">Đăng Ký Tài Khoản</h2>

                <!-- GIỮ NGUYÊN FORM + LOGIC -->
                <form class="login-form" onsubmit="return validateForm()" action="index.php?act=dangky" method="post">

                    <input type="text" class="auth-form-input" placeholder="Tên Tài Khoản" name="username">

                    <input type="password" class="auth-form-input" placeholder="Mật Khẩu" name="password">

                    <input type="email" class="auth-form-input" placeholder="Email" name="email">

                    <input type="tel" class="auth-form-input" placeholder="Số Điện Thoại" name="tel" id="tel">

                    <input type="text" class="auth-form-input" placeholder="Họ và Tên" name="hoten" id="hoten">

                    <div class="footer-action">
                        <input type="submit" value="Đăng Ký" class="auth-submit" name="dangky">
                        <a href="index.php?act=dangnhap" class="auth-btn-direct">Đăng Nhập</a>
                    </div>
                </form>

                <!-- GIỮ NGUYÊN THÔNG BÁO -->
                <?php
                if (isset($thongbao) && !empty($thongbao)) {
                    echo "<span>" . $thongbao . "</span>";
                }
                ?>
            </div>
        </div>

        <div class="auth-action-right">
            <div class="auth-image">
                <img src="taikhoan/assets/vector.jpg" alt="login">
            </div>
        </div>

    </div>
</div>

<script src="taikhoan/js/common.js"></script>
