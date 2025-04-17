
<!-- index.php -->
<?php include 'header.php'; ?>

<aside class="clearfix pagemain-wrapper">        
        <section class="owl-carousel owl-theme homeslide_lg" id="owl_home_img">
        	<?php 
        		require_once 'connect.php';
                // Tạo kết nối
                $db = new Connect();

                // Lấy toàn bộ dữ liệu từ bảng danh mục
                $sqlBannerTC = "select * from bannertrangchu";
                $bannerTable = $db->getTable($sqlBannerTC);

                $html = "";
                foreach ($bannerTable as $dmRow) {
                        $url = $dmRow["Url"];
                        $linkanh = $dmRow["LinkAnh"];
                        $html .= "<a href='{$url}'  target='_self' class='d-block'>
                                <img data-src='{$linkanh}' src='/img/noimage-br.png' alt='Trại cá giống Ba So' class='lazy img-banner'  width='1920' height='650'  />
                            </a>"; 
                    }
                    echo $html;
        	?>
        </section>
        <div class="homebanner_ver__boxgroup">           
            <section class="container home-boxproduct-container home-boxproduct-container--slide home-boxproduct-container--435" style="padding-left: 0px; padding-right: 0px;">                                          
                <div class="home-boxproduct hprobox__container pagehome-productbox-wrapper mb-3 mb-lg-4  hprobox__container--box435 hprobox__container--viewslide" style="--bg-gradient-top: #fde8e8; padding-top: 1rem;"  >   
                    <h2 class="text-24 font-bold text-ddv">Cá Giống Nước Ngọt</h2>                                                                 
                    <div class="owl-carousel owl-theme product__container product__container--promotion owl_homeproductbox_warpper" id="dvCaGiong">
                    	<?php 
			        		require_once 'connect.php';
			                // Tạo kết nối
			                $db = new Connect();

			                // Lấy toàn bộ dữ liệu từ bảng danh mục
			                $sqlCaGiong = "SELECT * FROM cagiong cg LEFT JOIN hinhanhca ha ON cg.idca = ha.idca WHERE cg.loaica = '1' AND (ha.idloai = '1' or ha.idca is null) AND cg.danhmucCha = '0' ORDER BY cg.idca;";
			                $CaGiongTable = $db->getTable($sqlCaGiong);

			                $html = "";
			                foreach ($CaGiongTable as $dmRow) {
			                        $url = $dmRow["duongdanca"];
			                        $urlhinh = $dmRow["urlhinh"];
			                        $tenca = $dmRow["tenca"];
			                        $html .= "<div class='item flashsale-proitem-group'>              
                            <div class='proitem prosaleoff__item proitem--promotion'>                                    
                                <div class='probox  boxproid__18718 boxprobrand__apple boxprotype__product pro__group86 pro__main1487 prothreaduudai--441 prolink--515  probox__text_promotion_18718 probox--pricemin-5 probox--pricemin-10 probox--pricemin-20 probox--pricemin-30 probox--appearance probox-appearance-564 probox--tratruoc'>
                                    <a href='/ca-giong/" . $url . "' class='box'>
                                        <div class='probox__img'>        
                                            <figure class='mb-0 position-relative'>
                                                <img data-src='/" . ($urlhinh != "" ? $urlhinh : "img/default-400_400.webp") ."' src='/img/default-400_400.webp' alt='" . $tenca . "' class='lazy img-full img-responsive' width='205' height='205'>						
                                            </figure>                                      
                                        </div>          
                                        <div class='probox__des'>                                                    
                                            <h3 class='probox__title' data-bs-toggle='tooltip' data-bs-placement='top' data-bs-custom-class='product-title-tooltip' data-bs-title='" . $tenca . "' >" . $tenca . "</h3>                
                                            <div class='probox__pricebox'>                                              
                                                <p class='probox__price pr-1'><b class='price'>Giá: Liên Hệ</b>
                                                <span class='text-center mb-3 mb-md-4 mb-lg-5'>
                                                <a href='/ca-giong/" . $url . "' class='btn btn-outline-viewall-product'>Thông tin<i class='fas fa-info-circle'></i></a></span></p>                                                            
                                            </div>                                                                                                                                                        
                                        </div>
                                    </a>                                        
                                </div>                    
                            </div>                            
                        </div>"; 
			                    }
			                    echo $html;
			        	?>
                    </div>                             
                </div>          
                <p class="text-center mb-3 mb-md-4 mb-lg-5">
                    <a href="/tim-kiem/?dm=1" class="btn btn-outline-viewall">
                        Xem toàn bộ danh sách
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </p>          
          </section>
          <section class="container home-boxproduct-container home-boxproduct-container--slide home-boxproduct-container--435" style="padding-left: 0px; padding-right: 0px;">                                          
            <div class="home-boxproduct hprobox__container pagehome-productbox-wrapper mb-3 mb-lg-4  hprobox__container--box435 hprobox__container--viewslide" style="--bg-gradient-top: #fde8e8; padding-top: 1rem;"  >   
                <h2 class="text-24 font-bold text-ddv ">Cá kiểng</h2>                                                                 
                <div class="owl-carousel owl-theme product__container product__container--promotion owl_homeproductbox_warpper" id="dvCaKieng">
                	<?php 
		        		require_once 'connect.php';
		                // Tạo kết nối
		                $db = new Connect();

		                // Lấy toàn bộ dữ liệu từ bảng danh mục
		                $sqlCaGiong = "SELECT * FROM cagiong cg LEFT JOIN hinhanhca ha ON cg.idca = ha.idca WHERE cg.loaica = '2' AND (ha.idloai = '2' or ha.idca is null) AND cg.danhmucCha = '0' ORDER BY cg.idca;";
		                $CaGiongTable = $db->getTable($sqlCaGiong);

		                $html = "";
		                foreach ($CaGiongTable as $dmRow) {
		                        $url = $dmRow["duongdanca"];
		                        $urlhinh = $dmRow["urlhinh"];
		                        $tenca = $dmRow["tenca"];
		                        $html .= "<div class='item flashsale-proitem-group'>              
			                            <div class='proitem prosaleoff__item proitem--promotion'>                                    
			                                <div class='probox  boxproid__18718 boxprobrand__apple boxprotype__product pro__group86 pro__main1487 prothreaduudai--441 prolink--515  probox__text_promotion_18718 probox--pricemin-5 probox--pricemin-10 probox--pricemin-20 probox--pricemin-30 probox--appearance probox-appearance-564 probox--tratruoc'>
			                                    <a href='/ca-kieng/" . $url . "' class='box'>
			                                        <div class='probox__img'>        
			                                            <figure class='mb-0 position-relative'>
			                                                <img data-src='/" . ($urlhinh != "" ? $urlhinh : "img/default-400_400.webp") . "' src='/img/default-400_400.webp' alt='" . $tenca . "' class='lazy img-full img-responsive' width='205' height='205'>						
			                                            </figure>                                      
			                                        </div>          
			                                        <div class='probox__des'>                                                    
			                                            <h3 class='probox__title' data-bs-toggle='tooltip' data-bs-placement='top' data-bs-custom-class='product-title-tooltip' data-bs-title='" . $tenca . "' >" . $tenca . "</h3>         
			                                            <div class='probox__pricebox'>                                              
			                                                <p class='probox__price pr-1'><b class='price'>Giá: Liên Hệ</b>
			                                                <span class='text-center mb-3 mb-md-4 mb-lg-5'>
			                                                <a href='/ca-kieng/" . $url . "' class='btn btn-outline-viewall-product'>Thông tin<i class='fas fa-info-circle'></i></a></span></p>                                                            
			                                            </div>                                                                                                                                                        
			                                        </div>
			                                    </a>                                        
			                                </div>                    
			                            </div>                            
			                        </div>"; 
		                    }
		                    echo $html;
			        	?>
                </div>                             
            </div>          
            <p class="text-center mb-3 mb-md-4 mb-lg-5">
                <a href="/tim-kiem/?dm=2" class="btn btn-outline-viewall">
                    Xem toàn bộ danh sách
                    <i class="fas fa-arrow-right"></i>
                </a>
            </p>          
      </section>
      <section class="container home-boxproduct-container home-boxproduct-container--slide home-boxproduct-container--435" style="padding-left: 0px; padding-right: 0px;">                                          
        <div class="home-boxproduct hprobox__container pagehome-productbox-wrapper mb-3 mb-lg-4  hprobox__container--box435 hprobox__container--viewslide" style="--bg-gradient-top: #fde8e8; padding-top: 1rem;"  >   
            <h2 class="text-24 font-bold text-ddv ">Cá Bột</h2>                                                                 
            <div class="owl-carousel owl-theme product__container product__container--promotion owl_homeproductbox_warpper" id="dvCaBot">
            	<?php 
	        		require_once 'connect.php';
	                // Tạo kết nối
	                $db = new Connect();

	                // Lấy toàn bộ dữ liệu từ bảng danh mục
	                $sqlCaGiong = "SELECT * FROM cagiong cg LEFT JOIN hinhanhca ha ON cg.idca = ha.idca WHERE cg.loaica = '3' AND (ha.idloai = '3' or ha.idca is null) AND cg.danhmucCha = '0' ORDER BY cg.idca;";
	                $CaGiongTable = $db->getTable($sqlCaGiong);

	                $html = "";
	                foreach ($CaGiongTable as $dmRow) {
	                        $url = $dmRow["duongdanca"];
	                        $urlhinh = $dmRow["urlhinh"];
	                        $tenca = $dmRow["tenca"];
	                        $html .= "<div class='item flashsale-proitem-group'>              
                            <div class='proitem prosaleoff__item proitem--promotion'>                                    
                                <div class='probox  boxproid__18718 boxprobrand__apple boxprotype__product pro__group86 pro__main1487 prothreaduudai--441 prolink--515  probox__text_promotion_18718 probox--pricemin-5 probox--pricemin-10 probox--pricemin-20 probox--pricemin-30 probox--appearance probox-appearance-564 probox--tratruoc'>
                                    <a href='/ca-bot/" . $url . "' class='box'>
                                        <div class='probox__img'>        
                                            <figure class='mb-0 position-relative'>
                                                <img data-src='/" . ($urlhinh != "" ? $urlhinh : "img/default-400_400.webp") . "' src='/img/default-400_400.webp' alt='" . $tenca . "' class='lazy img-full img-responsive' width='205' height='205'>
                                            </figure>                                      
                                        </div>          
                                        <div class='probox__des'>                                                    
                                            <h3 class='probox__title' data-bs-toggle='tooltip' data-bs-placement='top' data-bs-custom-class='product-title-tooltip' data-bs-title='" . $tenca . "'>" . $tenca . "</h3>                         
                                            <div class='probox__pricebox'>                                              
                                                <p class='probox__price pr-1'><b class='price'>Giá: Liên Hệ</b>
                                                <span class='text-center mb-3 mb-md-4 mb-lg-5'>
                                                <a href='/ca-bot/" . $url . "' class='btn btn-outline-viewall-product'>Thông tin<i class='fas fa-info-circle'></i></a></span></p>              
                                            </div>                                                                          
                                        </div>
                                    </a>                                        
                                </div>                    
                            </div>                            
                        </div>"; 
	                    }
	                    echo $html;
		        	?>
            </div>                             
        </div>          
        <p class="text-center mb-3 mb-md-4 mb-lg-5">
            <a href="/tim-kiem/?dm=3" class="btn btn-outline-viewall">
                Xem toàn bộ danh sách
                <i class="fas fa-arrow-right"></i>
            </a>
        </p>          
  </section>
