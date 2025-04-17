<?php
include 'connect.php'; // Bao gồm file kết nối CSDL

// Lấy từ khóa tìm kiếm từ yêu cầu GET
$query = isset($_GET['k']) ? $_GET['k'] : '';

// Tạo đối tượng kết nối
$connect = new Connect();

// Tạo truy vấn SQL
$sql = "SELECT * 
        FROM cagiong cg 
        LEFT JOIN hinhanhca ha ON cg.idca = ha.idca 
        WHERE (ha.idloai = '1' OR ha.idloai = '2' OR ha.idloai = '3') 
        AND (
            (cg.danhmucCha = '0' AND NOT EXISTS (
                SELECT 1 
                FROM cagiong sub_cg 
                WHERE sub_cg.danhmucCha = cg.idca AND sub_cg.tenca LIKE '%" . $connect->getConnection()->real_escape_string($query) . "%'
            )) 
            OR cg.danhmucCha != '0'
        )
        AND cg.tenca LIKE '%" . $connect->getConnection()->real_escape_string($query) . "%'
        ORDER BY cg.idca;";

// Lấy dữ liệu từ CSDL
$data = $connect->getTable($sql);

$html = "";
$linkDeMucCa = "";

// Xử lý dữ liệu và tạo HTML
if (!empty($data)) {
    $html .= "<ul>";
    foreach ($data as $row) {
        switch ($row["loaica"]) {
            case "1":
                $linkDeMucCa = "/ca-giong/";
                break;
            case "2":
                $linkDeMucCa = "/ca-kieng/";
                break;
            case "3":
                $linkDeMucCa = "/ca-bot/";
                break;
        }
        $html .= "<li>
                    <a href='" . $linkDeMucCa . $row["duongdanca"] . "'>
                        <figure class='row m-0'>
                            <img src='/" . (!empty($row["urlhinh"]) ? $row["urlhinh"] : "img/default-400_400.webp") . "' class='col-2 px-0'>
                            <figcaption class='col ps-2'>
                                <b class='d-block title f-title'>" . htmlspecialchars($row["tenca"]) . "</b>
                                <span class='price'>
                                    <b class='price'>Giá: Liên Hệ</b>
                                </span>
                            </figcaption>
                        </figure>
                    </a>
                </li>";
    }
    $html .= "</ul>";
}

// Trả về HTML
echo $html;

// Đóng kết nối
$connect->closeConnection();
?>
