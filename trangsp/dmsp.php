<?php
function formatCurrency($amount) {
    return number_format($amount, 0, '.') . " ₫";
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Mục Sản Phẩm</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<style>
body {
    background: #f1f1f1;
    font-family: Arial, sans-serif;
}

/* Sidebar */
.filter-box {
    background: #fff;
    border-radius: 6px;
    padding: 15px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.1);
}

.filter-box h3 {
    font-size: 18px;
    font-weight: bold;
    border-bottom: 1px solid #ddd;
    padding-bottom: 8px;
    margin-bottom: 10px;
}

.filter-box ul {
    list-style: none;
    padding: 0;
}
.filter-box ul li {
    margin-bottom: 8px;
}
.filter-box ul li a {
    text-decoration: none;
    color: #288ad6;
}
.filter-box ul li a:hover {
    text-decoration: underline;
}

/* Product card */
.product-card {
    background: #fff;
    border-radius: 6px;
    padding: 15px;
    text-align: center;
    box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    transition: 0.2s;
    height: 100%;
}
.product-card:hover {
    transform: translateY(-3px);
}

.product-card img {
    max-height: 180px;
    object-fit: contain;
}

.product-name {
    font-size: 15px;
    font-weight: bold;
    color: #333;
    margin-top: 10px;
}

.product-price {
    color: #d0021b;
    font-weight: bold;
}
</style>

<body>

<div class="container my-4">

    <!-- Breadcrumb -->
    <div class="mb-3">
        <a href="index.php?act=home" class="text-decoration-none text-primary">Trang Chủ</a> /
        <a href="index.php?act=sanpham" class="text-decoration-none text-primary">Lọc</a>
    </div>

    <div class="row">

        <!-- SIDEBAR -->
        <aside class="col-md-3">
            <div class="filter-box">
                <h3>Danh mục</h3>
                <ul>
                    <?php foreach ($listdm as $dm): ?>
                        <?php extract($dm); ?>
                        <li>
                            <a href="index.php?act=dmsp&iddm=<?= $id; ?>">
                                <?= $name; ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </aside>

        <!-- MAIN -->
        <main class="col-md-9">
            <div class="row g-3">

                <?php foreach ($dssp as $sp): ?>
                    <?php 
                        $linksp = "index.php?act=spct&idsp=" . $sp['id']; 
                    ?>
                    <div class="col-md-4 col-sm-6">
                        <div class="product-card">
                            <?php if (!empty($sp['img'])): ?>
                                <a href="<?= $linksp ?>">
                                    <img src="view/images/<?= $sp['img'] ?>" class="img-fluid" alt="<?= $sp['name'] ?>">
                                </a>
                            <?php endif; ?>

                            <div class="product-name"><?= $sp['name'] ?></div>
                            <div class="product-price"><?= number_format($sp['price']) ?>đ</div>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
        </main>

    </div>
</div>

</body>
</html>
