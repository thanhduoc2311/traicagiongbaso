document.querySelector('.khthanthiet-form-password').addEventListener('click', function (event) {
    var inputTaiKhoan = document.getElementById('txtTaiKhoan');
    var inputMatKhau = document.getElementById('txtMatKhau');
    var errorTaiKhoan = document.getElementById('txtErrorTaiKhoan');
    var errorMatKhau = document.getElementById('txtErrorPassWord');
    
    // Xóa thông báo lỗi cũ
    errorTaiKhoan.classList.add('d-none');
    errorMatKhau.classList.add('d-none');

    inputTaiKhoan.classList.remove('bd-iper');
    inputMatKhau.classList.remove('bd-iper');

    errorTaiKhoan.classList.remove('errorr');
    errorMatKhau.classList.remove('errorr');

    if (inputTaiKhoan.value === '' && inputMatKhau.value === '') {
        errorTaiKhoan.textContent = 'Tài khoản không được để trống';
        errorMatKhau.textContent = 'Mật khẩu không được để trống';

        errorTaiKhoan.classList.add('errorr');
        errorMatKhau.classList.add('errorr');

        inputTaiKhoan.classList.add('bd-iper');
        inputMatKhau.classList.add('bd-iper');

        errorTaiKhoan.classList.remove('d-none');
        errorMatKhau.classList.remove('d-none');
        event.preventDefault();
        return;
    }
    // Kiểm tra trống
    if (inputTaiKhoan.value === '') {
        errorTaiKhoan.textContent = 'Tài khoản không được để trống';
        errorTaiKhoan.classList.remove('d-none');
        inputTaiKhoan.classList.add('bd-iper');
        errorTaiKhoan.classList.add('errorr');
        event.preventDefault();
        return;
    }

    if (inputMatKhau.value === '') {
        errorMatKhau.textContent = 'Mật khẩu không được để trống';
        errorMatKhau.classList.remove('d-none');
        errorMatKhau.classList.add('errorr');
        inputMatKhau.classList.add('bd-iper');
        event.preventDefault();
        return;
    }

    // Gửi form nếu hợp lệ
    document.querySelector('form').submit();
});

$(document).ready(function () {
    // Số Điện Thoại
    var inputTaiKhoan = document.getElementById('txtTaiKhoan');
    var clearIconTaiKhoan = document.getElementById('clearInputTaiKhoan');
    
    // Thêm class has-value nếu đã có dữ liệu
    toggleClassHasValue(inputTaiKhoan);
    clearIconTaiKhoan.style.display = inputTaiKhoan.value.length > 0 ? 'block' : 'none';

    // Mật khẩu
    var inputMatKhau = document.getElementById('txtMatKhau');
    var clearIconMatKhau = document.getElementById('clearInputMatKhau');

    // Thêm class has-value nếu đã có dữ liệu
    toggleClassHasValue(inputMatKhau);
    clearIconMatKhau.style.display = inputMatKhau.value.length > 0 ? 'block' : 'none';
});

// Hàm thêm/xóa class has-value
function toggleClassHasValue(input) {
    if (input.value.length > 0) {
        input.classList.add('has-value');
    } else {
        input.classList.remove('has-value');
    }
}

// Số Điện Thoại
document.getElementById('clearInputTaiKhoan').addEventListener('click', function () {
    var inputTaiKhoan = document.getElementById('txtTaiKhoan');
    inputTaiKhoan.value = '';
    toggleClassHasValue(inputTaiKhoan);
    hideClearIconTaiKhoan();
    inputTaiKhoan.blur();
});

var inputTaiKhoan = document.getElementById('txtTaiKhoan');
var clearIconTaiKhoan = document.getElementById('clearInputTaiKhoan');

inputTaiKhoan.addEventListener('input', function() {
    toggleClassHasValue(inputTaiKhoan);
    toggleClearIconTaiKhoan();
});

// Mật khẩu
document.getElementById('clearInputMatKhau').addEventListener('click', function () {
    var inputMatKhau = document.getElementById('txtMatKhau');
    inputMatKhau.value = '';
    toggleClassHasValue(inputMatKhau);
    hideClearIconMatKhau();
    inputMatKhau.blur();
});

var inputMatKhau = document.getElementById('txtMatKhau');
var clearIconMatKhau = document.getElementById('clearInputMatKhau');

inputMatKhau.addEventListener('input', function() {
    toggleClassHasValue(inputMatKhau);
    toggleClearIconMatKhau();
});

function toggleClearIconTaiKhoan() {
    clearIconTaiKhoan.style.display = inputTaiKhoan.value.length > 0 ? 'block' : 'none';
}

function toggleClearIconMatKhau() {
    clearIconMatKhau.style.display = inputMatKhau.value.length > 0 ? 'block' : 'none';
}

function hideClearIconTaiKhoan() {
    var clearIconTaiKhoan = document.getElementById('clearInputTaiKhoan');
    clearIconTaiKhoan.style.display = 'none';
}

function hideClearIconMatKhau() {
    var clearIconMatKhau = document.getElementById('clearInputMatKhau');
    clearIconMatKhau.style.display = 'none';
}