<?php include 'header.php'; ?>
<style>
    body.page-home .pagemain-wrapper{        
        background-size: contain;
        background-attachment: fixed;
        padding-bottom: 1px;
        background-color: #fff;
    }
    body.page-home .pagemain-wrapper {
            min-height: auto;
        }
    .probox__pricebox {
        min-height: auto;
    }
</style>
<?php 
    require_once 'connect.php';
    $db = new Connect();
?>
<aside class="clearfix pagemain-wrapper">
        <div class="clearfix" id="bg-main">
            <div class="container">
                <ol class="breadcrumb">
                    <?php
                        if (isset($_GET['name'])) {
                            $duongDan = $_GET['name'];                      
                            $html = "";
                            $loaiCa = "";
                            $linkDeMucCa = "";                                                        
                            // Thực hiện truy vấn SQL
                            $sql = "SELECT * FROM tintuc WHERE duongdan = '" . $duongDan . "'";
                            $table = $db->getTable($sql);

                            if ($table !== false && count($table) > 0) {
                                $row = $table[0];                               
                                $html .= "<li class='breadcrumb-item'>
                                            <a href='/'>Trang Chủ</a>
                                          </li>
                                          <li class='breadcrumb-item'>
                                            <a href='/tin-tuc/'>Tin Tức</a>
                                        </li>
                                          <li class='breadcrumb-item'>
                                            <a href='javascript:void(0);'>" . $row['tieude'] . "</a>
                                          </li>";
                            } else {
                                $html .= "a";
                            }

                            // In nội dung HTML
                            echo $html;
                        }
                    ?>
                </ol>
            </div>
        </div>
        <div class="container wrapper-container storewrapper-container">
            <section class="home-boxproduct product__wrapper bg-none">
            <h1 class="title-page text-red f-title">Tin Tức</h1>
            
            <div class="clearfix">
                <div class="row row-cols-2 row-cols-sm-4 row-cols-lg-5 row-cols-xl-5 product__container" id="dvKetQuaTimKiem">
                    <?php                    
                        $sql = "SELECT * FROM tintuc tt LEFT JOIN hinhanhca ha ON tt.idtintuc = ha.idca WHERE ha.idloai = '7' or ha.idca is null ORDER BY tt.ngaydang DESC;";
                        // Thực thi câu truy vấn và lấy dữ liệu
                        $tintucTable = $db->getTable($sql);
                        $html = "";
                        if (!empty($tintucTable)) {
                            foreach ($tintucTable as $row) {
                                $maxChars = 125;
                                $noidung = $row['noidung'];
                                $noidungDisplay = strlen($noidung) > $maxChars ? substr($noidung, 0, $maxChars) . '...' : $noidung;
                                $ngaydang = date('d/m/Y', strtotime($row["ngaydang"]));
                                $html .= "<div class='col proitem'>                 
                                            <div class='probox  boxproid__15589 boxpro--phukien boxprobrand__uag boxprotype__product pro__group91 pro__main496 prothreaddichvu--121  probox--nottratruoc  price-show-gianiemyet'>
                                                <a href='/tin-tuc/" . $row['duongdan'] . "' class='box'>
                                                    <div class='probox__img'>
                                                        <figure class='mb-0 position-relative'>
                                                            <img data-src='/" . ($row['urlhinh'] != "" ? $row['urlhinh'] : "img/default-400_400.webp") . "' src='/img/default-400_400.webp' alt='" . $row['tieude'] . "' class='lazy img-full img-responsive probox__img_img' width='205' height='205'>
                                                        </figure>                           
                                                    </div>
                                                    <div class='probox__des'>               
                                                        <h3 class='probox__title' data-bs-toggle='tooltip' data-bs-placement='top' data-bs-custom-class='product-title-tooltip' data-bs-title='" . $row['tieude'] . "' style='font-weight:600'>" . $row['tieude'] . "</h3>
                                                        <div class='probox__pricebox'>                                
                                                            <p class='probox__price pr-1'>" . $noidungDisplay . "</p>              
                                                        </div>
                                                        <div class='probox__pricebox bt-time'>
                                                            <i class='fa fa-calendar-alt' aria-hidden='true' style='font-weight:500'></i> " . $ngaydang . "
                                                        </div>                          
                                                    </div>
                                                </a>
                                            </div>
                                        </div>";
                            }
                        } else {
                            $html .= "Không tìm thấy dữ liệu";
                        }

                        // Hiển thị kết quả tìm kiếm
                        echo $html;

                        // Đóng kết nối
                        $db->closeConnection();
                    ?>
                </div>
            </div>
        </section>
    </aside>
<?php include 'footer.php'; ?>