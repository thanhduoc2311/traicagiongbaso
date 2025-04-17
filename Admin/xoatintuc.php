<?php
require_once '../connect.php';
$db = new Connect();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idtintuc = $_POST['idtintuc'];
    $idhinh = $_POST['idhinh'];
    $imageUrl = $_POST['imageUrl'];

    // Xóa ảnh nếu tồn tại
    $imagePath = '../' . $imageUrl;
    if (file_exists($imagePath)) {
        unlink($imagePath); 
    }

    // Xóa bản ghi trong bảng hinhanhca
    $sql_delete_image = "DELETE FROM hinhanhca WHERE idhinh = '" . $idhinh . "'";
    $db->exec($sql_delete_image);

    // Xóa bản ghi trong bảng cagiong
    $sql_delete_ca = "DELETE FROM tintuc WHERE idtintuc = '" . $idtintuc . "'";
    $db->exec($sql_delete_ca);

    echo 'success'; 
}
?>