</div>
</aside>
    <script>        
        var owl_home_img = $("#owl_home_img");
        owl_home_img.owlCarousel({
            autoplay: true,
            autoplayTimeout: 4200,
            smartSpeed: 720,
            //autoplaySpeed: 1200,
            margin: 0,
            items: 1,
            dots: true,
            loop: true,
            nav: true,
            navText: [ '<i class="fas fa-arrow-left"></i>', '<i class="fas fa-arrow-right"></i>' ],
            responsiveRefreshRate: 200,
            responsive : {
                0:	{
                    dots: true,
                },
                480:	{
                    dots: true,
                },
                768:	{
                    dots: false,
                    nav: true
                },
                991:	{
                    dots: false,
                    nav: true
                },
            }
        });        
        $('.owl_homeproductbox_warpper').owlCarousel({
            autoplay: false,
            autoplayTimeout: 5800,
            smartSpeed: 560,
            //autoplaySpeed: 1200,
            margin: 0,
            items: 5,
            dots: false,
            loop: true,
            nav: false,
            navText: [ '<i class="fas fa-arrow-left"></i>', '<i class="fas fa-arrow-right"></i>' ],
            responsiveRefreshRate: 200,
            responsive : {
                0:	{
                    nav: false,
                    items: 2,
                    autoWidth: true
                },
                480:	{
                    nav: false,
                    items: 2,
                    autoWidth: true
                },
                768:	{
                    nav: false,
                    items: 4,
                    autoWidth: true,
                    // items: 1,
                    // autoWidth: true
                },
                991:	{
                    items: 4,
                    nav: false,
                },
                1201:	{
                    items: 5,
                    nav: false,
                },
            }
        });     
    </script>
<?php include 'footer.php'; ?>
