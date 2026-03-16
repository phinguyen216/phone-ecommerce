# Phone Ecommerce System 

Dự án Website thương mại điện tử bán điện thoại được xây dựng bằng PHP thuần và MySQL. Dự án tập trung vào logic xử lý giỏ hàng, thanh toán trực tuyến và quản lý sản phẩm.

## Tính năng nổi bật
- Hệ thống người dùng: Đăng ký, đăng nhập (mã hóa mật khẩu), quản lý thông tin cá nhân.
- Quản lý sản phẩm: CRUD sản phẩm, phân loại thương hiệu, tìm kiếm thông minh.
- Giỏ hàng & Thanh toán:Xử lý Session giỏ hàng, tích hợp thanh toán qua cổng điện tử (NCB Sandbox).
- Quản trị (Admin): Thống kê đơn hàng và quản lý kho.

### Công nghệ sử dụng
- **Backend:** PHP Native (Sử dụng PDO để chống SQL Injection).
- Database: MySQL.
- Frontend: Bootstrap 5, CSS3, JavaScript.

#### Thông tin thử nghiệm thanh toán (NCB Sandbox)
- Số thẻ: `9704198526191432198`
- Tên chủ thẻ: `NGUYEN VAN A`
- Ngày phát hành: `07/15`
- Mã OTP: `123456`
#### Tài khoản test
- Tài khoản admin: admin | admin
- Tài khoản test: test | test123456

# Hướng dẫn cài đặt
1. Clone dự án: `git clone https://github.com/phinguyen216/phone-ecommerce`.
2. Import database từ file `/database/phone-ecommerce.sql` vào MySQL.
3. Cấu hình kết nối DB tại file `model/pdo.php`.
4. Chạy dự án bằng laragon (PHP 8.2.20).
# Chú thích
- Trong dự án này, em ưu tiên tập trung thời gian vào thanh toán trực tuyến vì đây là phần khó nhất (có tham khảo nguồn trên youtube và chat gpt). Về phần đăng ký, em đã thiết lập Unique Constraint trực tiếp trong Database để đảm bảo tính duy nhất của tài khoản. Ở các phiên bản tiếp theo, em sẽ bổ sung thêm các lớp Validation ở phía Backend để trải nghiệm người dùng tốt hơn.
- link demo thank toán VNpay Sanbox: https://drive.google.com/file/d/1HlEkUMH9XzPFFK-JagWmqTSv3wMqMAjP/view?usp=sharing