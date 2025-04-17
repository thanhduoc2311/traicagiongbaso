function store_filter($this) {
    var _keyword = false;
    var _province = $this.find('select[name=store-province]').val();
    var _district = $this.find('select[name=store-district]').val();
    //console.log( _keyword, _province, _district );
    $this.find('.prodetail__liststore .prodetail__liststore-item').each(function (index, element) {
        var getdata = $(element).data('filter');
        var is_show = true;
        // console.log( getdata );
        if (is_show && _province && _province != 'all') {
            //console.log( '_province',  _province,  getdata.indexOf( _province) );
            is_show = getdata.indexOf(_province) >= 0 ? true : false;
        }
        if (is_show && _district && _district != 'all') {
            //console.log( '_district',  _district,  getdata.indexOf( _district) );
            is_show = getdata.indexOf(_district) >= 0 ? true : false;
        }

        //----------
        //console.log( 'is_show' , is_show );
        if (is_show) {
            $(element).css('display', 'flex');
        } else {
            $(element).css('display', 'none');
        }

    });
}
function product_imei_filter() {
    var _keyword = false;
    var imei_filter = $('.prodetail-proimei-container .prodetail-proimei-filter').val();
    //console.log( _keyword, _province, _district );
    $('.prodetail-proimei-container .prodetail-proimei-item[data-filter]').each(function (index, element) {
        var getdata = $(element).data('filter');
        var is_show = true;
        // console.log( getdata );
        if (is_show && imei_filter) {
            is_show = getdata.indexOf(imei_filter) >= 0 ? true : false;
        }

        //----------
        //console.log( 'is_show' , is_show );
        if (is_show) {
            $(element).css('display', 'flex');
        } else {
            $(element).css('display', 'none');
        }

    });
}
//============
function checkshow_prodetail__sharecontent(_ele_sku) {
    var $x_show = 1;
    if (typeof _ele_sku != 'undefined' && $('.prodetail__sharecontent .prodetail__sharecontent_item').length > 1) {
        $('.prodetail__sharecontent .prodetail__sharecontent_item').addClass('d-none');
        $('.prodetail__sharecontent .prodetail__sharecontent_item').each(function (index, element) {
            var data_filter = $(element).attr('data-check');
            // console.log( 'data_filter ' + data_filter + ' -- ' + _ele_sku + data_filter.includes( '-' + _ele_sku ) );
            if (data_filter.includes('-' + _ele_sku) && $x_show == 1) {
                $(element).removeClass('d-none');
                $x_show++;
            } else {
                $(element).addClass('d-none');
            }
        });
        //=================
        // console.log( $('.prodetail__sharecontent .prodetail__sharecontent_item').length +'=='+$('.prodetail__sharecontent .prodetail__sharecontent_item.d-none').length  );
        if ($('.prodetail__sharecontent .prodetail__sharecontent_item').length == $('.prodetail__sharecontent .prodetail__sharecontent_item.d-none').length) {
            if ($('.prodetail__sharecontent .prodetail__sharecontent_item--product').length > 0) {
                $('.prodetail__sharecontent .prodetail__sharecontent_item--product').eq(0).removeClass('d-none')
            } else {
                $('.prodetail__sharecontent .prodetail__sharecontent_item[data-check=sku-empty]').eq(0).removeClass('d-none')
            }
        }

    }
}
//------------
var user_fullname = '';
var user_phone = '';
var user_email = '';

