<?php
if (isset($_SESSION['user']) && is_array($_SESSION['user'])) {
    extract($_SESSION['user']);
}
?>
<link rel="stylesheet" href="trangsp/bill.css">

<body>
    <div class="thongtin">
        <h2>Thông tin người dùng</h2>
        <form action="index.php?act=edit_taikhoan" method="post">
            <label for="username">Tên Đăng Nhập:</label>
            <input type="text" id="username" name="username" value="<?= ($username) ?>" required>

            <label for="password">Mật khẩu:</label>
            <input type="text" id="password" name="password" value="<?= ($password) ?>" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?= ($email) ?>" required>

            <label for="address">Địa chỉ:</label>
            <input type="text" id="address" name="address" value="<?= ($address) ?>" required>

            <label for="tel">Số điện thoại:</label>
            <input type="text" id="tel" name="tel" value="<?= ($tel) ?>" required>

            <label for="hoten">Họ và tên:</label>
            <input type="text" id="hoten" name="hoten" value="<?= ($hoten) ?>" required>

            <input type="hidden" id="id" name="id" value="<?= ($id) ?>">
            <button type="submit" name="capnhat" class="button-color">Cập nhật thông tin</button>
        </form>
    </div>
</body>
</html>
