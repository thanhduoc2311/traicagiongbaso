<?php include 'header.php'; ?>
<link href="/Admin/css/hinhanh.css" rel="stylesheet">
<link href="../css/fancybox.css"  rel="stylesheet" />
<script type="text/javascript" src="../js/fancybox.js"></script>
<?php 
	require_once '../connect.php';
	$db = new Connect();
	$sql_images = "SELECT idhinh, urlhinh FROM hinhanhca WHERE idloai = 4 ORDER BY ngaydang DESC";
	$images = $db->getTable($sql_images);

	function getFileType($fileUrl) {
	    $imageExtensions = ['jpg', 'jpeg', 'png', 'gif'];
	    $videoExtensions = ['mp4', 'webm', 'ogg'];

	    $fileExtension = strtolower(pathinfo($fileUrl, PATHINFO_EXTENSION));

	    if (in_array($fileExtension, $imageExtensions)) {
	        return 'image';
	    } elseif (in_array($fileExtension, $videoExtensions)) {
	        return 'video';
	    } else {
	        return 'unknown';
	    }
	}
?>
<div class="container container-fluid mt-4">
    <h1 class="h4 mb-2 text-gray-800 bb-tittle">Quản Lý Hình Ảnh</h1>
    <form id="uploadForm" enctype="multipart/form-data" style="text-align: center;">
        <label class="sl-tuychon-hinh">Tùy Chọn Thêm Ảnh/Video:</label>
        <select id="slTuyChon" name="slTuyChon" class="form-control sl-tuychon-hinh">
            <?php 
                $sql = "select idca, tenca from cagiong where danhmucCha = 0";
                $result = $db->getTable($sql); 

                if (!empty($result)) {
                    echo "<option value='0'>Thêm Ảnh - Video Mới</option>";
                    foreach ($result as $row) { 
                        echo "<option value='" . $row['idca'] . "'>" . $row['tenca'] . "</option>";
                    }
                }
            ?>
        </select>
        <label for="fileUpload" class="btn btn-primary sl-tuychon-hinh" style="font-weight: bold;"><i class="fas fa-upload"></i> Thêm ảnh - video</label>
        <input type="file" id="fileUpload" name="file" accept="image/*, video/*" style="display: none;">

        <div id="previewContainer" class="sl-tuychon-hinh" style="display: none; margin-top: 10px;">
            <img id="imgPreview" class="img-preview-first" style="display: none;">
            <video id="videoPreview" controls class="img-preview-first" style="display: none;"></video>
        </div>

        <div class="progress mt-2 sl-tuychon-hinh">
            <div class="progress-bar progress-bar-striped progress-bar-animated" 
                 role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                0%
            </div>
        </div>
    </form>

    <ul class="gallery list-unstyled">
        <?php foreach ($images as $image): 
            $fileType = getFileType($image['urlhinh']); 
        ?>
            <li>
                <?php if ($fileType == 'image'): ?>
                    <a href="/<?php echo $image['urlhinh']; ?>" data-fancybox="gallery">
                        <img src="/<?php echo $image['urlhinh']; ?>" alt="Image <?php echo $image['idhinh']; ?>" 
                             class="img-fluid">
                    </a>
                <?php elseif ($fileType == 'video'): ?>
                    <a href="/<?php echo $image['urlhinh']; ?>" data-fancybox="gallery" data-type="video">
                        <video controls style="width: 100%; height: auto; border-radius: 6px;">
                            <source src="/<?php echo $image['urlhinh']; ?>" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </a>
                <?php endif; ?>
                                
                <button class="btn-delete-img" data-id="<?php echo $image['idhinh']; ?>" data-img="<?php echo $image['urlhinh']; ?>"><img src="/Admin/img/delete.svg" /></button>
            </li>
        <?php endforeach; ?>
    </ul>
</div>

