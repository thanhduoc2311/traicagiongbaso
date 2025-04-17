<?php
require_once '../connect.php';
$db = new Connect();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idhinh = $_POST['idhinh'];

    // Lấy đường dẫn hình ảnh từ cơ sở dữ liệu
    $sql = "SELECT urlhinh FROM hinhanhca WHERE idhinh = '" . $idhinh . "'";
    $imageData = $db->getTable($sql);

    if ($imageData && count($imageData) > 0) {
        $imagePath = '../' . $imageData[0]['urlhinh'];

        // Xóa file hình ảnh
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        // Xóa bản ghi trong cơ sở dữ liệu
        $sql_delete = "DELETE FROM hinhanhca WHERE idhinh = '" . $idhinh . "'";
        $db->exec($sql_delete);

        echo 'success';
    } else {
        echo 'error';
    }
}
?>
