const hovaten = document.querySelector('#txtHovaTen');
const sodienthoai = document.querySelector('#txtSoDienThoai');
const tendangnhap = document.querySelector('#txtTenDangNhap');
const matkhau = document.querySelector('#txtMatKhau');

const form = document.querySelector('admin');

const checkhovaten = () => {

    let valid = false;

    const min = 3,
        max = 50;

    const ht = hovaten.value.trim();

    if (!isRequired(ht)) {
        showError(hovaten, 'Vui lòng điền họ và tên.');
    } else if (!isBetween(ht.length, min, max)) {
        showError(hovaten, `Họ và tên phải có từ ${min} đến ${max} kí tự.`)
    } else {
        showSuccess(hovaten);
        valid = true;
    }
    return valid;
};

const checksodienthoai = () => {
    let valid = false;
    const sdt = sodienthoai.value.trim();
    if (!isRequired(sdt)){
        showDefault(sodienthoai);
    }
    else if (!isPhoneValid(sdt)) {
        showError(sodienthoai, 'Số điện thoại không đúng định dạng');
    } else {
        showSuccess(sodienthoai);
        valid = true;
    }

    return valid;
};

const checktendangnhap = () => {
    let valid = false;
    const tdn = tendangnhap.value.trim();

    if (!isRequired(tdn)) {
        showError(tendangnhap, 'Vui lòng điền tên đăng nhập');
    } else {
        showSuccess(tendangnhap);
        valid = true;
    }
    return valid;
};

const checkmatkhau = () => {
    let valid = false;
    const mk = matkhau.value.trim();

    if (!isRequired(mk)) {
        showError(matkhau, 'Vui lòng điền mật khẩu');
    } else {
        showSuccess(matkhau);
        valid = true;
    }
    return valid;
};

const isPhoneValid = (phone) => {
    const re = /(((\+|)84)|0)(3|5|7|8|9)+([0-9]{8})\b/;
    return re.test(phone);
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
    let isHovaTenValid = checkhovaten(),
        isSoDienThoaiValid = checksodienthoai(),
        isTenDangNhapValid = checktendangnhap(),
        isMatKhauValid = checkmatkhau();

    let isFormValid = isHovaTenValid && 
        isSoDienThoaiValid &&
        isTenDangNhapValid &&
        isMatKhauValid;                            
    if (isFormValid) {
        $('#btnCapNhatAdmin').click();
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

document.getElementById('admin').addEventListener('input', debounce(function (e) {
    switch (e.target.id) {
        case 'txtHovaTen':
            checkhovaten();
            break;
        case 'txtSoDienThoai':
            checksodienthoai();
            break;
        case 'txtTenDangNhap':
            checktendangnhap();
            break;
        case 'txtMatKhau':
            checkmatkhau();
            break;
    }
}));