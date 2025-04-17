const tuychonthemca = document.querySelector('#slTuyChonThemCa');
const tenca = document.querySelector('#txtTenCa');
const loaica = document.querySelector('#slLoaiCa');
const duongdan = document.querySelector('#txtDuongDan');
const thongtin = document.querySelector('#txtThongTin');
var AnhDaiDien = document.getElementById('imgDaiDien');

const form = document.querySelector('addfish');

const checkimgAnhDaiDien = () => {
    let valid = false;
    const anhdaidien = document.getElementById('imgDaiDien');
    const luuYAnhDaiDien = document.getElementById('luuyAnhDaiDien');
    const shopCoverBox = document.querySelector('.shopCoverBox.vehicles');

    if (anhdaidien.getAttribute('src') === "" || anhdaidien.getAttribute('src') === null) {
        luuYAnhDaiDien.classList.add('center-error'); 
        luuYAnhDaiDien.classList.add('errorAnhCa');
        luuYAnhDaiDien.textContent = 'Ảnh không được để trống';
        
        shopCoverBox.classList.add('bd-iper');
    } else {
        valid = true;
        luuYAnhDaiDien.classList.remove('center-error');
        luuYAnhDaiDien.textContent = ''; 
        
        shopCoverBox.classList.remove('bd-iper');
    }

    return valid;
};

const checktenca = () => {

    let valid = false;

    const min = 3,
        max = 50;

    const ca = tenca.value.trim();

    if (!isRequired(ca)) {
        showError(tenca, 'Vui lòng điền tên Cá.');
    } else if (!isBetween(ca.length, min, max)) {
        showError(tenca, `Tên cá phải có từ ${min} đến ${max} kí tự.`)
    } else {
        showSuccess(tenca);
        valid = true;
    }
    return valid;
};


const checkduongdan = () => {
    let valid = false;
    const link = duongdan.value.trim();
    if (!isRequired(link)) {
        showError(duongdan, 'Vui lòng điền đường dẫn cho cá.');
    }else if (!isPathValid(link)) {
        showError(duongdan, 'Tên của url chỉ có thể chứa chữ viết thường, số và dấu gạch nối (-)')
    }else {
        showSuccess(duongdan);
        valid = true;
    }
    return valid;
};

const checkloaica = () => {
    let valid = false;
    const lc = loaica.value.trim();
    if (lc == "0") {
        showError(loaica, 'Vui lòng chọn loại cá.');
    } else {
        showSuccess(loaica);
        valid = true;
    }
    return valid;
};

const checkthongtin = () => {
    let valid = false;
    const tt = thongtin.value.trim();

    if (!isRequired(tt)) {
        showError(thongtin, 'Vui lòng điền thông tin giới thiệu cho cá');
    } else {
        showSuccess(thongtin);
        valid = true;
    }
    return valid;
};

const isPathValid = (duongdan) => {
    const re = /^[a-zA-Z0-9-]{3,}$/;
    return re.test(duongdan);
};

const isRequired = value => value === '' ? false : true;
const isBetween = (length, min, max) => length < min || length > max ? false : true;

const showDefault = (input) => {
    const formField = input.parentElement;
    input.classList.remove('bd-iper');
    input.classList.remove('bd-ipsc');
    const error = formField.querySelector('.shopHelperText');
    error.classList.remove('info');
    error.classList.remove('errorr');
    error.textContent = '';
    const tt = formField.querySelector('.trangthai');
    tt.classList.remove('iconStatuser');
    tt.classList.remove('iconStatussc');
};

const showError = (input, message) => {
    const formField = input.parentElement;
    input.classList.add('bd-iper');
    input.classList.remove('bd-ipsc');
    const error = formField.querySelector('.shopHelperText');
    error.classList.remove('info');
    error.classList.add('errorr');
    error.textContent = message;
    const tt = formField.querySelector('.trangthai');
    tt.classList.add('iconStatuser');
    tt.classList.remove('iconStatussc');
};

const showSuccess = (input) => {
    const formField = input.parentElement;
    input.classList.add('bd-ipsc');
    input.classList.remove('bd-iper');
    const error = formField.querySelector('.shopHelperText');
    error.classList.add('info');
    error.classList.remove('errorr');
    error.textContent = '';
    const tt = formField.querySelector('.trangthai');
    tt.classList.add('iconStatussc');
    tt.classList.remove('iconStatuser');
}


document.getElementById('btnLuu').addEventListener('click', function (e) {
    e.preventDefault();
    let isImageDaiDien = checkimgAnhDaiDien(),
        isTenCaValid = checktenca(),
        isDuongDanValid = checkduongdan(),
        isLoaiCaValid = checkloaica(),
        isThongTinValid = checkthongtin();

    let isFormValid = isImageDaiDien && 
        isTenCaValid &&
        isDuongDanValid &&
        isLoaiCaValid &&
        isThongTinValid;                            
    if (isFormValid) {
        $('#btnThemCa').click();
    }
});

const debounce = (fn, delay = 500) => {
    let timeoutId;
    return (...args) => {                                
        if (timeoutId) {
            clearTimeout(timeoutId);
        }                                
        timeoutId = setTimeout(() => {
            fn.apply(null, args)
        }, delay);
    };
};

document.getElementById('addfish').addEventListener('input', debounce(function (e) {
    switch (e.target.id) {
        case 'txtTenCa':
            checktenca();
            break;
        case 'txtDuongDan':
            checkduongdan();
            break;
        case 'slLoaiCa':
            checkloaica();
            break;
        case 'txtThongTin':
            checkthongtin();
            break;
    }
}));
document.addEventListener('DOMContentLoaded', function() {
    var slLoaiCa = document.getElementById('slLoaiCa');
    var txtUrlCa = document.getElementById('txtUrlCa');
    var selectedValue = slLoaiCa.value;
    
    updateUrlCa(selectedValue); 
    
    slLoaiCa.addEventListener('change', function() {
        updateUrlCa(this.value); 
    });
    
    function updateUrlCa(value) {
        switch (value) {
            case '1':
                txtUrlCa.textContent = 'https://cagiongbaso.com/ca-giong/';
                break;
            case '2':
                txtUrlCa.textContent = 'https://cagiongbaso.com/ca-kieng/';
                break;
            case '3':
                txtUrlCa.textContent = 'https://cagiongbaso.com/ca-bot/';
                break;
            default:
                txtUrlCa.textContent = 'https://cagiongbaso.com/';
        }
    }
});