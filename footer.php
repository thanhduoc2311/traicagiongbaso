<script src="/js/lightgallery-all.min.js"></script>
    <script>
        $(document).ready(function() {        
            $('.homebanner_ver__group').scrollToFixed({
                marginTop: $( '#header').height() + 30,
                limit: 0,
                zIndex: 99,
            });        
        });        
    </script>
    <footer class="clearfix animatedParent " data-sequence="250" id="footer">
        <section class="footer_intro footer__navigation">
            <div class="container">
                <div class="row">      
                    <div class="col-12 col-lg footer_nav footer_nav--contact d-none d-lg-block">                
                        <p class="footer__title mb-3">Hỗ trợ khách hàng</p>
                        <p class="row row-cols-2 row-cols-xl-2 footer-boxitem-action footer-boxitem-action--navlink mb-4">
                            <span class="col">
                                <a href="/lien-he/" class="footer-boxitem-action-item footer-boxitem-action-item--link header__action__icon_store">Địa chỉ <b>Trại cá</b></a>
                            </span>                        
                        </p>                                                      
                    </div>
                    <div class="col-12 col-lg-4 col-xl-4 footer__navigation--link">
                        <div class="footer_nav_boxitem">      
                            <p class="footer__title mb-3">Tổng đài liên hệ (24/7)</p>      
                            <p class="row row-cols-2 row-cols-xl-3 footer-boxitem-action footer-boxitem-action--navaction">            
                                <span class="col">
                                    <a href="tel:0918982338" class="footer-boxitem-action-item footer-boxitem-action-item--action" target="_blank">Hotline <b class="icon-phone">0918982338</b></a>
                                </span>
                                <span class="col">
                                    <a href="tel:0967253036" class="footer-boxitem-action-item footer-boxitem-action-item--action" target="_blank">Hotline <b class="icon-phone">0967253036</b></a>
                                </span>
                            </p>     
                        </div>        
                    </div>
                    <div class="col-12 col-lg-2 footer_nav d-none d-lg-block">
                        <div class="footer_nav_boxitem">            
                            <p class="footer__title">Về chúng tôi</p>
                            <ul class="footer_ul footer_ul--icon">
                                <li>
                                    <a href="/gioi-thieu/">Giới thiệu</a>
                                </li>
                                <li>
                                    <a href="/tin-tuc/">Tin tức</a>
                                </li>
                            </ul>                  
                        </div>        
                    </div>
                    <div class="col-12 col-lg-3 d-none d-lg-block footer_social_payment">                             
                        <p class="footer__title mb-3cp text-red">
                            Liên kết với Trại Cá Giống Ba So
                        </p>      
                        <ul class="footer_social">
                            <li>
                                <a href="http://zalo.me/0918982338" target="_blank">
                                    <img src="/img/icon-zalo.webp" alt="Zalo Trại cá giống Ba So" class="">
                                </a>
                            </li>
                            <li>
                                <a href="https://www.facebook.com/traicagiongbaso/" target="_blank" class="bg-fb" aria-label="Social">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </li>                               
                            <li>
                                <a href="http://m.me/traicagiongbaso" target="_blank" aria-label="Social">
                                    <img src="/img/messenger.png" alt="Messenger Trại cá giống Ba So" class="">
                                </a>
                            </li>
                        </ul>      
                    </div>
                </div>
            </div>
        </section>                      
        <section class="footer_intro footer_infotext">
            <div class="container">    
                <div class="footer_text dcontent text-center"><p>Copy Right &copy; 2024 Trại cá giống Ba So. Design By Thái Thành Được.</p>    
                    <p>Địa chỉ: 3/135 Ấp Bình An B, Xã Lợi Bình Nhơn, Thành Phố Tân An, Tỉnh Long An, Việt Nam.</p>    
                    <p>Điện thoại: <strong><span style="color:#e74c3c"><u><a href="tel:0918982338">0918982338</a></u></span></strong></p>
                </div>    
            </div>
        </section>    
    </footer>    
    </body>    
    <script type="text/javascript" src="/js/jquery-scrolltofixed-min.js"></script>
    <script type="text/javascript" src="/js/jquery.sticky.js"></script>
    <script type="text/javascript" src="/js/jquery.countdown.min.js"></script>
    <script type="text/javascript" src="/js/functions.js"></script>
    <aside class="mobile-navigation">
        <nav role="nav" class="mobile-navigation-navgroup">
            <ul class="mobile-navigation-navgroup-ul">
                <li class="mobile-navigation-navgroup-li">
                    <a href="/" class="mobile-navigation-navlink mobile-navigation-navlink--home active focus">Trang chủ</a>
                </li>
                <li class="mobile-navigation-navgroup-li">
                    <button type="button" class="mobile-navigation-navlink mobile-navigation-navlink--category" data-bs-toggle="offcanvas" data-bs-target="#offcanvas-mobilenav-ctl-wrapper" aria-controls="offcanvas-mobilenav-ctl-wrapper">
                        Danh mục
                    </button>
                </li>                
                <li class="mobile-navigation-navgroup-li">
                    <a href="/gioi-thieu/" class="mobile-navigation-navlink mobile-navigation-navlink--intro">Giới thiệu</a>
                </li>
                <li class="mobile-navigation-navgroup-li">
                    <a href="/hinh-anh/" class="mobile-navigation-navlink mobile-navigation-navlink--images">Hình ảnh</a>
                </li>
                <li class="mobile-navigation-navgroup-li">
                    <button type="button" class="mobile-navigation-navlink mobile-navigation-navlink--other" data-bs-toggle="offcanvas" data-bs-target="#offcanvas-mobilenav-other-wrapper" aria-controls="offcanvas-mobilenav-other-wrapper">
                        Xem thêm
                    </button>
                </li>
            </ul>
        </nav>
        <section class="offcanvas offcanvas-bottom offcanvas-mobilenav-wrapper" data-bs-backdrop="static" tabindex="-1" id="offcanvas-mobilenav-ctl-wrapper" aria-labelledby="offcanvas-mobilenav-wrapperLabel">
            <div class="offcanvas-body p-0">
                <div class=" d-flex align-items-start flex-nowrap">                
                    <div class="nav flex-column nav-pills " id="mobilenav-tabmain" role="tablist" aria-orientation="vertical">
                        <nav role="listitem" class="mobilenav-tabmain-wrapper" id="nvDanhMucMobile">
                            <?php
                                require_once 'connect.php'; // Đảm bảo đường dẫn chính xác

                                // Tạo đối tượng Connect
                                $db = new Connect();

                                // Câu lệnh SQL để lấy dữ liệu
                                $sqldm = "SELECT * FROM danhmuc";
                                $tabledm = $db->getTable($sqldm);

                                // Khởi tạo biến html
                                $html = "";

                                // Xử lý dữ liệu và tạo HTML
                                if (!empty($tabledm)) {
                                    foreach ($tabledm as $row) {
                                        if ($row["idloai"] == "1" || $row["idloai"] == "2" || $row["idloai"] == "3") {
                                            $html .= "<button class='nav-link nav-link--item" . $row["idloai"] . " " . ($row["idloai"] == "1" ? "active" : "") . "' id='mobilenav-tab-" . $row["idloai"] . "' data-bs-toggle='pill' data-bs-target='#mobilenav-content-" . $row["idloai"] . "' type='button' role='tab' aria-controls='mobilenav-content-" . $row["idloai"] . "' aria-selected='true'>
                                                <figure><img data-src='/" . $row["LinkAnh"] . "' alt='" . $row["tenloai"] . "' class='lazy' width='40' height='40'></figure>
                                                " . $row["tenloai"] . "
                                            </button>";
                                        } else {
                                            switch ($row["idloai"]) {
                                                case "4":
                                                    $href = "/hinh-anh/";
                                                    break;
                                                case "5":
                                                    $href = "/gioi-thieu/";
                                                    break;
                                                case "6":
                                                    $href = "/lien-he/";
                                                    break;
                                                case "7":
                                                    $href = "/tin-tuc/";
                                                    break;
                                                default:
                                                    $href = "#";
                                            }
                                            $html .= "<a class='nav-link nav-link--item" . $row["idloai"] . "' href='" . $href . "' aria-selected='false' tabindex='-1' role='tab'>
                                                <figure><img data-src='/" . $row["LinkAnh"] . "' alt='" . $row["tenloai"] . "' class='lazy' width='40' height='40'></figure>
                                                " . $row["tenloai"] . "
                                            </a>";
                                        }
                                    }
                                }
                                echo $html;
                                // Đóng kết nối
                                $db->closeConnection();
                                ?>

                        </nav>
                    </div>
                    <div class="tab-content" id="nvMainContentMobile">
                        <?php
                        require_once 'connect.php'; // Đảm bảo đường dẫn chính xác

                        // Tạo đối tượng Connect
                        $db = new Connect();

                        // Khởi tạo biến html và duongdan
                        $html = "";
                        $duongdan = "";

                        // Lấy dữ liệu từ bảng danhmuc
                        $sqldm = "SELECT idloai FROM danhmuc";
                        $tabledm = $db->getTable($sqldm);

                        if (!empty($tabledm)) {
                            foreach ($tabledm as $rowdm) {
                                $idloai = $rowdm["idloai"];
                                
                                $html .= "<div class='tab-pane show " . ($idloai == "1" ? "active" : "") . "' id='mobilenav-content-" . $idloai . "' role='tabpanel' aria-labelledby='mobilenav-tab-" . $idloai . "' tabindex='0'>
                                    <ul class='mobilenav-content-boxitem'>";

                                // Lấy dữ liệu từ bảng cagiong với điều kiện
                                $sql = "SELECT cg.*, ha.urlhinh 
                                        FROM cagiong cg
                                        LEFT JOIN hinhanhca ha ON cg.idca = ha.idca AND ha.idloai = $idloai
                                        WHERE cg.loaica = $idloai AND cg.idca NOT IN (
                                            SELECT DISTINCT danhmucCha
                                            FROM cagiong
                                            WHERE danhmucCha != 0
                                        )
                                        AND cg.danhmucCha = 0

                                        UNION

                                        SELECT cg.*, ha.urlhinh 
                                        FROM cagiong cg
                                        LEFT JOIN hinhanhca ha ON cg.idca = ha.idca AND ha.idloai = $idloai
                                        WHERE cg.loaica = $idloai AND cg.danhmucCha != 0;";
                                
                                $table = $db->getTable($sql);

                                if (!empty($table)) {
                                    foreach ($table as $row) {
                                        $loaica = $row["loaica"];
                                        $duongdanca = $row["duongdanca"];
                                        
                                        switch ($loaica) {
                                            case "1":
                                                $duongdan = "/ca-giong/" . $duongdanca;
                                                break;
                                            case "2":
                                                $duongdan = "/ca-kieng/" . $duongdanca;
                                                break;
                                            case "3":
                                                $duongdan = "/ca-bot/" . $duongdanca;
                                                break;
                                            default:
                                                $duongdan = "#"; // Thay thế bằng giá trị mặc định nếu cần
                                        }
                                        
                                        $urlhinh = !empty($row["urlhinh"]) ? $row["urlhinh"] : "img/default-400_400.webp";
                                        $tenca = $row["tenca"];

                                        $html .= "<li>
                                            <a href='" . $duongdan . "' class='mobilenav-content-boxitem-navlink'>
                                                <figure class='mobilenav-content-boxitem-navlink-img'>
                                                    <img data-src='/" . $urlhinh . "' src='/img/default-400_400.webp' class='lazy' alt='" . $tenca . "'>
                                                </figure>
                                                <figcaption class='mobilenav-content-boxitem-navlink-img-caption line-limit'>" . $tenca . "</figcaption>                                                           
                                            </a>
                                        </li>";
                                    }
                                }
                                
                                $html .= "</ul>
                                </div>";
                            }
                        }
                         echo $html;
                        // Đóng kết nối
                        $db->closeConnection();

                        ?>

                    </div>
                </div>
            </div>
        </section>
        <section class="offcanvas offcanvas-bottom offcanvas-mobilenav-wrapper" data-bs-backdrop="static" tabindex="-1" id="offcanvas-mobilenav-other-wrapper" aria-labelledby="offcanvas-mobilenav-other-wrapperLabel">
            <div class="offcanvas-body p-0 offcanvas-other">            
                <section class="footer_intro footer__navigation">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-lg-4 col-xl-4 footer__navigation--link">
                                <div class="footer_nav_boxitem">
                                    <p class="footer__title mb-3">Hỗ trợ khách hàng</p>
                                    <p class="row row-cols-2 row-cols-xl-2 footer-boxitem-action footer-boxitem-action--navlink mb-4" style="margin-bottom:0px!important">
                                        <span class="col">
                                            <a href="/lien-he/" class="footer-boxitem-action-item footer-boxitem-action-item--link header__action__icon_store">Địa chỉ <b>Trại cá</b></a>
                                        </span>
                                    </p> 
                                </div>                               
                            </div>
                            <div class="col-12 col-lg footer_nav footer_nav--contact d-none d-lg-block">
                                <div class="footer_nav_boxitem">
                                    <p class="footer__title mb-3">Tổng đài liên hệ (24/7)</p>
                                    <p class="row row-cols-2 row-cols-xl-3 footer-boxitem-action footer-boxitem-action--navaction" style="margin-bottom:0px!important">
                                        <span class="col">
                                            <a href="tel:0918982338" class="footer-boxitem-action-item footer-boxitem-action-item--action" target="_blank">Hotline <b class="icon-phone">0918982338</b></a>
                                        </span>
                                        <span class="col">
                                            <a href="tel:0967253036" class="footer-boxitem-action-item footer-boxitem-action-item--action" target="_blank">Hotline <b class="icon-phone">0967253036</b></a>
                                        </span>
                                    </p>  
                                </div>                                   
                            </div>
                        <div class="col-12 col-lg-2 footer_nav d-none d-lg-block">
                            <div class="footer_nav_boxitem">
                                <p class="footer__title">Về chúng tôi</p>
                                <ul class="footer_ul footer_ul--icon">
                                    <li>
                                        <a href="/gioi-thieu/">Giới thiệu</a>
                                    </li>
                                    <li>
                                        <a href="/tin-tuc">Tin tức</a>
                                    </li>                                    
                                </ul>
                                </div>              
                            </div>
                            <div class="col-12 col-lg-3 d-none d-lg-block footer_social_payment">              
                                <p class="footer__title mb-3cp text-red">
                                    Liên kết với Trại Cá Giống Ba So
                                </p>
                                <ul class="footer_social">
                                    <li>
                                        <a href="http://zalo.me/0918982338" target="_blank">
                                            <img src="/img/icon-zalo.webp" alt="Zalo Trại cá giống Ba So" class="">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.facebook.com/traicagiongbaso/" target="_blank" class="bg-fb" aria-label="Social">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                    </li>                               
                                    <li>
                                        <a href="https://www.facebook.com/messages/t/traicagiongbaso" target="_blank" aria-label="Social">
                                            <img src="/img/messenger.png" alt="Messenger Trại cá giống Ba So" class="">
                                        </a>
                                    </li>                                            
                                </ul>                                                        
                            </div>
                        </div>
                    </div>
                </section>
                <section class="footer_intro footer_infotext">
                    <div class="container">
                        <div class="footer_text dcontent text-center">
                            <p>Copy Right &copy;. Design By Thái Thành Được.</p>
                            <p>Địa chỉ: 3/135 Ấp Bình An B, Xã Lợi Bình Nhơn, Thành Phố Tân An, Tỉnh Long An, Việt Nam.</p>
                            <p>Điện thoại: <strong><span style="color:#e74c3c"><u><a href="tel:0918982338">0918982338</a></u></span></strong></p>
                        </div>
                    </div>
                </section>
            </div>
        </section>
        <section class="offcanvas offcanvas-bottom offcanvas-mobilenav-wrapper" data-bs-backdrop="static" tabindex="-1" id="offcanvas-mobilenav-other-wrapper" aria-labelledby="offcanvas-mobilenav-other-wrapperLabel">
            <div class="offcanvas-body p-0 offcanvas-other">
                <section class="footer_intro footer__navigation">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-lg-4 col-xl-4 footer__navigation--link ">                                                  
                            </div>                                
                        </div>
                    </div>
                </section>
                <section class="footer_intro footer_infotext">
                    <div class="container">
                        <div class="footer_text dcontent text-center"><p>Copy Right &copy; 2024 Trại cá giống Ba So. Design By Thái Thành Được.</p>
                            <p>Địa chỉ: 3/135 Ấp Bình An B, Xã Lợi Bình Nhơn, Thành Phố Tân An, Tỉnh Long An, Việt Nam.</p>
                            <p>Điện thoại: <strong><span style="color:#e74c3c"><u><a href="tel:0918982338">0918982338</a></u></span></strong></p>
                        </div>
                    </div>
                </section>
            </div>
        </section>
    </aside>
    <script>
        if (!!window.IntersectionObserver) {
            let observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {                        
                        entry.target.src = entry.target.dataset.src;
                        observer.unobserve(entry.target);
                    }
                });
            }, {threshold: 0.5 });
            document.querySelectorAll('.lazy').forEach(img => { observer.observe(img) });
        }
    </script>
    <script>
    $( window ).on("load", function() {
        if (window.location.href === 'https://cagiongbaso.com/' || window.location.href === 'https://cagiongbaso.com') {
            $('.mobile-navigation-navlink--home').addClass('filter-none');
            $('.mobile-navigation-navlink--home').addClass('active');
        }
        if (window.location.href.includes('/gioi-thieu/')) {  
            $('.mobile-navigation-navlink--home').removeClass('active');                      
            $('.mobile-navigation-navlink--intro').addClass('active');
        }
        if (window.location.href.includes('/hinh-anh/')) {            
            $('.mobile-navigation-navlink--home').removeClass('active');                 
            $('.mobile-navigation-navlink--images').addClass('active');
        }
    });    

    $('.mobile-navigation-navlink--other').on( 'click', function(){
        $('#offcanvas-mobilenav-ctl-wrapper').removeClass('show');
        const offcanvas = document.getElementById('offcanvas-mobilenav-other-wrapper');
        const isShown = offcanvas.classList.contains('show');

        if (!isShown) {
            $('#offcanvas-mobilenav-other-wrapper').addClass('show');
            $('.mobile-navigation-navgroup .mobile-navigation-navlink').removeClass( 'active');
            $('.mobile-navigation-navgroup .mobile-navigation-navlink').removeClass( 'filter-none');
            $('body').addClass('offcanvas-mobilenav-show');
            $('html').css('overflow', 'hidden');
            $('.mobile-navigation-navlink--other').addClass('active');
        } else {
            $('#offcanvas-mobilenav-other-wrapper').removeClass('show');
            $('body').removeClass('offcanvas-mobilenav-show');
            $('html').css('overflow', '');        
            $('.mobile-navigation-navlink--other').removeClass('active');
            checkNav();
        }
    });

    $('.mobile-navigation-navlink--category').on( 'click', function(){
        $('#offcanvas-mobilenav-other-wrapper').removeClass('show');
        const offcanvasbell = document.getElementById('offcanvas-mobilenav-ctl-wrapper');
        const isShownbell = offcanvasbell.classList.contains('show');

        if (!isShownbell) {
            $('#offcanvas-mobilenav-ctl-wrapper').addClass('show');
            $('body').addClass('offcanvas-mobilenav-show');
            $('html').css('overflow', 'hidden');
            $('.mobile-navigation-navgroup .mobile-navigation-navlink').removeClass('active');
            $('.mobile-navigation-navgroup .mobile-navigation-navlink').removeClass('filter-none');
            $('.mobile-navigation-navlink--category').addClass('active');
        } else {
            $('#offcanvas-mobilenav-ctl-wrapper').removeClass('show');
            $('body').removeClass('offcanvas-mobilenav-show');  
            $('html').css('overflow', '');
            $('.mobile-navigation-navlink--category').removeClass('active');        
            checkNav();
        }
    });
    function checkNav()
    {
        if(!$('.mobile-navigation-navlink--category').hasClass('active') && !$('.mobile-navigation-navlink--other').hasClass('active'))
        {
            if (window.location.href === 'https://cagiongbaso.com/' || window.location.href === 'https://cagiongbaso.com') {
                $('.mobile-navigation-navlink--home').addClass('active');
            }
            if (window.location.href.includes('/gioi-thieu/')) {                     
                $('.mobile-navigation-navlink--intro').addClass('active');
            }
            if (window.location.href.includes('/hinh-anh/')) {                     
                $('.mobile-navigation-navlink--images').addClass('active');
            }
        }        
    }
    $(document).ready(function(){        
        checkNav();
    });
    </script>
    <div class="bubble-contact-wrapper">
        <div class="bubble-contact-listing-wrapper" style="display: none;">
            <div class="bubble-contact-action">
                <ul class="bubble-contact-listing">
                    <li class="bubble-contact-item bubble-contact-item-zalo">
                        <a aria-label="phone" class="bubble-contact-item--icon" href="http://zalo.me/0918982338" rel="nofollow">
                            <svg xmlns="http://www.w3.org/2000/svg" width="31" height="11" viewBox="0 0 31 11" fill="none"><path d="M15.8625 3.2266V2.6416H17.5462V10.8602H16.5838C16.3932 10.8605 16.2103 10.7823 16.0751 10.6427C15.94 10.5031 15.8635 10.3134 15.8625 10.1153V10.1166C15.1597 10.6517 14.311 10.9395 13.44 10.9382C12.3517 10.9382 11.308 10.4888 10.5382 9.6887C9.76844 8.88863 9.33566 7.80341 9.335 6.6716C9.33566 5.53979 9.76844 4.45457 10.5382 3.6545C11.308 2.85443 12.3517 2.405 13.44 2.405C14.3106 2.40398 15.1588 2.69179 15.8613 3.2266H15.8625V3.2266ZM8.89875 0V0.2665C8.89875 0.7631 8.835 1.1687 8.52375 1.6445L8.48625 1.6887C8.38255 1.80964 8.28169 1.93318 8.18375 2.0592L2.78 9.113H8.89875V10.1114C8.89875 10.2098 8.88009 10.3073 8.84382 10.3983C8.80756 10.4892 8.75442 10.5718 8.68742 10.6413C8.62043 10.7109 8.54091 10.766 8.45342 10.8036C8.36592 10.8411 8.27216 10.8604 8.1775 10.8602H0.25V10.3896C0.25 9.8137 0.3875 9.5563 0.5625 9.2885L6.32125 1.872H0.49V0H8.9H8.89875ZM19.5875 10.8602C19.4284 10.8602 19.2758 10.7945 19.1632 10.6774C19.0507 10.5604 18.9875 10.4017 18.9875 10.2362V0H20.7887V10.8602H19.5875V10.8602ZM26.1163 2.353C26.6589 2.35283 27.1963 2.46383 27.6978 2.67965C28.1992 2.89548 28.6549 3.21191 29.0387 3.61088C29.4226 4.00984 29.7271 4.48353 29.935 5.0049C30.1428 5.52627 30.2498 6.0851 30.25 6.6495C30.2502 7.21389 30.1434 7.7728 29.9359 8.2943C29.7284 8.81579 29.4241 9.28967 29.0405 9.68888C28.6569 10.0881 28.2014 10.4048 27.7001 10.621C27.1988 10.8371 26.6614 10.9484 26.1187 10.9486C25.0227 10.9489 23.9715 10.4965 23.1963 9.69072C22.421 8.88497 21.9853 7.79195 21.985 6.6521C21.9847 5.51225 22.4197 4.41895 23.1945 3.61271C23.9693 2.80648 25.0202 2.35335 26.1163 2.353V2.353ZM13.4413 9.1819C13.7629 9.18951 14.0828 9.13019 14.3822 9.00743C14.6815 8.88466 14.9542 8.70092 15.1843 8.46701C15.4144 8.23309 15.5972 7.95371 15.7221 7.64528C15.8469 7.33685 15.9112 7.00559 15.9112 6.67095C15.9112 6.33631 15.8469 6.00505 15.7221 5.69662C15.5972 5.38819 15.4144 5.10881 15.1843 4.87489C14.9542 4.64098 14.6815 4.45724 14.3822 4.33447C14.0828 4.21171 13.7629 4.15239 13.4413 4.16C12.8104 4.17493 12.2103 4.44603 11.7692 4.9153C11.3281 5.38456 11.0812 6.01473 11.0812 6.67095C11.0812 7.32717 11.3281 7.95733 11.7692 8.4266C12.2103 8.89587 12.8104 9.16697 13.4413 9.1819V9.1819ZM26.1163 9.178C26.7611 9.178 27.3795 8.9116 27.8354 8.43742C28.2914 7.96323 28.5475 7.3201 28.5475 6.6495C28.5475 5.9789 28.2914 5.33577 27.8354 4.86158C27.3795 4.38739 26.7611 4.121 26.1163 4.121C25.4714 4.121 24.853 4.38739 24.3971 4.86158C23.9411 5.33577 23.685 5.9789 23.685 6.6495C23.685 7.3201 23.9411 7.96323 24.3971 8.43742C24.853 8.9116 25.4714 9.178 26.1163 9.178V9.178Z" fill="#2288FF"></path></svg>
                            <span class="tooltip-text">
                                <b>Chat Zalo</b>
                                <small>(8h00 - 22h00)</small>
                            </span>
                        </a>
                    </li>
                    <li class="bubble-contact-item bubble-contact-item-phone">
                        <a aria-label="phone" class="bubble-contact-item--icon" href="tel:0918982338" rel="nofollow">
                            <svg xmlns="http://www.w3.org/2000/svg" width="33" height="32" viewBox="0 0 33 32" fill="none"><circle cx="16.0156" cy="16" r="16" fill="#F5F5F7"></circle><path d="M12.5904 18.5222C13.2627 19.1991 13.9751 19.8109 14.7277 20.3575C15.4803 20.899 16.2329 21.3277 16.9855 21.6436C17.743 21.9645 18.4605 22.125 19.1378 22.125C19.6044 22.125 20.0359 22.0423 20.4323 21.8768C20.8286 21.7113 21.1899 21.4531 21.516 21.1021C21.6966 20.8965 21.8446 20.6734 21.96 20.4327C22.0804 20.192 22.1406 19.9513 22.1406 19.7106C22.1406 19.5401 22.103 19.3746 22.0277 19.2142C21.9575 19.0487 21.8371 18.9083 21.6665 18.793L19.4765 17.2511C19.321 17.1357 19.1729 17.053 19.0325 17.0029C18.897 16.9477 18.764 16.9201 18.6336 16.9201C18.4781 16.9201 18.3225 16.9628 18.167 17.048C18.0165 17.1332 17.861 17.2561 17.7004 17.4165L17.1886 17.913C17.1134 17.9882 17.0231 18.0258 16.9177 18.0258C16.8625 18.0258 16.8098 18.0183 16.7597 18.0032C16.7145 17.9832 16.6719 17.9656 16.6317 17.9506C16.416 17.8352 16.135 17.6347 15.7888 17.3489C15.4427 17.063 15.0915 16.7421 14.7352 16.3861C14.379 16.0301 14.0554 15.6791 13.7644 15.3331C13.4784 14.9821 13.2802 14.6988 13.1699 14.4832C13.1498 14.4431 13.1322 14.4004 13.1172 14.3553C13.1021 14.3102 13.0946 14.26 13.0946 14.2049C13.0946 14.1046 13.1297 14.0193 13.2 13.9491L13.7042 13.4302C13.8648 13.2597 13.9877 13.0992 14.073 12.9488C14.1583 12.7984 14.2009 12.6404 14.2009 12.4749C14.2009 12.3496 14.1708 12.2192 14.1106 12.0838C14.0554 11.9434 13.9726 11.793 13.8622 11.6325L12.3496 9.49642C12.2241 9.32593 12.0761 9.20057 11.9055 9.12034C11.7349 9.04011 11.5543 9 11.3637 9C10.882 9 10.428 9.20559 10.0015 9.61676C9.66034 9.94771 9.40948 10.3163 9.24892 10.7224C9.09339 11.1236 9.01562 11.5498 9.01562 12.0011C9.01562 12.678 9.17116 13.3926 9.48222 14.1447C9.79831 14.8968 10.2248 15.6465 10.7616 16.3936C11.3035 17.1408 11.9131 17.8503 12.5904 18.5222Z" fill="#339901"></path></svg>
                            <span class="tooltip-text">
                                <b>0918982338</b>
                                <small>(8h00 - 22h00)</small>
                            </span>
                        </a>
                    </li>
                    <li class="bubble-contact-item bubble-contact-item-phone">
                        <a aria-label="phone" class="bubble-contact-item--icon" href="http://m.me/traicagiongbaso" rel="nofollow">
                            <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" viewBox="0 0 38 38" fill="none"><circle cx="19" cy="19" r="18" stroke="#EAEAEA" stroke-width="2"></circle><g clip-path="url(#clip0_1381_24315)"><path d="M19 11C14.494 11 11 14.302 11 18.76C11 21.092 11.956 23.108 13.512 24.5C13.642 24.616 13.722 24.78 13.726 24.956L13.77 26.38C13.7732 26.4848 13.8021 26.5872 13.8541 26.6782C13.9062 26.7692 13.9798 26.846 14.0684 26.9019C14.1571 26.9578 14.2582 26.991 14.3627 26.9987C14.4673 27.0064 14.5721 26.9883 14.668 26.946L16.256 26.246C16.39 26.186 16.542 26.176 16.684 26.214C17.414 26.414 18.19 26.522 19 26.522C23.506 26.522 27 23.22 27 18.762C27 14.304 23.506 11 19 11Z" fill="url(#paint0_radial_1381_24315)"></path><path d="M14.1958 21.0299L16.5458 17.3019C16.6342 17.1615 16.7507 17.041 16.888 16.948C17.0254 16.8549 17.1805 16.7914 17.3436 16.7613C17.5067 16.7312 17.6743 16.7353 17.8358 16.7733C17.9973 16.8113 18.1491 16.8823 18.2818 16.9819L20.1518 18.3839C20.2352 18.4464 20.3368 18.48 20.4411 18.4797C20.5454 18.4793 20.6467 18.445 20.7298 18.3819L23.2538 16.4659C23.5898 16.2099 24.0298 16.6139 23.8058 16.9719L21.4538 20.6979C21.3654 20.8383 21.2488 20.9588 21.1115 21.0518C20.9742 21.1449 20.819 21.2084 20.6559 21.2385C20.4928 21.2686 20.3252 21.2645 20.1637 21.2265C20.0022 21.1885 19.8504 21.1175 19.7178 21.0179L17.8478 19.6159C17.7643 19.5534 17.6627 19.5198 17.5584 19.5201C17.4541 19.5205 17.3528 19.5548 17.2698 19.6179L14.7458 21.5339C14.4098 21.7899 13.9698 21.3879 14.1958 21.0299V21.0299Z" fill="white"></path></g><defs><radialGradient id="paint0_radial_1381_24315" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(13.68 27) scale(17.6)"><stop stop-color="#0099FF"></stop><stop offset="0.6" stop-color="#A033FF"></stop><stop offset="0.9" stop-color="#FF5280"></stop><stop offset="1" stop-color="#FF7061"></stop></radialGradient><clipPath id="clip0_1381_24315"><rect width="16" height="16" fill="white" transform="translate(11 11)"></rect></clipPath></defs></svg>
                            <span class="tooltip-text">
                                <b>Messenger</b>
                                <small>(8h00 - 22h00)</small>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="bubble-contact-overlay"></div>
        </div>
        <div class="bubble-contact">
            <div class="box-item item-contact">
                <div class="svgico">
                    <svg height="35" viewBox="0 0 34 35" width="34" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4.35522 31V25.416H5.41122V30.064H7.61122V31H4.35522ZM8.97509 26.216C8.76176 26.216 8.60709 26.168 8.51109 26.072C8.42043 25.976 8.37509 25.8533 8.37509 25.704V25.544C8.37509 25.3947 8.42043 25.272 8.51109 25.176C8.60709 25.08 8.76176 25.032 8.97509 25.032C9.18309 25.032 9.33509 25.08 9.43109 25.176C9.52709 25.272 9.57509 25.3947 9.57509 25.544V25.704C9.57509 25.8533 9.52709 25.976 9.43109 26.072C9.33509 26.168 9.18309 26.216 8.97509 26.216ZM8.46309 26.824H9.48709V31H8.46309V26.824ZM12.834 24.712L13.842 25.944L13.33 26.344L12.37 25.424L11.41 26.344L10.898 25.944L11.906 24.712H12.834ZM12.362 31.096C12.0527 31.096 11.7754 31.0453 11.53 30.944C11.29 30.8373 11.0847 30.6907 10.914 30.504C10.7487 30.312 10.6207 30.0827 10.53 29.816C10.4394 29.544 10.394 29.24 10.394 28.904C10.394 28.5733 10.4367 28.2747 10.522 28.008C10.6127 27.7413 10.7407 27.5147 10.906 27.328C11.0714 27.136 11.274 26.9893 11.514 26.888C11.754 26.7813 12.026 26.728 12.33 26.728C12.6554 26.728 12.938 26.784 13.178 26.896C13.418 27.008 13.6154 27.16 13.77 27.352C13.9247 27.544 14.0394 27.768 14.114 28.024C14.194 28.2747 14.234 28.544 14.234 28.832V29.168H11.458V29.272C11.458 29.576 11.5434 29.8213 11.714 30.008C11.8847 30.1893 12.138 30.28 12.474 30.28C12.73 30.28 12.938 30.2267 13.098 30.12C13.2634 30.0133 13.41 29.8773 13.538 29.712L14.09 30.328C13.9194 30.568 13.6847 30.7573 13.386 30.896C13.0927 31.0293 12.7514 31.096 12.362 31.096ZM12.346 27.496C12.074 27.496 11.858 27.5867 11.698 27.768C11.538 27.9493 11.458 28.184 11.458 28.472V28.536H13.17V28.464C13.17 28.176 13.098 27.944 12.954 27.768C12.8154 27.5867 12.6127 27.496 12.346 27.496ZM15.135 31V26.824H16.159V27.52H16.199C16.2843 27.296 16.4176 27.1093 16.599 26.96C16.7856 26.8053 17.0416 26.728 17.367 26.728C17.799 26.728 18.1296 26.8693 18.359 27.152C18.5883 27.4347 18.703 27.8373 18.703 28.36V31H17.679V28.464C17.679 28.1653 17.6256 27.9413 17.519 27.792C17.4123 27.6427 17.2363 27.568 16.991 27.568C16.8843 27.568 16.7803 27.584 16.679 27.616C16.583 27.6427 16.495 27.6853 16.415 27.744C16.3403 27.7973 16.279 27.8667 16.231 27.952C16.183 28.032 16.159 28.128 16.159 28.24V31H15.135ZM21.7287 25.08H22.7527V27.52H22.7927C22.8781 27.296 23.0114 27.1093 23.1927 26.96C23.3794 26.8053 23.6354 26.728 23.9607 26.728C24.3927 26.728 24.7234 26.8693 24.9527 27.152C25.1821 27.4347 25.2967 27.8373 25.2967 28.36V31H24.2727V28.464C24.2727 28.1653 24.2194 27.9413 24.1127 27.792C24.0061 27.6427 23.8301 27.568 23.5847 27.568C23.4781 27.568 23.3741 27.584 23.2727 27.616C23.1767 27.6427 23.0887 27.6853 23.0087 27.744C22.9341 27.7973 22.8727 27.8667 22.8247 27.952C22.7767 28.032 22.7527 28.128 22.7527 28.24V31H21.7287V25.08ZM28.5918 24.712L29.5998 25.944L29.0878 26.344L28.1278 25.424L27.1678 26.344L26.6558 25.944L27.6638 24.712H28.5918ZM28.1198 31.096C27.8105 31.096 27.5332 31.0453 27.2878 30.944C27.0478 30.8373 26.8425 30.6907 26.6718 30.504C26.5065 30.312 26.3785 30.0827 26.2878 29.816C26.1972 29.544 26.1518 29.24 26.1518 28.904C26.1518 28.5733 26.1945 28.2747 26.2798 28.008C26.3705 27.7413 26.4985 27.5147 26.6638 27.328C26.8292 27.136 27.0318 26.9893 27.2718 26.888C27.5118 26.7813 27.7838 26.728 28.0878 26.728C28.4132 26.728 28.6958 26.784 28.9358 26.896C29.1758 27.008 29.3732 27.16 29.5278 27.352C29.6825 27.544 29.7972 27.768 29.8718 28.024C29.9518 28.2747 29.9918 28.544 29.9918 28.832V29.168H27.2158V29.272C27.2158 29.576 27.3012 29.8213 27.4718 30.008C27.6425 30.1893 27.8958 30.28 28.2318 30.28C28.4878 30.28 28.6958 30.2267 28.8558 30.12C29.0212 30.0133 29.1678 29.8773 29.2958 29.712L29.8478 30.328C29.6772 30.568 29.4425 30.7573 29.1438 30.896C28.8505 31.0293 28.5092 31.096 28.1198 31.096ZM28.1038 27.496C27.8318 27.496 27.6158 27.5867 27.4558 27.768C27.2958 27.9493 27.2158 28.184 27.2158 28.472V28.536H28.9278V28.464C28.9278 28.176 28.8558 27.944 28.7118 27.768C28.5732 27.5867 28.3705 27.496 28.1038 27.496ZM28.1038 32.552C27.8958 32.552 27.7465 32.5067 27.6558 32.416C27.5705 32.3307 27.5278 32.2213 27.5278 32.088V31.912C27.5278 31.7787 27.5705 31.6667 27.6558 31.576C27.7465 31.4907 27.8958 31.448 28.1038 31.448C28.3118 31.448 28.4585 31.4907 28.5438 31.576C28.6345 31.6667 28.6798 31.7787 28.6798 31.912V32.088C28.6798 32.2213 28.6345 32.3307 28.5438 32.416C28.4585 32.5067 28.3118 32.552 28.1038 32.552Z"></path>
                    <path d="M27.2212 0H10.7532C9.76511 0 8.97461 0.834345 8.97461 1.82643V12.334C8.97461 13.3487 9.78701 14.1604 10.7532 14.1604H22.1051L24.6741 16.8211C24.7839 16.9338 24.9157 17.0015 25.0693 17.0015C25.3768 17.0015 25.6402 16.7535 25.6402 16.4153V14.1604H27.2212C28.2092 14.1604 28.9997 13.3261 28.9997 12.334V1.82643C28.9997 0.811779 28.1873 0 27.2212 0ZM13.2783 9.04195C12.378 9.04195 11.6315 8.2753 11.6315 7.35077C11.6315 6.42631 12.378 5.65966 13.2783 5.65966C14.1785 5.65966 14.925 6.42631 14.925 7.35077C14.925 8.2753 14.2005 9.04195 13.2783 9.04195ZM19.0531 9.04195C18.1528 9.04195 17.4062 8.2753 17.4062 7.35077C17.4062 6.42631 18.1528 5.65966 19.0531 5.65966C19.9533 5.65966 20.6998 6.42631 20.6998 7.35077C20.6998 8.2753 19.9533 9.04195 19.0531 9.04195ZM24.8059 9.04195C23.9056 9.04195 23.1591 8.2753 23.1591 7.35077C23.1591 6.42631 23.9056 5.65966 24.8059 5.65966C25.7061 5.65966 26.4526 6.42631 26.4526 7.35077C26.4526 8.2753 25.7061 9.04195 24.8059 9.04195Z"></path>
                    <path d="M7.9649 12.3782V8.79297H6.16437C5.52762 8.79297 5.00066 9.33418 5.00066 9.98807V16.8878C4.97869 17.5868 5.50564 18.128 6.16437 18.128H7.19637V19.6162C7.19637 19.8192 7.37202 19.9995 7.56964 19.9995C7.67944 19.9995 7.76727 19.9544 7.83312 19.8868L9.52385 18.1505H16.9894C17.6261 18.1505 18.1531 17.6094 18.1531 16.9555V15.2418H10.7535C9.2165 15.2418 7.9649 13.9566 7.9649 12.3782Z"></path></svg> <span class="svgico--close"><svg role="presentation" viewBox="0 0 19 19">
                    <path d="M9.1923882 8.39339828l7.7781745-7.7781746 1.4142136 1.41421357-7.7781746 7.77817459 7.7781746 7.77817456L16.9705627 19l-7.7781745-7.7781746L1.41421356 19 0 17.5857864l7.7781746-7.77817456L0 2.02943725 1.41421356.61522369 9.1923882 8.39339828z" fill-rule="evenodd"></path></svg></span>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById("searchForm").addEventListener("submit", function (event) {
            event.preventDefault(); // Ngăn chặn form gửi đi ngay lập tức

            var query = document.getElementById("searchInput").value.trim();
            var encodedQuery = encodeURIComponent(query);
            var finalQuery = encodedQuery.replace(/%20/g, '+'); // Thay thế %20 bằng +

            var url = finalQuery === "" ? '/tim-kiem/' : '/tim-kiem/?k=' + finalQuery;
            window.location.href = url; // Chuyển hướng trang
        });

        $(document).ready(function () {
            $("#searchInput").on("input", function () {
                var query = $(this).val();

                if (query === "") {
                    $("#suggestionsBox").html("").hide();
                } else {
                    $.ajax({
                        url: '/search.php',
                        data: { k: query },
                        success: function (data) {
                            if (data.trim() !== "") {
                                $("#suggestionsBox").html(data).show();
                            } else {
                                $("#suggestionsBox").html("").hide();
                            }
                        }
                    });
                }
            });
        });


    jQuery(document).ready(function($){
        $(".bubble-contact .item-contact,.bubble-contact-listing-wrapper .bubble-contact-close").on("click", function (e) {
            if ($(".bubble-contact-listing-wrapper").hasClass("active")) {
            $(".bubble-contact-listing-wrapper").removeClass("active");
            $(".bubble-contact-listing-wrapper").fadeOut(150);
            } else {
            $(".bubble-contact-listing-wrapper").fadeIn(100);
            $(".bubble-contact-listing-wrapper").addClass("active");
            }
        });
        $(".bubble-contact-overlay").on("click", function (e) {
            $(".bubble-contact-listing-wrapper").removeClass("active");
            $(".bubble-contact-listing-wrapper").fadeOut(150);
        });
    });
    </script>   
</html>