<?php
require_once '../connect.php';
$db = new Connect();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idca = $_POST['idca'];
    $idhinh = $_POST['idhinh'];
    $imageUrl = $_POST['imageUrl'];

    // Kiểm tra danh mục cha
    $sql_check = "SELECT danhmucCha FROM cagiong WHERE idca = '" . $idca . "'";
    $data = $db->getTable($sql_check);

    if ($data && count($data) > 0) {
        $danhmucCha = $data[0]['danhmucCha'];

        if ($danhmucCha == 0) {
            // Kiểm tra xem có bản ghi nào khác đang sử dụng idca này không
            $sql_check_usage = "SELECT COUNT(*) AS count FROM cagiong WHERE danhmucCha = '" . $idca . "'";
            $usageData = $db->getTable($sql_check_usage);

            if ($usageData && $usageData[0]['count'] > 0) {
                echo 'cannot_delete'; 
                exit();
            } 
        }

        // Xóa ảnh nếu tồn tại
        $imagePath = '../' . $imageUrl;
        if (file_exists($imagePath)) {
            unlink($imagePath); 
        }

        // Xóa bản ghi trong bảng hinhanhca
        $sql_delete_image = "DELETE FROM hinhanhca WHERE idhinh = '" . $idhinh . "'";
        $db->exec($sql_delete_image);

        // Xóa bản ghi trong bảng cagiong
        $sql_delete_ca = "DELETE FROM cagiong WHERE idca = '" . $idca . "'";
        $db->exec($sql_delete_ca);

        echo 'success'; 
    } else {
        echo 'not_found'; 
    }
}
?>