//------------
var price_current = 8590000;
var battery_current = 0;
var guarantee_current = 0;
var guarantee = $.parseJSON('[]');
var proprice = new Map();
proprice.set('iphone-12-64gb-like-new', {
    id: '7372',
    text_sku: '<b>SKU: </b>31829',
    title: 'iPhone 12 64GB - Cũ đẹp',
    price: 'Giá thị trường: 13,490,000đ',
    active: 8590000,
    text: '<b class="price">8,590,000đ</b><s>13,490,000đ</s>',
    buyonline: '',
    buyonline_label: '<span class="text-primary bold">Giá SHIP COD</span>',

    price_flashsale: '12,790,000',
    is_flashsale: '0',

    status: '',
    price_label: 'Giá bán',
    status_text: '<b class="btn btn-sm btn-warning pro__instock"><i class="fas fa-minus-circle"></i>&nbsp;Tạm hết hàng</b>',
    img: 'https://minhtuanmobile.com/uploads/products/12red-230225030938.png',
    color: '',
    option: '31829',
    redirect: '',
});
proprice.set('iphone-12-64gb-chinh-hang-8-31832', {
    id: '7375',
    text_sku: '<b>SKU: </b>12L9HM164B',
    title: 'iPhone 12 64GB - Cũ đẹp',
    price: "Giá thị trường: 13,490,000đ",
    active: 8590000,
    text: '<b class="price">8,590,000đ</b><s>13,490,000đ</s>',
    buyonline: '',
    buyonline_label: '<span class="text-primary bold">Giá SHIP COD</span>',
    price_flashsale: '8,590,000',
    is_flashsale: '0',

    status: '1',
    price_label: 'Giá bán',
    status_text: '<b class="btn btn-sm btn-primary pro__instock"><i class="fas fa-check-circle"></i>&nbsp;Còn hàng</b>',
    img: 'https://minhtuanmobile.com/uploads/products/230225031025-12black.png',
    color: 'Đen',
    option: '31829',
    redirect: '',

}); proprice.set('iphone-12-64gb-chinh-hang-10-31834', {
    id: '7377',
    text_sku: '<b>SKU: </b>12L9HM164GR',
    title: 'iPhone 12 64GB - Cũ đẹp',
    price: "Giá thị trường: 12,990,000đ",
    active: 8790000,
    text: '<b class="price">8,790,000đ</b><s>12,990,000đ</s>',
    buyonline: '',
    buyonline_label: '<span class="text-primary bold">Giá KM áp dụng khi mua hàng trực tiếp tại CN 363 Nguyễn Oanh, Q.Gò Vấp (Từ 13.05 - 21.05.2023)</span>',
    price_flashsale: '8,790,000',
    is_flashsale: '0',

    status: '1',
    price_label: 'Giá bán',
    status_text: '<b class="btn btn-sm btn-primary pro__instock"><i class="fas fa-check-circle"></i>&nbsp;Còn hàng</b>',
    img: 'https://minhtuanmobile.com/uploads/products/230225031001-12green.png',
    color: 'Xanh Lá',
    option: '31829',
    redirect: '',

}); proprice.set('iphone-12-64gb-like-new-chinh-hang-vn-22011902073878', {
    id: '13595',
    text_sku: '<b>SKU: </b>12L9M364P',
    title: 'iPhone 12 64GB - Cũ đẹp',
    price: "Giá thị trường: 13,490,000đ",
    active: 8790000,
    text: '<b class="price">8,790,000đ</b><s>13,490,000đ</s>',
    buyonline: '',
    buyonline_label: '<span class="text-primary bold">Giá SHIP COD</span>',
    price_flashsale: '8,790,000',
    is_flashsale: '0',

    status: '1',
    price_label: 'Giá bán',
    status_text: '<b class="btn btn-sm btn-primary pro__instock"><i class="fas fa-check-circle"></i>&nbsp;Còn hàng</b>',
    img: 'https://minhtuanmobile.com/uploads/products/230225031044-12tims.png',
    color: 'Tím',
    option: '31829',
    redirect: '',

}); proprice.set('iphone-12-64gb-chinh-hang-7-31831', {
    id: '7374',
    text_sku: '<b>SKU: </b>12L9HVN64BL',
    title: 'iPhone 12 64GB - Cũ đẹp',
    price: "Giá thị trường: 12,990,000đ",
    active: 8790000,
    text: '<b class="price">8,790,000đ</b><s>12,990,000đ</s>',
    buyonline: '',
    buyonline_label: '<span class="text-primary bold">Giá SHIP COD</span>',
    price_flashsale: '8,790,000',
    is_flashsale: '0',

    status: '1',
    price_label: 'Giá bán',
    status_text: '<b class="btn btn-sm btn-primary pro__instock"><i class="fas fa-check-circle"></i>&nbsp;Còn hàng</b>',
    img: 'https://minhtuanmobile.com/uploads/products/230225030952-12blue.png',
    color: 'Xanh Navy',
    option: '31829',
    redirect: '',

}); proprice.set('iphone-12-64gb-chinh-hang-6-31830', {
    id: '7373',
    text_sku: '<b>SKU: </b>12L9HM164RE',
    title: 'iPhone 12 64GB - Cũ đẹp',
    price: "Giá thị trường: 13,390,000đ",
    active: 8590000,
    text: '<b class="price">8,590,000đ</b><s>13,390,000đ</s>',
    buyonline: '',
    buyonline_label: '<span class="text-primary bold">Giá SHIP COD</span>',
    price_flashsale: '8,590,000',
    is_flashsale: '0',

    status: '',
    price_label: 'Giá bán',
    status_text: '<b class="btn btn-sm btn-warning pro__instock"><i class="fas fa-minus-circle"></i>&nbsp;Tạm hết hàng</b>',
    img: 'https://minhtuanmobile.com/uploads/products/230225031014-12red.png',
    color: 'Đỏ',
    option: '31829',
    redirect: '',

}); proprice.set('iphone-12-64gb-chinh-hang-9-31833', {
    id: '7376',
    text_sku: '<b>SKU: </b>12L9HVN64W',
    title: 'iPhone 12 64GB - Cũ đẹp',
    price: "Giá thị trường: 13,490,000đ",
    active: 8590000,
    text: '<b class="price">8,590,000đ</b><s>13,490,000đ</s>',
    buyonline: '',
    buyonline_label: '<span class="text-primary bold">Giá SHIP COD</span>',
    price_flashsale: '8,590,000',
    is_flashsale: '0',

    status: '',
    price_label: 'Giá bán',
    status_text: '<b class="btn btn-sm btn-warning pro__instock"><i class="fas fa-minus-circle"></i>&nbsp;Tạm hết hàng</b>',
    img: 'https://minhtuanmobile.com/uploads/products/230225031035-12white.png',
    color: 'Trắng',
    option: '31829',
    redirect: '',

});    // console.log( proprice);
var prodetail_current = 'iphone-12-64gb-chinh-hang-8-31832';
//console.log( prodetail_current);
//owl run

