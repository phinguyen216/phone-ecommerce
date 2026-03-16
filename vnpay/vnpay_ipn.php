<?php
include "../model/pdo.php";
include "config.php"; // Chứa mã bí mật $vnp_HashSecret

$vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
$vnp_data = $_GET;
$vnp_SecureHash = $vnp_data['vnp_SecureHash'];
unset($vnp_data['vnp_SecureHash']);

// Sắp xếp dữ liệu để kiểm tra mã băm (checksum)
ksort($vnp_data);
$i = 0;
$hashData = "";
foreach ($vnp_data as $key => $value) {
    if ($i == 1) {
        $hashData .= '&' . urlencode($key) . "=" . urlencode($value);
    } else {
        $hashData .= urlencode($key) . "=" . urlencode($value);
        $i = 1;
    }
}

$secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);
$vnp_TxnRef = $vnp_data['vnp_TxnRef']; // Đây là ID bill 

try {
    if ($secureHash == $vnp_SecureHash) {
        // 1. Kiểm tra trạng thái đơn hàng trong DB của bạn
        $order = pdo_query_one("SELECT * FROM bill WHERE id = ?", $vnp_TxnRef);
        
        if ($order != NULL) {
            if ($order["trangthai"] == 0) { // Nếu đơn hàng đang ở trạng thái Chờ xác nhận
                if ($vnp_data['vnp_ResponseCode'] == '00') {
                    // Thanh toán thành công: Cập nhật trạng thái = 2 (Xác nhận đơn hàng)
                    $sql = "UPDATE bill SET trangthai = 2, vnp_transaction_no = ?, vnp_bank_code = ? WHERE id = ?";
                    pdo_execute($sql, $vnp_data['vnp_TransactionNo'], $vnp_data['vnp_BankCode'], $vnp_TxnRef);
                } else {
                    // Thanh toán thất bại: Cập nhật trạng thái = 6 (Hủy đơn)
                    $sql = "UPDATE bill SET trangthai = 6 WHERE id = ?";
                    pdo_execute($sql, $vnp_TxnRef);
                }
                $returnData = array('RspCode' => '00', 'Message' => 'Xác nhận thành công');
            } else {
                $returnData = array('RspCode' => '02', 'Message' => 'Đơn hàng đã được xác nhận');
            }
        } else {
            $returnData = array('RspCode' => '01', 'Message' => 'Không tìm thấy đơn hàng');
        }
    } else {
        $returnData = array('RspCode' => '97', 'Message' => 'Chữ ký không hợp lệ');
    }
} catch (Exception $e) {
    $returnData = array('RspCode' => '99', 'Message' => 'Lỗi không xác định');
}

echo json_encode($returnData);