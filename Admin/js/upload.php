<?php
// upload.php

// Kiểm tra xem có tệp được tải lên không
if (isset($_FILES['upload'])) {
    $file = $_FILES['upload'];
    
    // Đặt đường dẫn nơi bạn muốn lưu tệp
    $uploadDir = '../img/'; // Thư mục này cần phải tồn tại và có quyền ghi
    $uploadFile = $uploadDir . basename($file['name']);

    // Kiểm tra nếu tệp đã được tải lên mà không có lỗi
    if (move_uploaded_file($file['tmp_name'], $uploadFile)) {
        // Phản hồi thành công
        echo json_encode(['url' => '/' . $uploadFile]);
    } else {
        // Phản hồi lỗi
        echo json_encode(['error' => 'Could not upload file.']);
    }
} else {
    echo json_encode(['error' => 'No file uploaded.']);
}
?>
