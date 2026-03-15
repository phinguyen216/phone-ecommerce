<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sản Phẩm</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        /* Sidebar */
        .sidebar-box {
            background: #fff;
            padding: 15px;
            border-radius: 10px;
            border: 1px solid #e5e5e5;
        }
        .sidebar-box ul li a {
            text-decoration: none;
            color: #333;
        }
        .sidebar-box ul li {
            padding: 6px 0;
        }
        .sidebar-box ul li:hover a {
            color: #ff5722;
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
        /* Sort bar */
        .sort-bar button {
            border: 1px solid #ddd;
            background: #fff;
            padding: 6px 14px;
            border-radius: 6px;
        }
        .sort-bar button.active {
            background: #ff5722;
            color: #fff;
            border-color: #ff5722;
        }
 .breadcrumb-bar {

    padding: 10px 15px;
    border-radius: 4px;
    font-size: 14px;
}

.breadcrumb-bar a {
    color: #000;
    font-weight: 500;
    text-decoration: none;
}

.breadcrumb-bar a:hover {
    text-decoration: underline;
}

.breadcrumb-bar span {
    margin: 0 5px;
    color: #000;
}

    </style>
</head>

<body class="bg-light">

<div class="container py-4">
    <div class="breadcrumb-bar mb-3">
    <a href="index.php?act=view/home"><i class="fa fa-house nav-icon"></i>Trang Chủ</a>
    <span>></span>
    <a href="index.php?act=sanpham">Điện Thoại</a>
</div>

     <hr>
    <div class="row">

        <aside class="col-md-3 mb-4">
            <div class="sidebar-box">
                <h5><i class="fa-solid fa-list"></i> Tất Cả Danh Mục</h5>
                <ul class="list-unstyled">
                    <?php foreach ($listdm as $dm): ?>
                        <?php extract($dm); ?>
                        <li>
                            <a href="index.php?act=dmsp&iddm=<?= $id ?>"><?= $name ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </aside>
        <div class="col-md-9">
            <div class="row g-3">
                <?php foreach ($dssp as $sp): ?>
                    <div class="col-md-4 col-6">
                        <div class="product-card position-relative">

                            <?php if (!empty($sp['img'])): ?>
                                <?php $linksp = "index.php?act=spct&idsp=" . $sp['id']; ?>
                                <a href="<?= $linksp ?>">
                                    <img src="view/images/<?= $sp['img'] ?>" class="product-img">
                                </a>
                            <?php endif; ?>

                            <span class="tag-sale">-15%</span>

                            <div class="p-2">
                                <div class="product-title"><?= $sp['name'] ?></div>

                                <div class="product-price">
                                    <?= number_format($sp['price'], 0, ',', '.') ?>đ
                                </div>

                                <div class="small text-secondary">
                                    Đã bán <?= rand(30, 500) ?>+
                                </div>

                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>

    </div>

</div>

</body>
</html>
