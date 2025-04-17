let editorInstance;

ClassicEditor
    .create(document.querySelector('#txtNoiDung'))
    .then(editor => {
        editorInstance = editor; 
        editor.model.document.on('change:data', () => {
            checknoidung(); 
        });
    })
    .catch(error => {
        console.error(error);
    });

const tieude = document.querySelector('#txtTieuDe');
const duongdan = document.querySelector('#txtDuongDan');
var AnhBia = document.getElementById('imgDaiDien');

const form = document.querySelector('addpost');

const checkimgAnhDaiDien = () => {
    let valid = false;
    const anhDaiDien = document.getElementById('imgDaiDien');
    const luuyAnhDaiDien = document.getElementById('luuyAnhDaiDien');
    const shopCoverBox = document.querySelector('.shopCoverBox.vehicles');

    if (!anhDaiDien.src || anhDaiDien.src === "") {
        luuyAnhDaiDien.classList.add('center-error');
        luuyAnhDaiDien.textContent = 'Ảnh không được để trống';
        shopCoverBox.classList.add('bd-iper');
    } else {
        valid = true;
        luuyAnhDaiDien.classList.remove('center-error');
        luuyAnhDaiDien.textContent = '';
        shopCoverBox.classList.remove('bd-iper');
    }

    return valid;
};

const checktieude = () => {
    let valid = false;

    const min = 3;

    const td = tieude.value.trim();

    if (!isRequired(td)) {
        showError(tieude, 'Vui lòng điền tiêu đề.');
    } else if (!isBetween(td.length, min)) {
        showError(tieude, `Tiêu đề phải có từ ${min} kí tự trở lên.`)
    } else {
        showSuccess(tieude);
        valid = true;
    }
    return valid;
};

const checkLink = () => {
    let valid = false;
    const link = duongdan.value.trim();
    if (!isRequired(link)) {
        showError(duongdan, 'Vui lòng điền đường dẫn cho tin tức.');
    } else if (!isPathValid(link)) {
        showError(duongdan, 'Tên của url chỉ có thể chứa chữ viết thường, số và dấu gạch nối (-)')
    } else {
        showSuccess(duongdan);
        valid = true;
    }
    return valid;
};

const checknoidung = () => {
    let valid = false;
    const editorData = editorInstance.getData(); 
    const editorContainer = document.querySelector('.ck-editor'); 

    if (!editorData.trim()) {
        showError(editorContainer, 'Vui lòng điền nội dung tin tức'); 
        editorContainer.classList.add('bd-iper'); 
    } else {
        showSuccess(editorContainer); 
        editorContainer.classList.remove('bd-iper');
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
        isTieuDeValid = checktieude(),
        isLinkValid = checkLink(),
        isNoiDungValid = checknoidung();

    let isFormValid = isImageDaiDien && 
        isTieuDeValid &&
        isLinkValid &&
        isNoiDungValid;                            

    if (isFormValid) {
        $('#btnThemTinTuc').click();
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

document.getElementById('addpost').addEventListener('input', debounce(function (e) {
    switch (e.target.id) {
        case 'txtTieuDe':
            checktieude();
            break;
        case 'txtDuongDan':
            checkLink();
            break;
        case 'txtNoiDung':
            checknoidung(); 
            break;
    }
}));

document.getElementById('imgDaiDienUpload').addEventListener('change', function() {
    const file = this.files[0];
    const imgAnhDaiDien = document.getElementById('imgDaiDien');
    const reader = new FileReader();

    reader.onload = function(e) {
        imgAnhDaiDien.src = e.target.result; 
        checkimgAnhDaiDien(); 
    };

    if (file) {
        reader.readAsDataURL(file); 
    }
});
