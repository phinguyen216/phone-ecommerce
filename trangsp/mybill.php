<?php
// Giả sử bạn đã có $listbill từ controller truyền sang
// Mỗi bill gồm: id, total, bill_status, bill_pttt, created_at
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đơn hàng của tôi</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

    <style>
        .bill-card {
            border: 1px solid #ddd;
            border-radius: 12px;
            padding: 16px;
            margin-bottom: 18px;
            transition: 0.2s;
            background: #fff;
        }
        .bill-card:hover {
            box-shadow: 0 0 10px #dcdcdc;
            transform: translateY(-3px);
        }
        .status {
            padding: 6px 12px;
            border-radius: 6px;
            color: #fff;
            font-size: 14px;
            font-weight: 600;
        }
        .pending { background: #f0ad4e; }
        .confirmed { background: #0275d8; }
        .shipping { background: #5bc0de; }
        .completed { background: #5cb85c; }
        .cancelled { background: #d9534f; }
    </style>
</head>
<body class="bg-light">

<div class="container mt-4">
    <h3 class="text-center mb-4">📦 ĐƠN HÀNG CỦA TÔI</h3>

    <?php if (!empty($listbill)): ?>
        <?php foreach ($listbill as $bill): ?>
            <?php 
                extract($bill);

                // Hàm xử lý trạng thái
                function getStatus($st){
                    switch ($st) {
                        case 0: return ["Chờ xác nhận", "pending"];
                        case 1: return ["Đã xác nhận", "confirmed"];
                        case 2: return ["Đang giao", "shipping"];
                        case 3: return ["Hoàn tất", "completed"];
                        case 4: return ["Đã hủy", "cancelled"];
                    }
                }

                [$status_text, $status_class] = getStatus($bill_status);

                $detail_link = "index.php?act=billct&idbill=" . $id;
            ?>

            <div class="bill-card">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5>Mã đơn: <strong>#<?= $id ?></strong></h5>
                        <p class="mb-1">Ngày đặt: <?= $created_at ?></p>
                        <p class="mb-1">Tổng tiền: <strong><?= number_format($total, 0, ',', '.') ?>đ</strong></p>
                    </div>

                    <div class="text-end">
                        <span class="status <?= $status_class ?>"><?= $status_text ?></span>
                        <br><br>
                        <a href="<?= $detail_link ?>" class="btn btn-sm btn-primary">Xem chi tiết</a>
                    </div>
                </div>
            </div>

        <?php endforeach; ?>
    <?php else: ?>

        <div class="alert alert-warning text-center">
            Bạn chưa có đơn hàng nào.
        </div>

    <?php endif; ?>
</div>

</body>
</html>
