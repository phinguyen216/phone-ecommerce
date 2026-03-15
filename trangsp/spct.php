<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<style>
/* ====== STYLE TGDĐ KIỂU CŨ ====== */
body {
    font-family: Arial, sans-serif;
    background: #f1f1f1;
    margin: 0;
    padding: 0;
}

/* Khối tổng */
.tgdd-container {
    width: 1200px;
    margin: 20px auto;
}

/* BREADCRUMB */
.breadcrumbs {
    font-size: 14px;
    color: #288ad6;
    margin-bottom: 10px;
}
.breadcrumbs a {
    color: #288ad6;
    text-decoration: none;
}
.breadcrumbs a:hover {
    text-decoration: underline;
}

/* Title */
.page-title {
    font-size: 24px;
    font-weight: bold;
    color: #333;
}

/* KHUNG CHI TIẾT */
.tgdd-box {
    background: #fff;
    padding: 20px;
    border-radius: 6px;
    display: flex;
    gap: 25px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.15);
}

/* Ảnh */
.tgdd-img img {
    width: 420px;
    border: 1px solid #ddd;
    border-radius: 6px;
}

/* Thông tin phải */
.tgdd-info {
    flex: 1;
}

/* Tên SP */
.tgdd-name {
    font-size: 26px;
    font-weight: bold;
    color: #333;
    margin-bottom: 8px;
}

/* Giá */
.tgdd-price {
    font-size: 28px;
    font-weight: bold;
    color: #d0021b;
    margin: 10px 0;
}

/* Mô tả */
.tgdd-desc {
    font-size: 15px;
    color: #444;
    line-height: 1.6;
}

/* Nút mua */
.btn-add-cart {
    width: 100%;
    height: 55px;
    background: #fdbe00;
    border: none;
    outline: none;
    color: #333;
    font-weight: bold;
    font-size: 18px;
    border-radius: 6px;
    margin-top: 20px;
    cursor: pointer;
}
.btn-add-cart:hover {
    background: #e6ab00;
}

/* STAR RATING KIỂU CŨ */
.stars {
    margin: 10px 0;
}
.stars i {
    color: #ccc;
    font-size: 18px;
    cursor: pointer;
}
.stars i:hover,
.stars i:hover ~ i {
    color: #ffcc00;
}
</style>

<body>
    <div class="tgdd-container">

        <!-- Breadcrumb -->
        <div class="breadcrumbs">
            <a href="index.php?act=home">Trang Chủ</a> / 
            <a href="index.php?act=sanpham">Điện Thoại</a>
        </div>

        <h2 class="page-title">Chi tiết sản phẩm</h2>
        <hr>

        <div class="tgdd-box">
            
            <!-- Ảnh -->
            <div class="tgdd-img">
                <img src="view/images/<?= $onesp['img'] ?>" alt="">
            </div>

            <!-- Thông tin -->
            <div class="tgdd-info">

                <div class="tgdd-name"><?= $onesp['name'] ?></div>

                <!-- Rating -->
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                </div>

                <div class="tgdd-price">
                    <?= number_format($onesp['price'], 0, ',', '.') ?>đ
                </div>

                <p class="tgdd-desc">
                    <?= $onesp['mota'] ?>
                </p>

                <!-- Giỏ hàng -->
                <form action="index.php?act=addtocart" method="post">
                    <input type="hidden" name="id" value="<?= $onesp['id'] ?>">
                    <input type="hidden" name="name" value="<?= $onesp['name'] ?>">
                    <input type="hidden" name="price" value="<?= $onesp['price'] ?>">
                    <input type="hidden" name="img" value="<?= $onesp['img'] ?>">

                    <button type="submit" class="btn-add-cart">
                        Thêm vào giỏ
                    </button>
                </form>

            </div>

        </div>
    </div>
</body>
    