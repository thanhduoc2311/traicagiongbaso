<?php
// Xóa cookie "BaSo_Login" bằng cách đặt thời gian hết hạn trong quá khứ
setcookie("BaSo_Login", "", time() - 3600, "/");

// Chuyển hướng người dùng về trang đăng nhập hoặc trang chủ sau khi đăng xuất
header("Location: /Admin/dangnhap.php");
exit;
?>
