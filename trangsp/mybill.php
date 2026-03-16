<?php
// Kiểm tra nếu có danh sách đơn hàng
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
        /* Đồng bộ màu sắc với logic của bạn */
        .pending { background: #f0ad4e; }   /* Chờ xác nhận */
        .processing { background: #17a2b8; } /* Đang xử lý */
        .confirmed { background: #0275d8; }  /* Đã xác nhận */
        .shipping { background: #5bc0de; }   /* Đang giao */
        .completed { background: #5cb85c; }  /* Hoàn tất */
        .cancelled { background: #d9534f; }   /* Đã hủy */
    </style>
</head>
<body class="bg-light">

<div class="container mt-4">
    <h3 class="text-center mb-4">📦 ĐƠN HÀNG CỦA TÔI</h3>

    <?php if (!empty($listbill)): ?>
        <?php foreach ($listbill as $bill): ?>
            <?php 
                extract($bill); // Sẽ bung ra các biến: $id, $total, $trangthai, $ngaydathang, $pttt...

                // Hàm xử lý trạng thái khớp với DB và statusLabels của bạn
                $status_text = "";
                $status_class = "";
                
                switch ($trangthai) {
                    case 0: $status_text = "Chờ xác nhận"; $status_class = "pending"; break;
                    case 1: $status_text = "Đang xử lý"; $status_class = "processing"; break;
                    case 2: $status_text = "Xác nhận đơn"; $status_class = "confirmed"; break;
                    case 3: $status_text = "Đang giao hàng"; $status_class = "shipping"; break;
                    case 4: $status_text = "Đã giao hàng"; $status_class = "completed"; break;
                    case 5: $status_text = "Giao thất bại"; $status_class = "cancelled"; break;
                    case 6: $status_text = "Đã hủy"; $status_class = "cancelled"; break;
                    default: $status_text = "Không xác định"; $status_class = "bg-secondary"; break;
                }

                // Liên kết xem chi tiết (Sử dụng billconfirm để tận dụng trang bạn đã làm rất đẹp)
                $detail_link = "index.php?act=billconfirm&idbill=" . $id;
            ?>

            <div class="bill-card">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5>Mã đơn: <strong>#<?= $id ?></strong></h5>
                        <p class="mb-1">Ngày đặt: <?= date('d/m/Y H:i', strtotime($ngaydathang)) ?></p>
                        <p class="mb-1">Phương thức: <?= ($pttt == 1) ? 'Thanh toán COD' : 'Thanh toán VNPay' ?></p>
                        <p class="mb-1">Tổng tiền: <strong class="text-danger"><?= number_format($total, 0, ',', '.') ?>đ</strong></p>
                    </div>

                    <div class="text-end">
                        <span class="status <?= $status_class ?>"><?= $status_text ?></span>
                        <br><br>
                        <a href="<?= $detail_link ?>" class="btn btn-sm btn-outline-primary">Xem chi tiết</a>
                    </div>
                </div>
            </div>

        <?php endforeach; ?>
    <?php else: ?>
        <div class="alert alert-warning text-center">
            Bạn chưa có đơn hàng nào. <a href="index.php">Tiếp tục mua sắm</a>
        </div>
    <?php endif; ?>
</div>

</body>
</html>