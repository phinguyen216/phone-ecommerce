<?php
if (isset($_SESSION['user'])) 
    extract($_SESSION['user']);
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
    body {
        background: #f7f7f7;
        font-family: Arial, sans-serif;
    }

    .auth-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        padding: 20px;
    }

    .auth-container {
        background: #fff;
        width: 900px;
        max-width: 95%;
        display: flex;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        overflow: hidden;
    }

    .auth-action-left {
        width: 50%;
        padding: 40px;
    }

    .auth-action-right {
        width: 50%;
    }

    .auth-action-right img {
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
        padding: 12px;
        margin-bottom: 15px;
        border-radius: 10px;
        border: 1px solid #ccc;
        font-size: 15px;
    }

    .auth-submit {
        background: #EE4D2D;
        border: none;
        color: #fff;
        padding: 12px;
        width: 100%;
        border-radius: 10px;
        font-weight: bold;
        cursor: pointer;
        transition: 0.3s;
    }

    .auth-submit:hover {
        background: #ff6a4d;
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

    .auth-forgot-password a {
        font-size: 14px;
        color: #333;
    }

    .input-icon {
        position: relative;
    }

    .input-icon i {
        position: absolute;
        right: 12px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
        color: #888;
    }
</style>

<form action="index.php?act=dangnhap" method="post">
    <div class="auth-wrapper">
        <div class="auth-container">

            <!-- GIỮ NGUYÊN Y CODE BÊN TRÁI -->
            <div class="auth-action-left">
                <div class="auth-form-outer">
                    <h2 class="auth-form-title">Đăng Nhập</h2>

                    <div class="auth-external-container">
                        <div class="auth-external-list">
                            <span>chưa có tài khoản? bấm vào đăng ký</span>
                        </div>
                    </div>

                    <div class="login-form">

                        <!-- GIỮ NGUYÊN INPUT CỦA BẠN -->
                        <input type="text" class="auth-form-input" placeholder="Tên Đăng Nhập" name="username" required>

                        <div class="input-icon">
                            <input type="password" class="auth-form-input" placeholder="Mật Khẩu" name="password" required>
                            <i class="fa fa-eye show-password"></i>
                        </div>

                        <!-- GIỮ NGUYÊN CHECKBOX -->
                       
                        <div class="footer-action">
                            <!-- GIỮ NGUYÊN NÚT SUBMIT -->
                            <input type="submit" value="Đăng Nhập" class="auth-submit" name="dangnhap">
                            <a href="index.php?act=dangky" class="auth-btn-direct">Đăng Ký</a>
                        </div>
                    </div>

                    <div class="auth-forgot-password">
                        <a href="#">Quên Mật Khẩu</a>
                    </div>

                    <!-- GIỮ NGUYÊN THÔNG BÁO -->
                    <?php
                    if (isset($thongbao) && !empty($thongbao)) {
                        echo "<span>" . $thongbao . "</span>";
                    }
                    ?>
                </div>
            </div>

            <!-- ẢNH BÊN PHẢI GIỮ NGUYÊN -->
            <div class="auth-action-right">
                <div class="auth-image">
                    <img src="taikhoan/assets/vector.jpg" alt="login">
                </div>
            </div>

        </div>
    </div>
</form>
