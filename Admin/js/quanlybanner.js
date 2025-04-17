const form = document.querySelector('banner');

const checkimgBanner1 = () => {
    let valid = false;
    const imgbanner1 = document.getElementById('imgBanner1');
    const luuYBanner1 = document.getElementById('luuyAnhBanner1');
    const dvBanner1 = document.getElementById('dvBanner1');

    if (imgbanner1.getAttribute('src') === "" || imgbanner1.getAttribute('src') === null) {
        luuYBanner1.classList.add('center-error'); 
        luuYBanner1.classList.add('errorAnhCa');
        luuYBanner1.textContent = 'Ảnh không được để trống';
        
        dvBanner1.classList.add('bd-iper');
    } else {
        valid = true;
        luuYBanner1.classList.remove('center-error');
        luuYBanner1.textContent = ''; 
        
        dvBanner1.classList.remove('bd-iper');
    }

    return valid;
};

const checkimgBanner2 = () => {
    let valid = false;
    const imgbanner2 = document.getElementById('imgBanner2');
    const luuYBanner2 = document.getElementById('luuyAnhBanner2');
    const dvBanner2 = document.getElementById('dvBanner2');

    if (imgbanner2.getAttribute('src') === "" || imgbanner2.getAttribute('src') === null) {
        luuYBanner2.classList.add('center-error'); 
        luuYBanner2.classList.add('errorAnhCa');
        luuYBanner2.textContent = 'Ảnh không được để trống';
        
        dvBanner2.classList.add('bd-iper');
    } else {
        valid = true;
        luuYBanner2.classList.remove('center-error');
        luuYBanner2.textContent = ''; 
        
        dvBanner2.classList.remove('bd-iper');
    }

    return valid;
};

const checkimgBanner3 = () => {
    let valid = false;
    const imgbanner3 = document.getElementById('imgBanner3');
    const luuYBanner3 = document.getElementById('luuyAnhBanner3');
    const dvBanner3 = document.getElementById('dvBanner3');

    if (imgbanner3.getAttribute('src') === "" || imgbanner3.getAttribute('src') === null) {
        luuYBanner3.classList.add('center-error'); 
        luuYBanner3.classList.add('errorAnhCa');
        luuYBanner3.textContent = 'Ảnh không được để trống';
        
        dvBanner3.classList.add('bd-iper');
    } else {
        valid = true;
        luuYBanner3.classList.remove('center-error');
        luuYBanner3.textContent = ''; 
        
        dvBanner3.classList.remove('bd-iper');
    }

    return valid;
};

document.getElementById('btnLuu').addEventListener('click', function (e) {
    e.preventDefault();
    let isImageBanner1 = checkimgBanner1(),
        isImageBanner2 = checkimgBanner2(),
        isImageBanner3 = checkimgBanner3();

    let isFormValid = isImageBanner1 && 
        isImageBanner2 &&
        isImageBanner3;                            
    if (isFormValid) {
        $('#btnCapNhatBanner').click();
    }
});