var owl_homeall_img = $("#MainContent_dvSlideCa");
var owl_homeall_caption = $("#MainContent_dvSlideCa_Thumbnail");
var syncedSecondary = true;

owl_homeall_img.owlCarousel({
    autoplay: false,
    autoplayTimeout: 4350,
    smartSpeed: 500,
    //autoplaySpeed: 1200,
    mouseDrag: false,
    touchDrag: false,
    margin: 2,
    items: 1,
    dots: false,
    loop: false,
    nav: true,
    navText: ['<i class="fas fa-angle-left"></i>', '<i class="fas fa-angle-right"></i>'],
    onInitialized: function () {
        console.log('owl_homeall_img - onInitialized');
        $('.prodetail_img_wrapper').addClass('bg-none');
        $('.widget--prodetail-action').addClass('active');
    }

}).on('changed.owl.carousel', syncPosition);

owl_homeall_caption.owlCarousel({
    autoplay: false,
    autoplayTimeout: 3500,
    smartSpeed: 150,
    //autoplaySpeed: 1200,
    margin: 0,
    //autoWidth: true,
    items: 6,
    slideBy: 3,
    dots: false,
    loop: false,
    nav: true,
    navText: ['<i class="fas fa-angle-left"></i>', '<i class="fas fa-angle-right"></i>'],
    responsive: {
        0: {
            items: 4
        },
        480: {
            items: 4
        },
        768: {
            items: 4
        },
        991: {
            items: 4
        },
        1201: {
            items: 4
        }
    },
    initialized: function () {
        console.log('owl_homeall_caption - onInitialized');
        owl_homeall_caption.find(".owl-item").eq(0).addClass("current");
    }
});
function syncPosition(el) {
    var count = el.item.count - 1;
    var current = el.item.index <= count ? el.item.index : 0;
    if (current < 0) {
        current = count;
    }
    if (current > count) {
        current = 0;
    }
    $("#MainContent_dvSlideCa_Thumbnail").find(".owl-item")
        .removeClass("current")
        .eq(current)
        .addClass("current");
    owl_home_setcenter(current);

}

function syncPosition2(el) {
    if (syncedSecondary) {
        var number = el.item.index;
        //console.log( number );
        owl_homeall_img.data('owl.carousel').to(number, 100, true);
    }
}
owl_homeall_caption.on("click", ".owl-item", function (e) {
    var number = $(this).index();
    //console.log( number );

    owl_homeall_img.data('owl.carousel').to(number, 300, true);
});


