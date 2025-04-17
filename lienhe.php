<?php include 'header.php'; ?>
<style>
    body.page-home .pagemain-wrapper{        
        background-size: contain;
        background-attachment: fixed;
        padding-bottom: 1px;
        background-color: #fff;
    }
</style>
<aside class="clearfix pagemain-wrapper">
        <div class="clearfix" id="bg-main">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/">Trang Chủ</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="/lien-he/">Liên Hệ</a>
                    </li>
                </ol>
            </div>
        </div>
        <div class="container wrapper-container storewrapper-container">
            <h1 class="title-page text-red f-title">Liên Hệ</h1>
            <section class="row gx-3 mb-4 mb-md-1 mb-md-4 mb-lg-5">
                <img src="/img/banner-traicagiongbaso.png"/>                
            </section>
            <section class="row gx-3 mb-4 mb-md-1 mb-md-4 mb-lg-5 storemaps-wrapper position-relative active">
                <div class="col-12 col-lg-12 storemaps-mapsplugin">
                    <div id="store__googlemaps"></div>
                </div>
                <div class="col-12 col-lg-4 storemaps-filter">
                    <ul class="storetext__container">
                        <li class="transition storetext-item btn__store_action active">
                            <div class="storetext-item-text">
                                <address class="storetext-item-title">3/135 Ấp Bình An B, Xã Lợi Bình Nhơn, Thành Phố Tân An, Tỉnh Long An</address>
                                <p>
                                    <i class="far fa-clock me-1"></i>  
                                    24/7 tất cả các ngày trong tuần
                                </p>
                            </div>
                            <button type="button" class="btn storetext-item-btn"><i class="fas fa-map-marker-alt"></i></button>
                        </li>
                    </ul>
                </div>
            </section>
        </div>        
    <script>
    var locations = new Map();
    var local_item = [ '<div class=\"gm__des\"><p class=\"bold\">3/135 Ấp Bình An B</p><p>3/135 Ấp Bình An B, Xã Lợi Bình Nhơn, Thành Phố Tân An, Tỉnh Long An<p></div>', '10.532694', '106.366417', 1];locations.set( "store_1", local_item );

    initMap = function () {

    var map = new google.maps.Map(document.getElementById('store__googlemaps'),
    {
        zoom: 15,
        center: new google.maps.LatLng( '10.532', '106.366'),
        mapTypeId: google.maps.MapTypeId.ROADMAP,
  		scrollwheel: false,
    });

    var infowindow = new google.maps.InfoWindow();
    var marker = [];
    var  i;
    for (var location_key of locations.keys()) 
    {
        let $l_key = location_key;
        let $l_value = locations.get( location_key );
        marker[ $l_key ] = new google.maps.Marker({
  		position: new google.maps.LatLng( $l_value[1], $l_value[2] ),
  		map: map,
        icon: {
                url: '/img/location.png',
                size: new google.maps.Size(71, 71),
                scaledSize: new google.maps.Size(40, 40), // scaled size
                origin: new google.maps.Point(0,0), // origin
                anchor: new google.maps.Point( 17, 34) // anchor
            }
        });
            marker[ $l_key ].addListener(  'click', (function(marker, location_key)
		    {      
			    return function()
			    {
                    infowindow.setContent( $l_value[0]);
                    infowindow.open(map, marker[ location_key ]);
                    center: new google.maps.LatLng( $l_value[1], $l_value[2] ),

                    map.setZoom(16);
                    map.setCenter(marker[ location_key ].getPosition());
                }
            })(marker, $l_key));
        };

	    $(document).ready(function(e) {
		     function loadAddress(){                
                var data_marker = 'store_1';                
                var get_location = locations.get ( data_marker );
                infowindow.setContent(  get_location[0] );
                infowindow.open(map, marker[ data_marker ] );
                center = new google.maps.LatLng( get_location[1], get_location[2] );
                map.setZoom(16);
                map.setCenter(marker[ data_marker ].getPosition());
                //$('html,body').animate({ scrollTop: $('#store__googlemaps').offset().top - 80 }, 'slow');
                $( '.storemaps-wrapper').addClass('active');
                $( '.storetext__container .storetext-item').removeClass( 'active');
		         //$this.addClass('active');
                $('.storetext__container .storetext-item[data-marker="' + data_marker + '"]').addClass('active');
            };
            loadAddress();
        });
    }
function store_filter()
{
    var _keyword = $('.store-ftilter input[name=store-kw]').val();
    _keyword = _keyword ? slug( _keyword ) : false;
    var _province = $('.store-ftilter select[name=store-province]').val();
    var _district = $('.store-ftilter select[name=store-district]').val();
    console.log( _keyword, _province, _district );
    $( '.storetext__container .storetext-item').each( function( index, element){
        var getdata = $( element).data( 'filter');
        var is_show = true;
        if( _keyword && _keyword != '' )
        {
          is_show = getdata.indexOf( _keyword)  >= 0 ? true : false;
        }
        if( is_show && _province && _province != 'all' )
        {
          is_show = getdata.indexOf( _province) >= 0 ? true : false;
        }
        if( is_show && _district && _district != 'all' )
        {
          is_show = getdata.indexOf( _district)  >= 0 ? true : false;
        }
        if( is_show )
        {
          $( element).css( 'display', 'flex');
        }else{
          $( element).css( 'display', 'none');
        }
    }); 
}

$(document).ready(function(e) {
    $('.store-ftilter').on( 'keyup', 'input[name=store-kw]', function( event){
        event.preventDefault();
        store_filter();
    });
    $('.store-ftilter').on( 'change', 'select[name=store-province]', function( event){
        event.preventDefault();
        var value = $(this).val();
        $('.store-ftilter select[name=store-district] option').each( function( inex, element ){
            var checkdata = $( element).data( 'province');
            if( value == checkdata )
            {
                $( element).css( 'display', 'block');
            }else{
                $( element).css( 'display', 'none');
            }
        });
        $('.store-ftilter select[name=store-district]').find( 'option')[0].selected = true;
        $('.store-ftilter select[name=store-district]').removeAttr( 'disabled');
        store_filter();
    });
    //--------------------
    $('.store-ftilter').on( 'change', 'select[name=store-district]', function( event){
        event.preventDefault();
        tore_filter();
    });

    $('#owl_storelist').owlCarousel({
        autoplay: false,
        autoplayTimeout: 2900,
        margin: 0,
        items: 5,
        dots: true,
        loop: false,
        nav: false,
        navText: [ '<i class="far fa-caret-square-left"></i>', '<i class="far fa-caret-square-right"></i>' ],
        responsive : {
            // breakpoint from 0 up
            0 : {
                items: 2,
                margin: 10,
        autoWidth: true
            },
            360 : {
                items: 2,
                margin: 10,
        autoWidth: true
            },
            768 : {
                items: 3,
                margin: 15,
        autoWidth: true
            },
                991 : {
                items: 5,
                margin: 15
            },
            1201 : {
                items: 5,
                margin: 15
            }
        }
    });
});    
</script>
<script src="https://api.vnmap.com.vn/js/map?sensor=false&language=vi-VN&key=f42c0ccfb11eabb23a94e0ab35e3da1d&callback=initMap"></script>
</aside>
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
<?php include 'footer.php'; ?>