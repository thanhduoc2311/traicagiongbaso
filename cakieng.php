<?php include 'header.php'; ?>
<style>
    body.page-home .pagemain-wrapper{        
        background-size: contain;
        background-attachment: fixed;
        padding-bottom: 1px;
        background-color: #fff;
    }
</style>
<link href="/css/cagiong.css" rel="stylesheet" /> 
<aside class="clearfix pagemain-wrapper">
        <div class="clearfix" id="bg-main">
            <div class="container">
                <ol class="breadcrumb" id="olBreadCrumb">
                	<?php
                        require_once 'connect.php';
                        if (isset($_GET['name'])) {
                            $duongDan = $_GET['name'];                      
                            $html = "";
                            $loaiCa = "";
                            $linkDeMucCa = "";
                            $db = new Connect();
                            
                            // Thực hiện truy vấn SQL
                            $sql = "SELECT * FROM cagiong WHERE duongdanca = '" . $duongDan . "'";
                            $table = $db->getTable($sql);

                            if ($table !== false && count($table) > 0) {
                                $row = $table[0]; // Lấy dòng dữ liệu đầu tiên
                                switch ($row['loaica']) {
                                    case '1':
                                        $loaiCa = "Cá Giống Nước Ngọt";
                                        $linkDeMucCa = "/ca-giong";
                                        break;
                                    case '2':
                                        $loaiCa = "Cá Kiểng";
                                        $linkDeMucCa = "/ca-kieng";
                                        break;
                                    case '3':
                                        $loaiCa = "Cá Bột";
                                        $linkDeMucCa = "/ca-bot";
                                        break;
                                }
                                $html .= "<li class='breadcrumb-item'>
                                            <a href='/'>Trang Chủ</a>
                                          </li>
                                          <li class='breadcrumb-item'>
                                            <a href='" . $linkDeMucCa . "'>" . $loaiCa . "</a>
                                          </li>
                                          <li class='breadcrumb-item'>
                                            <a href='javascript:void(0);'>" . $row['tenca'] . "</a>
                                          </li>";
                            } else {
                                $html .= "<li class='breadcrumb-item'>Không tìm thấy kết quả.</li>";
                            }

                            // In nội dung HTML
                            echo $html;
                        }
                    ?>
                </ol>
            </div>
        </div>
        <div class="container wrapper-container prodetail__main pt-mb-0">      
            <div class="pdinfo_faddcart detail_pdinfo_faddcart">
                <div class="row mb-3">
                    <div class="col-12 col-lg-12 col-xl-9">
                        <div class="prodetail__wrapper prodetail__overview_imginfo row mx-0 mb-0 pt-mb-0">
                            <div class="col-12 col-lg-5 prodetail__overview_img pl-pr-mb-0">
                                <section class="position-relative prodetail_img_wrapper">
                                    <div id="dvSlideCa" class="owl-carousel owl-theme owl-loaded">
                                    	<?php
                                            require_once 'connect.php';

                                            $html = "";
                                            $duongDan = $_GET['name']; 

                                            $db = new Connect();
                                            $sql = "SELECT * FROM cagiong WHERE duongdanca = '" . $duongDan . "'";
                                            $params = [':duongDan' => $duongDan];
                                            $table = $db->getTable($sql, $params);

                                            if (count($table) > 0) {
                                                $idCa = $table[0]['idca'];
                                                $sqlHinh = "SELECT * FROM hinhanhca WHERE idca = '" . $idCa . "'";
                                                $paramsHinh = [':idCa' => $idCa];
                                                $tableHinh = $db->getTable($sqlHinh, $paramsHinh);

                                                foreach ($tableHinh as $rowHinh) {
                                                    $html .= "<div class='selected prodimg__img img_" . $rowHinh['idhinh'] . "' data-item='item__" . $rowHinh['idhinh'] . "'>
                                                                <figure class='m-0 pt-mb-0 pl-pr-mb-0'>
                                                                    <a href='/" . $rowHinh['urlhinh'] . "' data-fancybox='gallery'>
                                                                        <img src='/" . $rowHinh['urlhinh'] . "' alt='" . $table[0]['tenca'] . "' data-item='prodimg__img" . $rowHinh['idhinh'] . "' class='transition' width='370' height='370' />
                                                                    </a>
                                                                </figure>
                                                              </div>";
                                                }
                                            }
                                            echo $html;
                                        ?>
                                    </div>
                                    <div id="dvSlideCa_Thumbnail" class="owl-carousel owl-theme owl-loaded owl-drag">
                                    	<?php
                                            require_once 'connect.php';

                                            $html = "";
                                            $duongDan = $_GET['name']; 

                                            $db = new Connect();
                                            $sql = "SELECT * FROM cagiong WHERE duongdanca = '" . $duongDan . "'";
                                            $params = [':duongDan' => $duongDan];
                                            $table = $db->getTable($sql, $params);

                                            if (count($table) > 0) {
                                                $idCa = $table[0]['idca'];
                                                $sqlHinh = "SELECT * FROM hinhanhca WHERE idca = '" . $idCa . "'";
                                                $paramsHinh = [':idCa' => $idCa];
                                                $tableHinh = $db->getTable($sqlHinh, $paramsHinh);

                                                foreach ($tableHinh as $rowHinh) {
                                                    $html .= "<div class='selected prodimg__img img_" . $rowHinh['idhinh'] . "' data-item='item__" . $rowHinh['idhinh'] . "' >
                                            <img data-src='/" . $rowHinh['urlhinh'] . "' src='/img/noimage-60.png' alt='" . $table[0]['tenca'] . "' class='img-full img-responsive lazy' width='60' height='60'>
                                    </div>";
                                                }
                                            }
                                            echo $html;
                                        ?>
                                    </div>
                                </section>
                            </div>
                            <div class="col-12 col-lg-7 prodetail__overview_info pb-0 pb-md-4">
                                <h1 class="prodetail__title" id="titleCaGiong">
                                	<?php
                                        require_once 'connect.php';
                                        if (isset($_GET['name'])) {
                                            $duongDan = $_GET['name'];                      
                                            $html = "";
                                            $db = new Connect();
                                            
                                            // Thực hiện truy vấn SQL
                                            $sql = "SELECT * FROM cagiong WHERE duongdanca = '" . $duongDan . "'";
                                            $table = $db->getTable($sql);

                                            if ($table !== false && count($table) > 0) {
                                                $row = $table[0]; // Lấy dòng dữ liệu đầu tiên                                
                                                $html .= $row['tenca'];
                                            } else {
                                                $html .= "Không tìm thấy kết quả.";
                                            }

                                            // In nội dung HTML
                                            echo $html;
                                        }
                                    ?>
                                </h1>
                                <span class="thong-tin-ca">Thông tin mô tả:</span>
                                <div class="product-short-description">
                                    <ul class="info_ul info_ul--icon">
                                        <li>Tên gọi: <span id="spTenCa">
                                        	<?php
                                                require_once 'connect.php';
                                                if (isset($_GET['name'])) {
                                                    $duongDan = $_GET['name'];                      
                                                    $html = "";
                                                    $db = new Connect();
                                                    
                                                    // Thực hiện truy vấn SQL
                                                    $sql = "SELECT * FROM cagiong WHERE duongdanca = '" . $duongDan . "'";
                                                    $table = $db->getTable($sql);

                                                    if ($table !== false && count($table) > 0) {
                                                        $row = $table[0]; // Lấy dòng dữ liệu đầu tiên                                
                                                        $html .= $row['tenca'];
                                                    } else {
                                                        $html .= "Không tìm thấy kết quả.";
                                                    }

                                                    // In nội dung HTML
                                                    echo $html;
                                                }
                                            ?>
                                        </span></li>
                                        <li>Vùng nuôi: Nước ngọt</li>
                                        <li>Hình thức nuôi: Bể, Ao, Hồ</li>
                                        <li>Kích cỡ: Đủ size lớn nhỏ</li>
                                        <li>Tình trạng: Cá khỏe mạnh, sức sống dai</li>
                                        <li>Giá bán: Vui lòng liên hệ trực tiếp để được BÁO GIÁ TỐT NHẤT</li>
                                    </ul>
                                </div>
                                <div class="row">
                                    <div class="col-6 col-md-6 mb-3 mb-md-3 pr-1">
                                        <a class="btn btn-outline-primary btn-sm fish-contact-item--icon" href="http://m.me/traicagiongbaso" rel="nofollow">
                                            <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 48 48" width="240px" height="240px"><radialGradient id="8O3wK6b5ASW2Wn6hRCB5xa" cx="11.087" cy="7.022" r="47.612" gradientTransform="matrix(1 0 0 -1 0 50)" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#1292ff"/><stop offset=".079" stop-color="#2982ff"/><stop offset=".23" stop-color="#4e69ff"/><stop offset=".351" stop-color="#6559ff"/><stop offset=".428" stop-color="#6d53ff"/><stop offset=".754" stop-color="#df47aa"/><stop offset=".946" stop-color="#ff6257"/></radialGradient><path fill="url(#8O3wK6b5ASW2Wn6hRCB5xa)" d="M44,23.5C44,34.27,35.05,43,24,43c-1.651,0-3.25-0.194-4.784-0.564	c-0.465-0.112-0.951-0.069-1.379,0.145L13.46,44.77C12.33,45.335,11,44.513,11,43.249v-4.025c0-0.575-0.257-1.111-0.681-1.499	C6.425,34.165,4,29.11,4,23.5C4,12.73,12.95,4,24,4S44,12.73,44,23.5z"/><path d="M34.992,17.292c-0.428,0-0.843,0.142-1.2,0.411l-5.694,4.215	c-0.133,0.1-0.28,0.15-0.435,0.15c-0.15,0-0.291-0.047-0.41-0.136l-3.972-2.99c-0.808-0.601-1.76-0.918-2.757-0.918	c-1.576,0-3.025,0.791-3.876,2.116l-1.211,1.891l-4.12,6.695c-0.392,0.614-0.422,1.372-0.071,2.014	c0.358,0.654,1.034,1.06,1.764,1.06c0.428,0,0.843-0.142,1.2-0.411l5.694-4.215c0.133-0.1,0.28-0.15,0.435-0.15	c0.15,0,0.291,0.047,0.41,0.136l3.972,2.99c0.809,0.602,1.76,0.918,2.757,0.918c1.576,0,3.025-0.791,3.876-2.116l1.211-1.891	l4.12-6.695c0.392-0.614,0.422-1.372,0.071-2.014C36.398,17.698,35.722,17.292,34.992,17.292L34.992,17.292z" opacity=".05"/><path d="M34.992,17.792c-0.319,0-0.63,0.107-0.899,0.31l-5.697,4.218	c-0.216,0.163-0.468,0.248-0.732,0.248c-0.259,0-0.504-0.082-0.71-0.236l-3.973-2.991c-0.719-0.535-1.568-0.817-2.457-0.817	c-1.405,0-2.696,0.705-3.455,1.887l-1.21,1.891l-4.115,6.688c-0.297,0.465-0.32,1.033-0.058,1.511c0.266,0.486,0.787,0.8,1.325,0.8	c0.319,0,0.63-0.107,0.899-0.31l5.697-4.218c0.216-0.163,0.468-0.248,0.732-0.248c0.259,0,0.504,0.082,0.71,0.236l3.973,2.991	c0.719,0.535,1.568,0.817,2.457,0.817c1.405,0,2.696-0.705,3.455-1.887l1.21-1.891l4.115-6.688c0.297-0.465,0.32-1.033,0.058-1.511	C36.051,18.106,35.531,17.792,34.992,17.792L34.992,17.792z" opacity=".07"/><path fill="#fff" d="M34.394,18.501l-5.7,4.22c-0.61,0.46-1.44,0.46-2.04,0.01L22.68,19.74	c-1.68-1.25-4.06-0.82-5.19,0.94l-1.21,1.89l-4.11,6.68c-0.6,0.94,0.55,2.01,1.44,1.34l5.7-4.22c0.61-0.46,1.44-0.46,2.04-0.01	l3.974,2.991c1.68,1.25,4.06,0.82,5.19-0.94l1.21-1.89l4.11-6.68C36.434,18.901,35.284,17.831,34.394,18.501z"/></svg>
                                            <span class="tooltip-text" style="flex-grow:1">
                                                <b>Messenger</b>
                                                <small>(8h00 - 22h00)</small>
                                            </span>
                                        </a>
                                    </div>
                                    <div class="col-6 col-md-6 mb-3 mb-md-3 pl-1">
                                         <a class="btn btn-outline-primary btn-sm fish-contact-item--icon hover-fill-white" href="http://zalo.me/0918982338" rel="nofollow">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="31" height="11" viewBox="0 0 31 11" fill="none"><path d="M15.8625 3.2266V2.6416H17.5462V10.8602H16.5838C16.3932 10.8605 16.2103 10.7823 16.0751 10.6427C15.94 10.5031 15.8635 10.3134 15.8625 10.1153V10.1166C15.1597 10.6517 14.311 10.9395 13.44 10.9382C12.3517 10.9382 11.308 10.4888 10.5382 9.6887C9.76844 8.88863 9.33566 7.80341 9.335 6.6716C9.33566 5.53979 9.76844 4.45457 10.5382 3.6545C11.308 2.85443 12.3517 2.405 13.44 2.405C14.3106 2.40398 15.1588 2.69179 15.8613 3.2266H15.8625V3.2266ZM8.89875 0V0.2665C8.89875 0.7631 8.835 1.1687 8.52375 1.6445L8.48625 1.6887C8.38255 1.80964 8.28169 1.93318 8.18375 2.0592L2.78 9.113H8.89875V10.1114C8.89875 10.2098 8.88009 10.3073 8.84382 10.3983C8.80756 10.4892 8.75442 10.5718 8.68742 10.6413C8.62043 10.7109 8.54091 10.766 8.45342 10.8036C8.36592 10.8411 8.27216 10.8604 8.1775 10.8602H0.25V10.3896C0.25 9.8137 0.3875 9.5563 0.5625 9.2885L6.32125 1.872H0.49V0H8.9H8.89875ZM19.5875 10.8602C19.4284 10.8602 19.2758 10.7945 19.1632 10.6774C19.0507 10.5604 18.9875 10.4017 18.9875 10.2362V0H20.7887V10.8602H19.5875V10.8602ZM26.1163 2.353C26.6589 2.35283 27.1963 2.46383 27.6978 2.67965C28.1992 2.89548 28.6549 3.21191 29.0387 3.61088C29.4226 4.00984 29.7271 4.48353 29.935 5.0049C30.1428 5.52627 30.2498 6.0851 30.25 6.6495C30.2502 7.21389 30.1434 7.7728 29.9359 8.2943C29.7284 8.81579 29.4241 9.28967 29.0405 9.68888C28.6569 10.0881 28.2014 10.4048 27.7001 10.621C27.1988 10.8371 26.6614 10.9484 26.1187 10.9486C25.0227 10.9489 23.9715 10.4965 23.1963 9.69072C22.421 8.88497 21.9853 7.79195 21.985 6.6521C21.9847 5.51225 22.4197 4.41895 23.1945 3.61271C23.9693 2.80648 25.0202 2.35335 26.1163 2.353V2.353ZM13.4413 9.1819C13.7629 9.18951 14.0828 9.13019 14.3822 9.00743C14.6815 8.88466 14.9542 8.70092 15.1843 8.46701C15.4144 8.23309 15.5972 7.95371 15.7221 7.64528C15.8469 7.33685 15.9112 7.00559 15.9112 6.67095C15.9112 6.33631 15.8469 6.00505 15.7221 5.69662C15.5972 5.38819 15.4144 5.10881 15.1843 4.87489C14.9542 4.64098 14.6815 4.45724 14.3822 4.33447C14.0828 4.21171 13.7629 4.15239 13.4413 4.16C12.8104 4.17493 12.2103 4.44603 11.7692 4.9153C11.3281 5.38456 11.0812 6.01473 11.0812 6.67095C11.0812 7.32717 11.3281 7.95733 11.7692 8.4266C12.2103 8.89587 12.8104 9.16697 13.4413 9.1819V9.1819ZM26.1163 9.178C26.7611 9.178 27.3795 8.9116 27.8354 8.43742C28.2914 7.96323 28.5475 7.3201 28.5475 6.6495C28.5475 5.9789 28.2914 5.33577 27.8354 4.86158C27.3795 4.38739 26.7611 4.121 26.1163 4.121C25.4714 4.121 24.853 4.38739 24.3971 4.86158C23.9411 5.33577 23.685 5.9789 23.685 6.6495C23.685 7.3201 23.9411 7.96323 24.3971 8.43742C24.853 8.9116 25.4714 9.178 26.1163 9.178V9.178Z" fill="#2288FF"></path></svg>
                                            <span class="tooltip-text" style="flex-grow:1">
                                                <b>Chat Zalo</b>
                                                <small>(8h00 - 22h00)</small>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 col-md-6 mb-3 mb-md-3 pr-1">
                                         <a class="btn btn-outline-success btn-sm fish-contact-item--icon hover-fill-white" href="tel:0918982338" rel="nofollow">
                                             <svg fill="#198754" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" stroke="#198754"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M11.748 5.773S11.418 5 10.914 5c-.496 0-.754.229-.926.387S6.938 7.91 6.938 7.91s-.837.731-.773 2.106c.054 1.375.323 3.332 1.719 6.058 1.386 2.72 4.855 6.876 7.047 8.337 0 0 2.031 1.558 3.921 2.191.549.173 1.647.398 1.903.398.26 0 .719 0 1.246-.385.536-.389 3.543-2.807 3.543-2.807s.736-.665-.119-1.438c-.859-.773-3.467-2.492-4.025-2.944-.559-.459-1.355-.257-1.699.054-.343.313-.956.828-1.031.893-.112.086-.419.365-.763.226-.438-.173-2.234-1.148-3.899-3.426-1.655-2.276-1.837-3.02-2.084-3.824a.56.56 0 0 1 .225-.657c.248-.172 1.161-.933 1.161-.933s.591-.583.344-1.27-1.906-4.716-1.906-4.716z"></path></g></svg>
                                             <span class="tooltip-text" style="flex-grow:1">
                                                <b>0918.982.338</b>
                                                <small>(8h00 - 22h00)</small>
                                            </span>
                                        </a>
                                    </div>
                                    <div class="col-6 col-md-6 mb-3 mb-md-3 pl-1">
                                         <a class="btn btn-outline-success btn-sm fish-contact-item--icon hover-fill-white" href="tel:0967253036" style="width:100%">
                                             <svg fill="#198754" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" stroke="#198754"><g id="SVGRepo_bgCarrier1" stroke-width="0"></g><g id="SVGRepo_tracerCarrier1" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier1"><path d="M11.748 5.773S11.418 5 10.914 5c-.496 0-.754.229-.926.387S6.938 7.91 6.938 7.91s-.837.731-.773 2.106c.054 1.375.323 3.332 1.719 6.058 1.386 2.72 4.855 6.876 7.047 8.337 0 0 2.031 1.558 3.921 2.191.549.173 1.647.398 1.903.398.26 0 .719 0 1.246-.385.536-.389 3.543-2.807 3.543-2.807s.736-.665-.119-1.438c-.859-.773-3.467-2.492-4.025-2.944-.559-.459-1.355-.257-1.699.054-.343.313-.956.828-1.031.893-.112.086-.419.365-.763.226-.438-.173-2.234-1.148-3.899-3.426-1.655-2.276-1.837-3.02-2.084-3.824a.56.56 0 0 1 .225-.657c.248-.172 1.161-.933 1.161-.933s.591-.583.344-1.27-1.906-4.716-1.906-4.716z"></path></g></svg>
                                             <span class="tooltip-text" style="flex-grow:1">
                                                <b>0967.25.30.36</b>
                                                <small>(8h00 - 22h00)</small>
                                            </span>
                                         </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-12 col-xl-3">
                        <section class="prodetail__wrapper prodetail__overview_imginfo prodetail__overview_imginfo_right">
                            <div class="prodetail__overview__right_tabinfo">    
                                <article class="card prodetail__overview__tabinfo prodetail__overview__tabinfo--border-color-red mb-4 shadow-sm p-3">
                                    <div class="dcontent">
                                        <p><img src="/img/money.png" style="width:25px;" /> Giá sỉ & lẻ tốt nhất thị trường</p>
                                        <p><img src="/img/truck.png" style="width:25px;" /> Giao hàng tận nơi trên toàn quốc</p>
                                        <p><img src="/img/like.png" style="width:25px;" /> Con giống khỏe - đều - đẹp, đảm bảo sản lượng</p>
                                        <p><img src="/img/tongdai.png" style="width:25px;" /> Tư vấn hỗ trợ miễn phí</p>
                                    </div>
                                </article>  
                            </div>
                        </section>
                    </div>                    
                </div>
                <section class="hbox-highlight home-boxproduct prodetail-boxdexuat">   
                     <h2 class="hboxproduct__title">Thông Tin Chi Tiết</h2>                                             
                        <div class="col-12 prodetail__text_container order-2 order-lg-1 pe-lg-4">                           
                            <div class="prodetail__box">                                
                                <div class="prodetail__box__content">
                                    <div class="dcontent prodetail__box__content_collapse" id="dvThongTinCa">
                                    	<?php
	                                        require_once 'connect.php';
	                                        if (isset($_GET['name'])) {
	                                            $duongDan = $_GET['name'];                      
	                                            $html = "";
	                                            $db = new Connect();
	                                            
	                                            // Thực hiện truy vấn SQL
	                                            $sql = "SELECT * FROM cagiong WHERE duongdanca = '" . $duongDan . "'";
	                                            $table = $db->getTable($sql);

	                                            if ($table !== false && count($table) > 0) {
	                                                $row = $table[0]; // Lấy dòng dữ liệu đầu tiên                                
	                                                $html .= $row['thongtinca'];
	                                            } else {
	                                                $html .= "Không tìm thấy kết quả.";
	                                            }

	                                            // In nội dung HTML
	                                            echo $html;
	                                        }
	                                    ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="hbox-highlight home-boxproduct prodetail-boxdexuat">
                        <h2 class="hboxproduct__title">Các Loại Cá Khác</h2>
                        <div class="owl-carousel owl-theme product__container no-countdown owl-loaded owl-drag" id="dvLoaiCaKhac">
                        	<?php
	                            require_once 'connect.php';
	                            if (isset($_GET['name'])) {
	                                $duongDan = $_GET['name'];                      
	                                $html = "";
	                                $loaiCa = "";
	                                $linkDeMucCa = "";
	                                $db = new Connect();
	                                
	                                // Thực hiện truy vấn SQL
	                                $sql = "SELECT * FROM cagiong WHERE duongdanca = '" . $duongDan . "'";
	                                $table = $db->getTable($sql);
	                                $row = $table[0];

	                                switch ($row['loaica']) {
	                                    case '1':
	                                        $loaiCa = "Cá Giống Nước Ngọt";
	                                        $linkDeMucCa = "/ca-giong/";
	                                        break;
	                                    case '2':
	                                        $loaiCa = "Cá Kiểng";
	                                        $linkDeMucCa = "/ca-kieng/";
	                                        break;
	                                    case '3':
	                                        $loaiCa = "Cá Bột";
	                                        $linkDeMucCa = "/ca-bot/";
	                                        break;
	                                }                            
	                                $sqlca = "
	                                    SELECT * FROM cagiong cg
	                                    LEFT JOIN hinhanhca ha ON cg.idca = ha.idca
	                                    WHERE cg.loaica = '" . $row['loaica'] . "'
	                                    AND (ha.idloai = '" . $row['loaica'] . "' OR ha.idca IS NULL)
	                                    AND cg.danhmucCha = '0'
	                                    AND cg.idca != '" . $row['idca'] . "'
	                                    ORDER BY cg.idca
	                                ";
	                                $tableca = $db->getTable($sqlca);
	                                if ($tableca !== false && count($tableca) > 0) {                                
	                                   foreach ($tableca as $rowca) {
	                                    $imgSrc = !empty($rowca['urlhinh']) ? '/' . $rowca['urlhinh'] : '/img/default-400_400.webp';
	                                    $html .= "
	                                    <div class='item proitem prosaleoff__item'>
	                                        <div class='probox  boxproid__20058 boxprobrand__apple boxprotype__product pro__group806 pro__main807 pro__ctl1634 prolink--515  probox--pricemin-5 probox--pricemin-10 probox--pricemin-20 probox--nottratruoc  price-show-gianiemyet'>
	                                            <a href='" . $linkDeMucCa . $rowca['duongdanca'] . "' class='box'>
	                                                <div class='probox__img'>
	                                                    <figure class='mb-0 position-relative'>
	                                                        <img data-src='$imgSrc' src='/img/default-400_400.webp' alt='" . $rowca['tenca'] . "' class='lazy img-full img-responsive probox__img_img' width='205' height='205'>
	                                                    </figure>
	                                                </div>
	                                                <div class='probox__des'>
	                                                    <h3 class='probox__title' data-bs-toggle='tooltip' data-bs-placement='top' data-bs-custom-class='product-title-tooltip' data-bs-title='" . $rowca['tenca'] . "'>" . $rowca['tenca'] . "</h3>
	                                                    <div class='probox__pricebox'>
	                                                        <p class='probox__price pr-1'>
	                                                            <b class='price'>Giá: Liên Hệ</b>
	                                                            <span class='text-center mb-3 mb-md-4 mb-lg-5'>
	                                                                <a href='" . $linkDeMucCa . $rowca['duongdanca'] . "' class='btn btn-outline-viewall-product'>Thông tin<i class='fas fa-info-circle'></i></a>
	                                                            </span>
	                                                        </p>
	                                                    </div>
	                                                </div>
	                                            </a>
	                                        </div>
	                                    </div>";
	                                }                        
	                            }
	                        }
	                        echo $html;
                        ?>
                        </div>
                    </section>
            </div>                              
        </div>
    </aside>
    <script src="/js/cagiong.js"></script>
<?php include 'footer.php'; ?>