function owl_home_setcenter(number) {
    var sync2visible = owl_homeall_caption.data('owl.carousel')._items;
    var num_center = Math.ceil(sync2visible.length / 2);
    var num = number;
    var found = false;
    for (var i in sync2visible) {
        if (num === sync2visible[i] && $(sync2visible[i][0]).hasClass('active')) {
            found = true;
        }
    }
    if (found === false) {
        //console.log( num , sync2visible.length - 1 );
        if (num > sync2visible.length - 1) {
            //console.log( 'a = ', num);
            owl_homeall_caption.trigger("to.owl.carousel", num - sync2visible.length + 1)
        } else {
            if (num - 1 < 1) {
                //console.log('e');
                num = 0;
            } else {
                num -= 1;
            }
            owl_homeall_caption.trigger("to.owl.carousel", num);
        }
    } else if (num === sync2visible.length - 1) {
        //console.log( 'c = ', num);
        owl_homeall_caption.trigger("to.owl.carousel", sync2visible[1]);
    } else {
        num = 1;
        //console.log( 'd = ', num );
        owl_homeall_caption.trigger("to.owl.carousel", num - 1);
    }
}
//-------------
$(window).load(function (e) {

    $('.widget-prodetail-formaction-wrapper .pdinfo_faddcart__addcart, .widget-prodetail-formaction-wrapper .btn-pdetail-muangay').on('click', function (event) {
        event.preventDefault();
        var ele_root = $(this).parents('.mobile-navigation');
        //alert( ele_root.hasClass( 'active') );
        if (true || ele_root.hasClass('active')) {
            if ($('form.widget-prodetail-formaction-wrapper').hasClass('active')) {
                //return true;
                //alert( 1);

            } else {
                offcanvasWidgetProdetailAddcart.show();
                //$('#offcanvasWidgetProdetailAddcart').addClass( 'show');
            }
            var $this_value = $(this).val();
            $('.widget-prodetail-formaction-submit').val($this_value);
        }
        return false;
    });

    //==================
    $('form.widget-prodetail-formaction-wrapper').on('submit', function (event) {
        var $this = $(this).parents('form.widget-prodetail-formaction-wrapper');
        var check_value = $(this).find('.widget-prodetail-formaction-submit').val();
        var _priceitem = $(this).find('[name=priceitem]:checked');

        _priceitem = _priceitem.length > 0 ? _priceitem.eq(0).val() : '';
        var _value = {
            'checkin': $(this).find('[name=prodetail_checkin]').val(),
            'qty': $(this).find('[name=qty]').val(),
            'guarantee': $(this).find('[name=guarantee]').val(),
            'battery': $(this).find('[name=battery]').val(),
            'priceitem': _priceitem,
        };
        //console.log( _value );
        //============
        //alert( check_value );
        switch (check_value) {
            case 'buynow':
                //----------
                add_cartitem(_value, site_url + 'cart');
                break;
            case 'addtocart':
                add_cartitem(_value, false);
                break;
        }
        //alert( check_value );
        return false;
    });

    //---------
    $('.proprice_color_group').on('click', 'label.proprice_action', function () {
        var $this = $(this);
        var _element = $('.proprice_color_group .proprice_action');
        var _ele_checkin = $(this).data('val');
        var _ele_sku = $(this).data('sku');
        var _price_val = $(this).find('input[name=priceitem]');
        var priceitem = proprice.get(_ele_checkin);
        //---------
        // alert( _ele_sku );

        if (priceitem && !$this.hasClass('active')) {
            prodetail_current = _ele_checkin;
            //sync color
            _element.removeClass('active');
            $('.proprice_item label.proprice_action').removeClass('active');
            //-------
            $this.addClass('active');
            $('label.proprice_action[data-val="' + _ele_checkin + '"]').addClass('active').find('input[name=priceitem]').prop('checked', true);
            //----------
            price_current = parseInt(priceitem['active']);
            var amount = parseInt(price_current) + parseInt(guarantee_current) + parseInt(battery_current);
            //------------
            $('.prodetail_pricebox_main .prodetail__price_label--buynow').html(priceitem['price_label']).show();
            $('.prodetail__price_orig--buynow').html(priceitem['price']).show();
            $('.prodetail_pricebox_main .prodetail__price--buynow').html(priceitem['text']);
            $('.prodetail_pricebox_main .prodetail__price--buynow .price').html((amount > 0 ? format_number(amount) + 'đ' : 'Liên hệ'));
            // console.log( _ele_checkin, priceitem );
            //==========
            $('#MainContent_dvSlideCa').attr('data-color', priceitem.id)
            //==========
            // console.log( priceitem );
            if (priceitem['buyonline'] && parseInt(priceitem['buyonline']) > 0) {
                $('.prodetail_pricebox_buyonline .price__buyonline').html(priceitem['buyonline']);
                $('.prodetail_pricebox_buyonline .prodetail__price_label--buynow').html(priceitem['buyonline_label']);
                $('.prodetail_pricebox_buyonline').removeClass('d-none');
            } else {
                $('.prodetail_pricebox_buyonline').addClass('d-none');
            }

            //===============
            // console.log( priceitem['is_flashsale'] && priceitem['is_flashsale'] == 1 );
            if (priceitem['is_flashsale'] && priceitem['is_flashsale'] == 1) {
                $('.flashsale-wrapper').removeClass('d-none');
                $('.prodetail-price-wrapper').addClass('d-none');
                $('.prodetail_pricebox_main--flashsale .prodetail__price--buynow .price').html(priceitem['price_flashsale']);
            } else {
                $('.flashsale-wrapper').addClass('d-none');
                $('.prodetail-price-wrapper').removeClass('d-none');

            }

            //-------------
            $('.prodetail__stock > span').html(priceitem['status_text']);
            $('.prodetail__overview_info .prodetail__sku').html(priceitem['text_sku']);
            //process form - button
            //-------------
            var priceitem_cogitem_redirect = priceitem['redirect'] != '' ? priceitem['redirect'] : false;
            var append_class_faction = priceitem_cogitem_redirect ? ' prodetail-faction--modal-redirect' : ''
            // console.log( 'priceitem_cogitem_redirect', priceitem_cogitem_redirect );
            //-------------
            $('.pdinfo_faddcart_btngroup--modal-redirect a.btn').attr('href', (priceitem_cogitem_redirect ? priceitem_cogitem_redirect : '#'));
            //-------------
            if (priceitem['status'] != 1) {
                //het hang
                $('.pdinfo_faddcart .pdinfo_faddcart_btngroup--addtocart .pdinfo_faddcart__btn').attr('disabled', 'disabled').addClass('disabled');
                $('.pdinfo_faddcart .prodetail-faction').attr('class', 'prodetail-faction prodetail-faction--modal ' + append_class_faction);
                $('.widget-prodetail-formaction-submit').attr('disabled', 'disabled').addClass('disabled');
                //=================
                //=================

            } else {
                //con hang
                $('.pdinfo_faddcart .pdinfo_faddcart_btngroup--addtocart .pdinfo_faddcart__btn').removeAttr('disabled').removeClass('disabled');
                $('.pdinfo_faddcart .prodetail-faction').attr('class', 'prodetail-faction prodetail-faction--addtocart' + append_class_faction);
                $('.widget-prodetail-formaction-submit').removeAttr('disabled').removeClass('disabled');

            }
            //-----------------
            $('.pdinfo_faddcart__modal[value=ctytaichinh]').attr('href', site_url + 'mua-tra-gop/' + _ele_checkin + '?tab=thetindung');
            $('.pdinfo_faddcart__modal[value=tgctytaichinh]').attr('href', site_url + 'mua-tra-gop/' + _ele_checkin + '?tab=tgctytaichinh');
            $('.pdinfo_faddcart__modal[value=thetindung-baokim]').attr('href', site_url + 'mua-tra-gop/' + _ele_checkin + '?tab=thetindung-baokim');
            //-----------------
            console.log('trigger', priceitem['img']);
            $('#MainContent_dvSlideCa img[data-item=prodimg__img1], #MainContent_dvSlideCa_Thumbnail [data-item=item__1] img').attr('src', priceitem['img']);

            owl_homeall_img.trigger("to.owl.carousel", 0);
            //----------------
            //update prodetail__sharecontent
            checkshow_prodetail__sharecontent(_ele_sku);

            //----------------


        } else {
            if (!priceitem) {
                if (window.confirm('Không tìm thấy giá bán. Vui lòng F5/Reload lại!') === true) {
                    window.location.reload();
                }
            }
        }
    });//end event: proprice_color_group
    //-------------
    $('select[name=guarantee]').on('change', function () {
        var $this = $(this);
        var value = $(this).val()
        var guarantee_item = guarantee[value] ? guarantee[value] : false;
        guarantee_current = guarantee_item ? guarantee_item : 0;
        //---------
        console.log('guarantee - change');
        $('[name=guarantee] option[value="' + value + '"]').prop('selected', true);
        //=======
        var amount = parseInt(price_current) + parseInt(guarantee_current) + parseInt(battery_current);
        $('.prodetail__price--buynow .price').html(format_number(amount) + 'đ');
        //-------------
    });
    //-------------
    $('select[name=battery]').on('change', function () {
        var $this = $(this);
        var value = $(this).val()
        var battery_item = guarantee[value] ? guarantee[value] : false;
        battery_current = battery_item ? battery_item : 0;
        //---------
        console.log('battery - change');
        $('[name=battery] option[value="' + value + '"]').prop('selected', true);
        //=======
        var amount = parseInt(price_current) + parseInt(battery_current) + parseInt(guarantee_current);
        $('.prodetail__price--buynow .price').html(format_number(amount) + 'đ');
        //-------------
    });

    //---------------
    $('#modal_tragop .pdinfo_faddcart__modal').bind('click', function () {

        var price_color = $('.proprice_color_group .proprice_action.active').eq(0);
        var _tab = $(this).attr('value');
        var _href = $(this).attr('href');
        var _href_uri = price_color.length > 0 ? price_color.data('val') : false;
        _href_uri = _href_uri ? _href_uri : $('input[name=prodetail_checkin]').val();
        //---------------
        //console.log( price_color.length );
        //---------------
        if (_href_uri) {
            var _href_redirect = site_url + 'mua-tra-gop/' + _href_uri + '/?method=' + _tab;
            //console.log( _href_redirect );
            window.location.href = _href_redirect;
            return false;
        } else {
            alert('Không tìm thấy thông tin sản phẩm. Vui lòng F5 thử lại!');
        }
    });
    //--------------------
    //-----------------------
    //var modal_static_techology = document.getElementById('modal_static_techology');
    //modal_static_techology.addEventListener('show.bs.modal', function (event) {
    //    $('body').addClass('modal-fixed');
    //});
    //modal_static_techology.addEventListener('hidden.bs.modal', function (event) {
    //    $('body').removeClass('modal-fixed');
    //});
    ////-----------------------
    ////----RATING-------------------
    //let form_modalRating = $('form#modalRating');
    //const modalRating = document.getElementById('modalRating');
    //modalRating.addEventListener('show.bs.modal', event => {
    //    // do something...
    //    var _rating_fullname = form_modalRating.find('[name=rating_fullname]');
    //    var _rating_phone = form_modalRating.find('[name=rating_phone]');
    //    if (!_rating_fullname.val()) {
    //        _rating_fullname.val(user_fullname);
    //    }
    //    if (!_rating_phone.val()) {
    //        _rating_phone.val(user_phone);
    //    }
    //});
    ////---------------
    //form_modalRating.on('submit', function (event) {
    //    event.preventDefault();
    //    form_modalRating.find('.ferror').removeClass('d-block');
    //    var formdata = $(this).serialize();
    //    var process_postdata = $.post('https://minhtuanmobile.com/ajax/addvote/iphone-12-64gb-like-new/c7c21bc6977273a50cee31b303458890/', formdata);
    //    form_modalRating.find('button[type=submit]').addClass('disabled').attr('disabled', 'disabled');
    //    process_postdata.done(function (_resdata) {

    //        var resdata = $.parseJSON(_resdata);
    //        //=======
    //        user_fullname = form_modalRating.find('[name=rating_fullname]').val();
    //        user_phone = form_modalRating.find('[name=rating_phone]').val();
    //        //=======
    //        //console.log( resdata );
    //        if (resdata.status == 'true' || resdata.status == 'error') {
    //            //set from
    //            form_modalRating.find('.modalRating-response').html('<div class="col-12"><div class="alert alert-success mb-0">' + resdata.mess + '</div></div>');
    //            form_modalRating.find('.rating_votelist_wrapper').css('pointer-events', 'none');

    //        } else {

    //            for (input_key in resdata.errors) {
    //                var input_mess = resdata.errors[input_key];
    //                form_modalRating.find('.ferror_' + input_key).html(input_mess).addClass('d-block');
    //                //console.log( '.ferror_' + input_key , input_mess );
    //            }
    //            form_modalRating.find('button[type=submit]').removeClass('disabled').removeAttr('disabled');
    //            //------
    //        }
    //    });
    //    //========
    //    process_postdata.fail(function () {
    //        form_modalRating.find('button[type=submit]').removeClass('disabled').removeAttr('disabled');
    //        //------
    //        var $text_mess = '<p class="mb-0">Lỗi không xác định.</p>';
    //        $text_mess += '<p class="mb-0">Vui lòng liên hệ CSKH - Hotline: <a href="tel:18003355" class="bold text-primart">18003355</a> để được hỗ trợ.</p>';
    //        form_modalRating.find('.modalRating-response').html('<div class="col-12"><div class="alert alert-warning mb-0 text-dark">' + $text_mess + '</div></div>');
    //    });

    //    return false;
    //});
    ////-----------------------
    //let form_fcomment = $('form.fcomment-wrapper');
    //let form_modalComment = $('form#modalComment');
    //const modalComment = new bootstrap.Modal('#modalComment', { backdrop: 'static' });
    //form_fcomment.on('submit', function (event) {

    //    event.preventDefault();
    //    form_fcomment.find('.ferror_rating_vote').removeClass('d-block');
    //    var comment_text = form_fcomment.find('[name=comment_text]').val();
    //    ///----------------
    //    if (!comment_text || comment_text.length < 15) {
    //        form_fcomment.find('.ferror_rating_vote').addClass('d-block');
    //    } else {

    //        form_modalComment.find('[name=comment_fullname]').val(user_fullname);
    //        form_modalComment.find('[name=comment_phone]').val(user_phone);
    //        form_modalComment.find('[name=comment_email]').val(user_email);
    //        ///----------------
    //        modalComment.show();
    //    }
    //    return false;
    //});
    ////=======================
    //form_modalComment.on('submit', function (event) {
    //    event.preventDefault();
    //    form_modalRating.find('.ferror').removeClass('d-block');
    //    var formdata = $(this).serializeArray();
    //    formdata.push({ name: 'comment_text', value: form_fcomment.find('[name=comment_text]').val() });
    //    //console.log( formdata );

    //    var process_postdata = $.post('https://minhtuanmobile.com/ajax/addcomment/iphone-12-64gb-like-new/c7c21bc6977273a50cee31b303458890/', formdata);
    //    form_modalRating.find('button[type=submit]').addClass('disabled').attr('disabled', 'disabled');
    //    process_postdata.done(function (_resdata) {

    //        var resdata = $.parseJSON(_resdata);
    //        //console.log( resdata );
    //        if (resdata.status == 'true' || resdata.status == 'error') {
    //            //set from
    //            form_modalComment.find('.modalRating-response').html('<div class="col-12"><div class="alert alert-success mb-0">' + resdata.mess + '</div></div>');
    //            form_modalComment.find('.rating_votelist_wrapper').css('pointer-events', 'none');

    //        } else {

    //            for (input_key in resdata.errors) {
    //                var input_mess = resdata.errors[input_key];
    //                form_modalComment.find('.ferror_' + input_key).html(input_mess).addClass('d-block');
    //            }
    //            form_modalComment.find('button[type=submit]').removeClass('disabled').removeAttr('disabled');
    //            //------
    //        }
    //    });
    //    //========
    //    process_postdata.fail(function () {
    //        form_modalComment.find('button[type=submit]').removeClass('disabled').removeAttr('disabled');
    //        //------
    //        var $text_mess = '<p class="mb-0">Lỗi không xác định.</p>';
    //        $text_mess += '<p class="mb-0">Vui lòng liên hệ CSKH - Hotline: <a href="tel:18003355" class="bold text-primart">18003355</a> để được hỗ trợ.</p>';

    //        form_modalComment.find('.modalRating-response').html('<div class="col-12"><div class="alert alert-warning mb-0 text-dark">' + $text_mess + '</div></div>');
    //    });
    //});
    ////=======================
    //$('.rarting-btn-loadmore').on('click', function (event) {
    //    event.preventDefault();
    //    //alert( 1);
    //    var button = $(this);
    //    button.addClass('disabled').attr('disabled', 'disabled');
    //    var process_postdata = $.post('https://minhtuanmobile.com/ajax/loadmore-ratingcomment/iphone-12-64gb-like-new/c7c21bc6977273a50cee31b303458890/', { 'type': button.data('type'), 'page': button.data('page') });
    //    process_postdata.done(function (_resdata) {

    //        var resdata = _resdata ? $.parseJSON(_resdata) : false;
    //        console.log(resdata);
    //        if (resdata && resdata.status == 'true') {
    //            switch (button.data('type')) {
    //                case 'rating':
    //                    $('.rating-list').append(resdata.html);
    //                    $('.rarting-btn-loadmore.loadmore-rating b').html(resdata.total);
    //                    if (resdata.total == 0) {
    //                        $('.rarting-btn-loadmore.loadmore-rating').fadeOut('slow');
    //                    }
    //                    break;
    //                case 'comment':
    //                    $('.commentlist-wrapper').append(resdata.html);
    //                    $('.rarting-btn-loadmore.loadmore-comment b').html(resdata.total);
    //                    if (resdata.total == 0) {
    //                        $('.rarting-groupbtn-loadmore--comment').fadeOut('slow');
    //                        $('.rarting-btn-loadmore.loadmore-comment').fadeOut('slow');
    //                    }

    //                    break;
    //            }

    //            button.data('page', resdata.page);
    //            button.removeClass('disabled').removeAttr('disabled');

    //        } else {
    //            switch (button.data('type')) {
    //                case 'rating':
    //                    $('.rarting-btn-loadmore.loadmore-rating').fadeOut('slow');
    //                    break;

    //                case 'comment':
    //                    $('.rarting-groupbtn-loadmore--comment').fadeOut('slow');
    //                    $('.rarting-btn-loadmore.loadmore-comment').fadeOut('slow');
    //                    break;
    //            }

    //        }
    //    });
    //    //--------
    //    process_postdata.fail(function () {
    //        button.fadeOut();
    //        $('.rarting-groupbtn-loadmore').fadeOut('slow');
    //        var $text_mess = 'Lỗi không xác định.\n';
    //        $text_mess += 'Vui lòng liên hệ CSKH - Hotline: 18003355 để được hỗ trợ.';
    //        alert($text_mess);

    //    });



    //});
    //=======================
    $('.prodetail__overview_imginfo_store').on('change', 'select[name=store-province]', function (event) {
        event.preventDefault();
        var $this = $(this).parents('.prodetail__overview_imginfo_store');
        var value = $(this).val();
        $this.find('select[name=store-district] option').each(function (inex, element) {
            var checkdata = $(element).data('province');
            if (value == checkdata) {
                $(element).css('display', 'block');
            } else {
                $(element).css('display', 'none');
            }
            //console.log( checkdata );
        });
        $this.find('select[name=store-district] option')[0].selected = true;
        $this.find('select[name=store-district]').removeAttr('disabled');
        store_filter($this);
    });
    $('.prodetail__overview_imginfo_store').on('change', 'select[name=store-district]', function (event) {
        event.preventDefault();
        store_filter($(this).parents('.prodetail__overview_imginfo_store'));
    });
    //=======================
    //=======================
    $('.prodetail-proimei-item-addcart').on('click', function (event) {
        event.preventDefault();
        var dataproimei = {
            'checkin': 'iphone-12-64gb-like-new',
            'qty': 1,
            'imei': $(this).val(),
        };
        add_cartitem(dataproimei, site_url + 'cart');
    });
    $('.prodetail-proimei-container').on('keyup', '.prodetail-proimei-filter', function (event) {
        product_imei_filter();
    })
    //-------------

    //=======================
    //=======================
    $('#owl_homeblog').owlCarousel({
        autoplay: false,
        autoplayTimeout: 2900,
        margin: 0,
        items: 4,
        dots: false,
        loop: true,
        nav: true,
        navText: ['<i class="far fa-caret-square-left"></i>', '<i class="far fa-caret-square-right"></i>'],
        thumbs: false,
        responsive: {
            // breakpoint from 0 up
            0: {
                items: 1,
                dots: true,
                nav: false,
                margin: 0,
            },
            360: {
                items: 1,
                dots: true,
                nav: false,
                autoplay: false,
                margin: 0,
            },
            768: {
                items: 3,
                dots: false,
                nav: false,
                mouseDrag: false,
                touchDrag: false,
                margin: 22,
            },
            991: {
                items: 4,
                dots: false,
                nav: false,
                mouseDrag: false,
                touchDrag: false,
                margin: 0,
                loop: true
            },
            1201: {
                items: 6,
                dots: false,
                nav: false,
                mouseDrag: false,
                touchDrag: false,
                margin: 0,
                loop: false
            }
        }
    });

    //==========
    // console.log( $('.proprice_color_group .proprice_action.active').eq(0) );
    if ($('.proprice_color_group .proprice_action.active').eq(0).length == 1) {
        var proprice_action__active = $('.proprice_color_group .proprice_action.active').eq(0);
        var _ele_checkin = proprice_action__active.data('val');
        var _price_val = proprice_action__active.find('input[name=priceitem]');
        var priceitem = proprice.get(_ele_checkin);
        //  console.log( 'trigger' , priceitem );

        $('#MainContent_dvSlideCa img[data-item=prodimg__img1], #MainContent_dvSlideCa_Thumbnail [data-item=item__1] img').attr('src', priceitem['img']);
        owl_homeall_img.trigger("to.owl.carousel", 0);
    }
    //==========
    //const modalStorage = document.getElementById('modalStorage')
    //modalStorage.addEventListener('show.bs.modal', event => {
    //    // do something...
    //    var proprice_action__active = $('.proprice_color_group .proprice_action.active').eq(0).data('val');
    //    proprice_action__active = proprice_action__active ? proprice_action__active : $('input[name=prodetail_checkin]').eq(0).val();
    //    // console.log( proprice_action__active );
    //    if (proprice_action__active) {
    //        $('.modalStorage-reponsive .prodetail__liststore-item').addClass('d-none');
    //        var process_postdata = $.post('https://minhtuanmobile.com/ajax/getinfo-storage/c7c21bc6977273a50cee31b303458890/', { url: proprice_action__active });
    //        process_postdata.done(function (_resdata) {
    //            var $resdata = $.parseJSON(_resdata);
    //            console.log($resdata);
    //            //reset storage value
    //            $('.storage-qty').removeClass('text-primary').html('-');

    //            if ($resdata.status == 'true') {
    //                var check_process = 0;
    //                $('.modalStorage-reponsive > *').removeClass('d-none');
    //                $('.modalStorage-reponsive-alert').addClass('d-none');
    //                //===========
    //                $.each($resdata.data, function ($store_id, $store_qty) {
    //                    var attr_class = $store_qty > 0 ? 'text-primary' : '';
    //                    var eleitem_store = $('.storage-qty--' + $store_id);
    //                    // console.log( '.storage-qty--' + $store_id  + ' === ' + $store_qty );
    //                    if ($store_qty > 0) {
    //                        $('.modalStorage-item--' + $store_id).removeClass('d-none');
    //                        // eleitem_store.addClass( attr_class ).html( $store_qty + ' sản phẩm' );
    //                        if ($('.modalStorage-item--' + $store_id).length > 0) {
    //                            check_process++;
    //                        }
    //                        // console.log( $store_id  );
    //                    } else {
    //                        // $( '.modalStorage-item--' + $store_id ).addClass( 'd-none');
    //                    }
    //                });
    //                //===============
    //                if (check_process == 0) {
    //                    // console.log( check_process + ' remove');
    //                    $('.modalStorage-reponsive > *').addClass('d-none');
    //                    $('.modalStorage-reponsive-alert').removeClass('d-none');
    //                }
    //                console.log('count store = ' + check_process);
    //                $('#modalStorageLabel').html('Sản phẩm đang có sẵn tại ' + (check_process > 0 ? check_process : '') + ' cửa hàng');

    //            }
    //        });
    //        process_postdata.fail(function () {
    //            var $text_mess = '<p>Lỗi không xác định.</p>';
    //            $text_mess += '<p>Vui lòng liên hệ CSKH - Hotline: <a href="tel:18003355" class="bold text-primart">18003355</a> để được hỗ trợ.</p>';
    //            $('.modalStorage-reponsive').html('<div class="alert alert-warning mb-0 text-dark">' + $text_mess + '</div>');
    //        });

    //    }

    //    // var priceitem = proprice_action__active ? proprice.get( _ele_checkin ) : false;
    //})

    //==========
    $('#owl_prodetail_banner').owlCarousel({
        autoplay: false,
        mouseDrag: false,
        touchDrag: false,
        autoplayTimeout: 3200,
        smartSpeed: 820,
        margin: 3,
        items: 1,
        dots: true,
        loop: false,
        nav: false
        // navText: [ '<i class="far fa-caret-square-left"></i>', '<i class="far fa-caret-square-right"></i>' ],
    });
    //========
    //==========


});
//---------
var check_default_price_color = $('.proprice_color_group label.proprice_action.active').data('sku');
if (check_default_price_color) {
    checkshow_prodetail__sharecontent(check_default_price_color);
}
$('#MainContent_dvLoaiCaKhac').owlCarousel({
    autoplay: true,
    autoplayTimeout: 3700,
    smartSpeed: 820,
    items: 5,
    thumbs: false,
    dots: false,
    loop: true,
    nav: true,
    navText: ['<i class="far fa-caret-square-left"></i>', '<i class="far fa-caret-square-right"></i>'],
    responsive: {
        0: {
            items: 2,
            margin: 10
        },
        480: {
            items: 2,
            margin: 10
        },
        768: {
            items: 4,
            margin: 10
        },
        991: {
            items: 5,
            margin: 16
        },
        1200: {
            items: 5,
            margin: 20
        }
    }
});