<script>
$(document).ready(function() {
    $('#fileUpload').change(function() {
        var file = this.files[0];
        var previewContainer = $('#previewContainer');
        var imgPreview = $('#imgPreview');
        var videoPreview = $('#videoPreview');
        var fileType = file.type.split('/')[0]; // Kiểm tra loại file
        var textAlert = "";
        // Reset preview
        imgPreview.hide();
        videoPreview.hide();
        previewContainer.show();

        // Hiển thị ảnh hoặc video dựa trên loại file
        if (fileType === 'image') {
            var reader = new FileReader();
            reader.onload = function(e) {
                imgPreview.attr('src', e.target.result);
                imgPreview.show(); // Hiển thị ảnh
            };
            reader.readAsDataURL(file); // Đọc file ảnh
            textModal = "Ảnh đã được tải lên thành công!";
        } else if (fileType === 'video') {
            var reader = new FileReader();
            reader.onload = function(e) {
                videoPreview.attr('src', e.target.result);
                videoPreview.show(); // Hiển thị video
            };
            reader.readAsDataURL(file); // Đọc file video
            textModal = "Video đã được tải lên thành công!";
        }

        // Sau khi hiển thị preview, tiến hành upload file qua AJAX
        var idca = $('#slTuyChon').val(); // Lấy giá trị của tùy chọn
        var formData = new FormData();
        formData.append('file', file);
        formData.append('idca', idca); // Thêm idca vào FormData

        // Hiển thị thanh tiến trình và reset
        $('.progress').show();
        $('.progress-bar').css('width', '0%').attr('aria-valuenow', 0).text('0%');

        $.ajax({
            url: '/Admin/themanh.php', // Đường dẫn đến file xử lý upload
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            xhr: function() {
                var xhr = new window.XMLHttpRequest();

                // Upload progress
                xhr.upload.addEventListener("progress", function(evt) {
                    if (evt.lengthComputable) {
                        var percentComplete = Math.round((evt.loaded / evt.total) * 100);
                        $('.progress-bar').css('width', percentComplete + '%').attr('aria-valuenow', percentComplete).text(percentComplete + '%');
                    }
                }, false);

                return xhr;
            },
            success: function(response) {
                if (response === 'success') {
                    Swal.fire({
                        title: 'Thành công',
                        text: textModal,
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 2000,
                        timerProgressBar: true,
                        willClose: () => {
                            location.reload();
                        }
                    });
                } else {
                    Swal.fire('Lỗi', 'Có lỗi xảy ra khi tải lên file.', 'error');
                }
            },
            error: function() {
                Swal.fire('Lỗi', 'Có lỗi trong quá trình tải lên.', 'error');
            }
        });
    });
});

$(document).ready(function() {
    $('.btn-delete-img').click(function() {
    var idhinh = $(this).data('id');
    var urlhinh = $(this).data('img'); 

    function getFileType(url) {
        var imageExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        var videoExtensions = ['mp4', 'webm', 'ogg'];
        var extension = url.split('.').pop().toLowerCase();

        if (imageExtensions.includes(extension)) {
            return 'image';
        } else if (videoExtensions.includes(extension)) {
            return 'video';
        }
        return 'unknown';
    }

    var fileType = getFileType(urlhinh); 

    var mediaHtml = '';
    var titleModal = '';
    var textModal = '';
    if (fileType === 'image') {
        mediaHtml = `<img src="/${urlhinh}" alt="Hình ảnh muốn xóa" class="img-delete-btn-md">`;
        titleModal = 'Bạn có chắc muốn xóa ảnh này?';
        textModal = "Ảnh đã được xóa.";
    } else if (fileType === 'video') {
        mediaHtml = `<video controls class="img-delete-btn-md">
                        <source src="/${urlhinh}" type="video/mp4">
                        Trình duyệt của bạn không hỗ trợ thẻ video.
                     </video>`;
        titleModal = 'Bạn có chắc muốn xóa video này?';
        textModal = "Video đã được xóa.";
    }

    Swal.fire({
        title: titleModal,
        text: "Hành động này không thể hoàn tác!",
        icon: 'warning',
        html: mediaHtml,
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Xóa',
        cancelButtonText: 'Hủy'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '/Admin/xoahinhanh.php', 
                type: 'POST',
                data: { idhinh: idhinh },
                success: function(response) {
                    if (response === 'success') {
                        Swal.fire({
                            title: 'Xóa thành công!',
                            text: textModal,
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 2000, 
                            timerProgressBar: true,
                            willClose: () => {
                                location.reload();
                            }
                        });                        
                    } else {
                        Swal.fire('Lỗi!', 'Không thể xóa ảnh.', 'error');
                    }
                },
                error: function() {
                    Swal.fire('Lỗi!', 'Có lỗi xảy ra.', 'error');
                }
            });
        }
    });
});
});

document.addEventListener('DOMContentLoaded', function () {
    const images = document.querySelectorAll('.gallery img');

    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('show'); 
                observer.unobserve(entry.target);
            }
        });
    });

    images.forEach(image => {
        observer.observe(image); 
    });
});
</script>

<?php include 'footer.php'; ?>