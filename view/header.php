<!-- HEADER -->
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Nhóm 1</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <link rel="stylesheet" href="view/style.css">

    <style>
        .navbar-custom {
            background: #EE4D2D;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
        }

        .navbar-custom .nav-link {
            color: #fff !important;
            font-weight: 500;
            padding: 10px 18px !important;
        }

        .navbar-custom .nav-link:hover {
            color: #f1f1f1 !important;
        }

        .nav-icon {
            margin-right: 6px;
        }

        .btn-login {
            border: 1px solid #fff !important;
            color: #fff !important;
        }
    </style>
</head>

<body>

<div class="top-bar text-white py-1">
    <div class="container d-flex justify-content-between small">
        <div>
            Kết nối:
            <i class="fa-brands fa-facebook ms-1"></i>
            <i class="fa-brands fa-instagram ms-1"></i>
        </div>

        <div>
            <i class="fa-regular fa-bell"></i> Thông Báo |
            <i class="fa-solid fa-circle-question"></i> Hỗ Trợ |

            <?php if (!isset($_SESSION['user'])): ?>
                <a href="index.php?act=dangky" class="text-white ms-1">Đăng Ký</a>
            <?php else: ?>
                Xin chào <strong><?= $_SESSION['user']['username'] ?></strong> |
                <a href="index.php?act=thoat" class="text-white">Thoát</a>
            <?php endif; ?>
        </div>
    </div>
</div>

<nav class="navbar navbar-expand-lg navbar-light navbar-custom">
    <div class="container">

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="search-box d-none d-lg-flex">
            <form class="d-flex w-100">
                <input type="text" class="form-control search-input" placeholder="Tìm kiếm sản phẩm...">
                <button class="btn btn-light search-btn"><i class="fa fa-search"></i></button>
            </form>
        </div>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav align-items-center">

                <li class="nav-item">
                    <a class="nav-link" href="index.php"><i class="fa fa-house nav-icon"></i> Trang Chủ</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="index.php?act=sanpham">
                        <i class="fa-solid fa-mobile-screen-button nav-icon"></i> Sản Phẩm
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="index.php?act=giohang">
                        <i class="fa fa-shopping-cart nav-icon"></i> Giỏ Hàng
                    </a>
                </li>

                <?php if (isset($_SESSION['user'])):
                    extract($_SESSION['user']); ?>

                    <?php if ($role == 1): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="admin/index.php">
                                <i class="fa-solid fa-user-shield nav-icon"></i> Admin
                            </a>
                        </li>
                    <?php endif; ?>

                    <!-- Đơn hàng (đã sửa) -->
                   
                <?php else: ?>

                    <li class="nav-item">
                        <a class="nav-link btn btn-login rounded-pill px-3 ms-2"
                           href="index.php?act=dangnhap">
                           <i class="fa-solid fa-right-to-bracket nav-icon"></i> Đăng Nhập
                        </a>
                    </li>

                <?php endif; ?>

            </ul>
        </div>
    </div>
</nav>
