<?php include 'header.php'; ?>
<style>
    body.page-home .pagemain-wrapper{        
        background-size: contain;
        background-attachment: fixed;
        padding-bottom: 1px;
        background-color: #fff;
    }
    @media screen and (min-width: 992px) {
        body.page-home .pagemain-wrapper {
            min-height: 40vh;
        }
    }
</style>
<link href="/css/timkiem.css" rel="stylesheet" />
<aside class="clearfix pagemain-wrapper">
    <div class="clearfix" id="bg-main">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="/">Trang Chủ</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="/tim-kiem/">Tìm Kiếm</a>
                </li>
            </ol>
        </div>
    </div>
    <div class="container wrapper-container storewrapper-container">
        <section class="home-boxproduct product__wrapper bg-none">
            <h1 class="hboxproduct__title mb-2 pt-0">Kết quả tìm kiếm: <b class="text-red" id="txtKeyWord">
                <?php 
                    if (isset($_GET['k'])) {
                        $duongDan = $_GET['k'];
                        echo $duongDan;
                    }
                ?>
            </b></h1>
            <div class="clearfix">
                <div class="row row-cols-2 row-cols-sm-4 row-cols-lg-5 row-cols-xl-5 product__container" id="dvKetQuaTimKiem">
                    <?php
                        require_once 'connect.php';

                        // Khởi tạo biến để lưu trữ các tham số tìm kiếm
                        $key = "";
                        $danhmuc = "";

                        // Lấy giá trị từ query string và loại bỏ khoảng trắng
                        if (isset($_GET['k']) && trim($_GET['k']) != "") {
                            $key = trim($_GET['k']);
                        }

                        if (isset($_GET['dm']) && trim($_GET['dm']) != "") {
                            $danhmuc = trim($_GET['dm']);
                        }

                        // Tạo kết nối
                        $db = new Connect();

                        // Xây dựng câu truy vấn SQL
                        $sql = "SELECT * 
                                FROM cagiong cg 
                                LEFT JOIN hinhanhca ha ON cg.idca = ha.idca 
                                WHERE (ha.idloai = '1' OR ha.idloai = '2' OR ha.idloai = '3') 
                                AND (
                                    (cg.danhmucCha = '0' AND NOT EXISTS (
                                        SELECT 1 
                                        FROM cagiong sub_cg 
                                        WHERE sub_cg.danhmucCha = cg.idca " . ($key != "" ? "AND sub_cg.tenca LIKE '%" . $key . "%'" : "") . " " . ($danhmuc != "" ? "AND sub_cg.loaica = '" . $danhmuc . "'" : "") . "
                                    )) 
                                    OR cg.danhmucCha != '0'
                                )
                                " . ($key != "" ? "AND cg.tenca LIKE '%" . $key . "%'" : "") . " " . ($danhmuc != "" ? "AND cg.loaica = '" . $danhmuc . "'" : "") . "                       
                                ORDER BY cg.idca;";

                        // Thực thi câu truy vấn và lấy dữ liệu
                        $cagiongTable = $db->getTable($sql);

                        $html = "";
                        $linkDeMucCa = "";

                        if (!empty($cagiongTable)) {
                            foreach ($cagiongTable as $row) {
                                switch ($row['loaica']) {
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

                                $html .= "<div class='col proitem'>                 
                                            <div class='probox  boxproid__15589 boxpro--phukien boxprobrand__uag boxprotype__product pro__group91 pro__main496 prothreaddichvu--121  probox--nottratruoc  price-show-gianiemyet'>
                                                <a href='" . $linkDeMucCa . $row['duongdanca'] . "' class='box'>
                                                    <div class='probox__img'>
                                                        <figure class='mb-0 position-relative'>
                                                            <img data-src='/" . ($row['urlhinh'] != "" ? $row['urlhinh'] : "img/default-400_400.webp") . "' src='/img/default-400_400.webp' alt='" . $row['tenca'] . "' class='lazy img-full img-responsive probox__img_img' width='205' height='205'>
                                                        </figure>                           
                                                    </div>
                                                    <div class='probox__des'>               
                                                        <h3 class='probox__title' data-bs-toggle='tooltip' data-bs-placement='top' data-bs-custom-class='product-title-tooltip' data-bs-title='" . $row['tenca'] . "'>" . $row['tenca'] . "</h3>
                                                        <div class='probox__pricebox'>
                                                            <p class='probox__price pr-1'><b class='price'>Giá: Liên Hệ</b>
                                                                <span class='text-center mb-3 mb-md-4 mb-lg-5'>
                                                                    <a href='" . $linkDeMucCa . $row['duongdanca'] . "' class='btn btn-outline-viewall-product'>Thông tin<i class='fas fa-info-circle'></i></a>
                                                                </span>
                                                            </p>
                                                        </div>                          
                                                    </div>
                                                </a>
                                            </div>
                                        </div>";
                            }
                        } else {
                            $html .= "<div class='col-12'>Không tìm thấy dữ liệu</div>";
                        }

                        // Hiển thị kết quả tìm kiếm
                        echo $html;

                        // Đóng kết nối
                        $db->closeConnection();
                    ?>
                </div>
            </div>
        </section>
    </div>
</aside>
<?php include 'footer.php'; ?>