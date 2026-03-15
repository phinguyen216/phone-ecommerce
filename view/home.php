<div class="bannner">
    <img src="view/images/banner-ip15.jpg" alt="">
</div>
<br>
<div class="container margin-down">

    <!-- Title -->
    <div class="d-flex justify-content-between align-items-center mb-2 section-header">
        <h3 class="section-title">iPhone</h3>
        <a href="index.php?act=dmsp&iddm=7">Xem tất cả ›</a>
    </div>

    <!-- Products -->
    <div class="row g-3">
        <?php
        $iphoneProducts = [];
        foreach ($spnew as $sp) {
            if ($sp['iddm'] == 7) {
                $iphoneProducts[] = $sp;
                if (count($iphoneProducts) == 3) break;
            }
        }

        foreach ($iphoneProducts as $sp) :
            $linksp = "index.php?act=spct&idsp=" . $sp['id'];
        ?>
        <div class="col-12 col-sm-6 col-lg-4">
            <div class="card card-product">
                <a href="<?= $linksp ?>">
                    <img src="view/images/<?= $sp['img'] ?>" class="card-img-top" alt="<?= $sp['name'] ?>">
                </a>
                <div class="card-body">
                    <h6 class="card-title"><?= $sp['name'] ?></h6>
                    <p class="text-danger fw-bold"><?= number_format($sp['price'], 0, ',', '.') ?>đ</p>
                    <a href="<?= $linksp ?>"><button class="btn-buy">Mua Ngay</button></a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

</div>

    <div class="container margin-down">

    <div class="d-flex justify-content-between align-items-center mb-2 section-header">
        <h3 class="section-title">Samsung</h3>
        <a href="index.php?act=dmsp&iddm=6">Xem tất cả ›</a>
    </div>

    <div class="row g-3">
        <?php
        $iphoneProducts = [];
        foreach ($spnew as $sp) {
            if ($sp['iddm'] == 6) {
                $iphoneProducts[] = $sp;
                if (count($iphoneProducts) == 3) break;
            }
        }

        foreach ($iphoneProducts as $sp) :
            $linksp = "index.php?act=spct&idsp=" . $sp['id'];
        ?>
        <div class="col-12 col-sm-6 col-lg-4">
            <div class="card card-product">
                <a href="<?= $linksp ?>">
                    <img src="view/images/<?= $sp['img'] ?>" class="card-img-top">
                </a>
                <div class="card-body">
                    <h6><?= $sp['name'] ?></h6>
                    <p class="text-danger fw-bold"><?= number_format($sp['price'], 0, ',', '.') ?>đ</p>
                    <a href="<?= $linksp ?>"><button class="btn-buy">Mua Ngay</button></a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

</div>

<div class="container margin-down">

    <div class="d-flex justify-content-between align-items-center mb-2 section-header">
        <h3 class="section-title">Xiaomi</h3>
        <a href="index.php?act=dmsp&iddm=8">Xem tất cả ›</a>
    </div>

    <div class="row g-3">
        <?php
        $iphoneProducts = [];
        foreach ($spnew as $sp) {
            if ($sp['iddm'] == 8) {
                $iphoneProducts[] = $sp;
                if (count($iphoneProducts) == 3) break;
            }
        }

        foreach ($iphoneProducts as $sp) :
            $linksp = "index.php?act=spct&idsp=" . $sp['id'];
        ?>
        <div class="col-12 col-sm-6 col-lg-4">
            <div class="card card-product">
                <a href="<?= $linksp ?>">
                    <img src="view/images/<?= $sp['img'] ?>" class="card-img-top">
                </a>
                <div class="card-body">
                    <h6><?= $sp['name'] ?></h6>
                    <p class="text-danger fw-bold"><?= number_format($sp['price'], 0, ',', '.') ?>đ</p>
                    <a href="<?= $linksp ?>"><button class="btn-buy">Mua Ngay</button></a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

</div>

        </div>
    </div>
